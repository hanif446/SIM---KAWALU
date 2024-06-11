<?php

namespace App\Http\Controllers;

use App\Models\GajiTTP;
use App\Models\Pegawai;
use App\Models\PotonganGajiTTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class GajiTTPController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:gaji_ttp_pegawai_show', ['only' => 'index']);
        $this->middleware('permission:gaji_ttp_pegawai_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:gaji_ttp_pegawai_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:gaji_ttp_pegawai_detail', ['only' => 'show']);
        $this->middleware('permission:gaji_ttp_pegawai_delete', ['only' => 'destroy']);
        $this->middleware('permission:gaji_ttp_pegawai_cetak', ['only' => 'cetak']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gaji_ttp = [];
        if (Auth::user()->roles->first()->name == 'Admin') {
            $gaji_ttp = GajiTTP::leftJoin('pegawais', 'gaji_ttps.pegawai_id', '=', 'pegawais.id')
                   ->select('gaji_ttps.*', 'pegawais.nip', 'pegawais.nama_pegawai')
                   ->orderBy('created_at', 'DESC')
                   ->get();
        }else {
            $gaji_ttp = GajiTTP::leftJoin('pegawais', 'gaji_ttps.pegawai_id', '=', 'pegawais.id')
                   ->select('gaji_ttps.*', 'pegawais.nip', 'pegawais.nama_pegawai')
                   ->where('user_id', '=', Auth::user()->id)
                   ->orderBy('created_at', 'DESC')
                   ->get();
        }

        return view('gaji_ttp.index', [
            'gaji_ttp' => $gaji_ttp
        ]);
    }

    public function cetak(GajiTTP $gaji_ttp)
    {
        return view('gaji_ttp.cetak', [
            'gaji_ttp' => $gaji_ttp,
            'pegawai' => $gaji_ttp->pegawai,
            'golongan_gaji' => $gaji_ttp->pegawai->golongan_gaji,
            'potongan_gaji_ttp' => $gaji_ttp->potongan_gaji_ttp
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gaji_ttp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $validator = Validator::make(
            $request->all(),
            [
                  "pegawai" => 'required',
                  "bulan_gaji" => ['required', Rule::unique('gaji_ttps')
                    ->where('pegawai_id', $request->pegawai)
                    ->where('tahun_gaji', $request->tahun_gaji)
                    ],
                  "tahun_gaji" => 'required',
                  "infak" => 'required|numeric',
                  "bjb" => 'required|numeric',
                  "mukti_resik" => 'required|numeric',
                  "bjbs" => "required|numeric",
                  "al_madinah" => 'required|numeric'
            ],
        );

        if($validator->fails()){
            $request['pegawai'] = Pegawai::select('id', 'nip', 'nama_pegawai')->find($request->pegawai);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $pegawai = $request->pegawai;
        $golongan_gaji = Pegawai::leftJoin('golongan_gajis', 'pegawais.golongan_id', '=', 'golongan_gajis.id')
               ->select('golongan_gajis.nominal_gaji_ttp')
               ->where('pegawais.id', '=', $pegawai)
               ->get();

        foreach ($golongan_gaji as $gj) {
            $gaji = $gj->nominal_gaji_ttp;
        }

        $infak = $request->infak;
        $bjb = $request->bjb;
        $mukti_resik = $request->mukti_resik;
        $bjbs = $request->bjbs;
        $al_madinah = $request->al_madinah;

        $jumlah_potongan = $infak + $bjb + $mukti_resik + $bjbs + $al_madinah;

        $gaji_netto = $gaji - $jumlah_potongan;

        //Input Process
        DB::beginTransaction();
        try {
            $gaji_ttp = GajiTTP::create([
                'pegawai_id' => $request->pegawai,
                'bulan_gaji' => $request->bulan_gaji,
                'tahun_gaji' => $request->tahun_gaji,
                'jml_pot' => $jumlah_potongan,
                'gaji_netto' => $gaji_netto
            ]);

            $potongan_gaji = PotonganGajiTTP::create([
                'gaji_ttp_id' => $gaji_ttp->id,
                'infak' => $request->infak,
                'bjb' => $request->bjb,
                'mukti_resik' => $request->mukti_resik,
                'bjbs' => $request->bjbs,
                'al_madinah' => $request->al_madinah
            ]);

            return redirect()->route('gaji-ttp.index')->with('message', 'Data berhasil disimpan!');
        }catch (\Throwable $th){
            DB::rollBack();
            Alert::error('Tambah Gaji TPP Pegawai', 'Error' . $th->getMessage());
            $request['pegawai'] = Pegawai::select('id', 'nip', 'nama_pegawai')->find($request->pegawai);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }finally{
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GajiTTP  $gajiTTP
     * @return \Illuminate\Http\Response
     */
    public function show(GajiTTP $gaji_ttp)
    {
        return view('gaji_ttp.detail', [
            'gaji_ttp' => $gaji_ttp,
            'pegawai' => $gaji_ttp->pegawai,
            'golongan_gaji' => $gaji_ttp->pegawai->golongan_gaji,
            'potongan_gaji_ttp' => $gaji_ttp->potongan_gaji_ttp
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GajiTTP  $gajiTTP
     * @return \Illuminate\Http\Response
     */
    public function edit(GajiTTP $gaji_ttp)
    {
        return view('gaji_ttp.edit', [
            'gaji_ttp' => $gaji_ttp,
            'pegawai' => $gaji_ttp->pegawai,
            'golongan_gaji' => $gaji_ttp->pegawai->golongan_gaji,
            'potongan_gaji_ttp' => $gaji_ttp->potongan_gaji_ttp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GajiTTP  $gajiTTP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GajiTTP $gaji_ttp)
    {
        //validation
        $rules = [
                  "pegawai" => 'required',
                  "tahun_gaji" => 'required',
                  "infak" => 'required|numeric',
                  "bjb" => 'required|numeric',
                  "mukti_resik" => 'required|numeric',
                  "bjbs" => "required|numeric",
                  "al_madinah" => 'required|numeric'
            ];

        if($request->bulan_gaji != $gaji_ttp->bulan_gaji){
            $rules['bulan_gaji'] = ['required', Rule::unique('gaji_ttps')
                    ->where('pegawai_id', $request->pegawai)
                    ->where('tahun_gaji', $request->tahun_gaji)
                    ];
        }

        $validator = $request->validate($rules);

        $pegawai = $request->pegawai;
        $golongan_gaji = Pegawai::leftJoin('golongan_gajis', 'pegawais.golongan_id', '=', 'golongan_gajis.id')
               ->select('golongan_gajis.nominal_gaji_ttp')
               ->where('pegawais.id', '=', $pegawai)
               ->get();

        foreach ($golongan_gaji as $gj) {
            $gaji = $gj->nominal_gaji_ttp;
        }

        $infak = $request->infak;
        $bjb = $request->bjb;
        $mukti_resik = $request->mukti_resik;
        $bjbs = $request->bjbs;
        $al_madinah = $request->al_madinah;

        $jumlah_potongan = $infak + $bjb + $mukti_resik + $bjbs + $al_madinah;

        $gaji_netto = $gaji - $jumlah_potongan;

        //Input Process
        DB::beginTransaction();
        try {
            $gaji_ttp->update([
                'pegawai_id' => $request->pegawai,
                'bulan_gaji' => $request->bulan_gaji,
                'tahun_gaji' => $request->tahun_gaji,
                'jml_pot' => $jumlah_potongan,
                'gaji_netto' => $gaji_netto
            ]);

            PotonganGajiTTP::where('gaji_ttp_id', $gaji_ttp->id)->update([
                'infak' => $request->infak,
                'bjb' => $request->bjb,
                'mukti_resik' => $request->mukti_resik,
                'bjbs' => $request->bjbs,
                'al_madinah' => $request->al_madinah
            ]);

            return redirect()->route('gaji-ttp.index')->with('message', 'Data berhasil diubah!');
        }catch (\Throwable $th){
            DB::rollBack();
            Alert::error('Ubah Gaji TPP Pegawai', 'Error' . $th->getMessage());
            $request['pegawai'] = Pegawai::select('id', 'nip', 'nama_pegawai')->find($request->pegawai);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }finally{
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GajiTTP  $gajiTTP
     * @return \Illuminate\Http\Response
     */
    public function destroy(GajiTTP $gaji_ttp)
    {
        DB::beginTransaction();
        try {
            $gaji_ttp->delete();

            return redirect()->back()->with('message','Data berhasil dihapus!');

        }catch (\Throwable $th){
            DB::rollBack();
        }finally{
            DB::commit();
            return redirect()->back();
        }
    }
}
