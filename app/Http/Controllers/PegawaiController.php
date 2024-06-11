<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\GolonganGaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pegawai_show', ['only' => 'index']);
        $this->middleware('permission:pegawai_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pegawai_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pegawai_detail', ['only' => 'show']);
        $this->middleware('permission:pegawai_delete', ['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $pegawai = Pegawai::leftJoin('jabatans', 'pegawais.jabatan_id', '=', 'jabatans.id')
               ->leftJoin('golongan_gajis', 'pegawais.golongan_id', '=', 'golongan_gajis.id')
               ->select('pegawais.*', 'jabatans.nama_jabatan', 'golongan_gajis.golongan')
               ->orderBy('created_at', 'DESC')
               ->get();

        return view('pegawai.index', [
            'pegawai' => $pegawai
        ]);
    }

    public function select(Request $request)
    {
        $pegawai = [];
        $search = $request->q;
        if($request->has('q')){
            $pegawai= Pegawai::select('id', 'nip', 'nama_pegawai')->where('nama_pegawai', 'LIKE', "%$search%")->get();
        }else{
            $pegawai = Pegawai::select('id',  'nip', 'nama_pegawai')->limit(5)->get();
        }

        return response()->json($pegawai);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
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
                  "nip" => "required|numeric|digits:18|unique:pegawais,nip",
                  "nama_pegawai" => "required|string|max:30",
                  "jabatan" => 'required',
                  "golongan_gaji" => "required",
                  "uker" => 'required',
                  "user" => 'required|unique:pegawais,user_id'
            ],
        );

        if($validator->fails()){
            $request['jabatan'] = Jabatan::select('id', 'nama_jabatan')->find($request->jabatan);
            $request['user'] = User::select('id', 'email')->find($request->user);
            $request['golongan_gaji'] = GolonganGaji::select('id', 'golongan')->find($request->golongan_gaji);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $pegawai = Pegawai::create([
                'nip' => $request->nip,
                'nama_pegawai'  => $request->nama_pegawai,
                'tempat_lhr' =>$request->tempat_lhr,
                'tgl_lhr' => $request->tgl_lhr,
                'no_hp' => $request->no_hp, 
                'alamat' => $request->alamat, 
                'golongan_id' => $request->golongan_gaji, 
                'jabatan_id' => $request->jabatan,
                'pendidikan' => $request->pendidikan,
                'jurusan' => $request->jurusan,
                'diklat_pim' => $request->diklat_pim,
                'thn_lulus' => $request->thn_lulus,
                'uker' => $request->uker,
                'user_id' => $request->user
            ]);

            return redirect()->route('pegawai.index')->with('message', ' Data berhasil disimpan! ');

        } catch (\Throwable $th) {
            DB::rollback();
            $request['jabatan'] = Jabatan::select('id', 'nama_jabatan')->find($request->jabatan);
            $request['user'] = User::select('id', 'email')->find($request->user);
            $request['golongan_gaji'] = GolonganGaji::select('id', 'golongan')->find($request->golongan_gaji);
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        return view('pegawai.detail', [
            'pegawai' => $pegawai,
            'user' => $pegawai->user,
            'jabatan' => $pegawai->jabatan,
            'golongan' => $pegawai->golongan_gaji,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', [
            'pegawai' => $pegawai,
            'userSelected' => $pegawai->user,
            'jabatanSelected' => $pegawai->jabatan,
            'golonganSelected' => $pegawai->golongan_gaji,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //validation
        $validator = Validator::make(
            $request->all(),
            [
                  "nip" => "required|numeric|digits:18|unique:pegawais,nip," .$pegawai->id,
                  "nama_pegawai" => "required|string|max:30",
                  "jabatan" => 'required',
                  "golongan_gaji" => "required",
                  "uker" => 'required',
                  "user" => "required|unique:pegawais,user_id," .$pegawai->user_id,
            ],
        );

        if($validator->fails()){
            $request['jabatan'] = Jabatan::select('id', 'nama_jabatan')->find($request->jabatan);
            $request['user'] = User::select('id', 'email')->find($request->user);
            $request['golongan_gaji'] = GolonganGaji::select('id', 'golongan')->find($request->golongan_gaji);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $pegawai->update([
                'nip' => $request->nip,
                'nama_pegawai'  => $request->nama_pegawai,
                'tempat_lhr' =>$request->tempat_lhr,
                'tgl_lhr' => $request->tgl_lhr,
                'no_hp' => $request->no_hp, 
                'alamat' => $request->alamat, 
                'golongan_id' => $request->golongan_gaji, 
                'jabatan_id' => $request->jabatan,
                'pendidikan' => $request->pendidikan,
                'jurusan' => $request->jurusan,
                'diklat_pim' => $request->diklat_pim,
                'thn_lulus' => $request->thn_lulus,
                'uker' => $request->uker,
                'user_id' => $request->user
            ]);

            return redirect()->route('pegawai.index')->with('message', ' Data berhasil diubah! ');

        } catch (\Throwable $th) {
            DB::rollback();
            $request['jabatan'] = Jabatan::select('id', 'nama_jabatan')->find($request->jabatan);
            $request['user'] = User::select('id', 'email')->find($request->user);
            $request['golongan_gaji'] = GolonganGaji::select('id', 'golongan')->find($request->golongan_gaji);
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
        DB::beginTransaction();
        try {
            $pegawai->delete();

            return redirect()->back()->with('message','Data berhasil dihapus!');

        }catch (\Throwable $th){
            DB::rollBack();
        }finally{
            DB::commit();
            return redirect()->back();
        }
    }
}
