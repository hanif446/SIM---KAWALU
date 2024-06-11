<?php

namespace App\Http\Controllers;

use App\Models\GolonganGaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GolonganGajiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:golongan_gaji_show', ['only' => 'index']);
        $this->middleware('permission:golongan_gaji_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:golongan_gaji_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:golongan_gaji_delete', ['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $golongan_gaji = GolonganGaji::all();
        return view('golongan_gaji.index', [
            'golongan_gaji' => $golongan_gaji
        ]);
    }

    public function select(Request $request)
    {
        $golongan_gaji = [];
        $search = $request->q;
        if($request->has('q')){
            $golongan_gaji = GolonganGaji::select('id', 'golongan')->where('golongan', 'LIKE', "%$search%")->get();
        }else{
            $golongan_gaji = GolonganGaji::select('id',  'golongan')->limit(5)->get();
        }

        return response()->json($golongan_gaji);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('golongan_gaji.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make(
        $request->all(),[
            'golongan' => 'required',
            'nominal_gaji_pokok' => 'required|numeric',
            'nominal_gaji_ttp' => 'required|numeric',
            'tmt_golongan' => 'required',

         ])->validate();

        try {
            GolonganGaji::create([
                'golongan' => $request->golongan,
                'nominal_gaji_pokok' => $request->nominal_gaji_pokok,
                'nominal_gaji_ttp' => $request->nominal_gaji_ttp,
                'tmt_golongan' => $request->tmt_golongan
            ]);
            return redirect()->route('golongan-gaji.index')->with('message', 'Data berhasil disimpan!');
        }catch (\Throwable $th){

        }return redirect()->back()->withInput($request->all())->withErrors($th);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GolonganGaji  $golonganGaji
     * @return \Illuminate\Http\Response
     */
    public function show(GolonganGaji $golongan_gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GolonganGaji  $golonganGaji
     * @return \Illuminate\Http\Response
     */
    public function edit(GolonganGaji $golongan_gaji)
    {
        return  view('golongan_gaji.edit', compact('golongan_gaji'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GolonganGaji  $golonganGaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GolonganGaji $golongan_gaji)
    {
        Validator::make(
        $request->all(),[
            'golongan' => 'required',
            'nominal_gaji_pokok' => 'required|numeric',
            'nominal_gaji_ttp' => 'required|numeric',
            'tmt_golongan' => 'required',

         ])->validate();

         try {
            $golongan_gaji->update([
                'golongan' => $request->golongan,
                'nominal_gaji_pokok' => $request->nominal_gaji_pokok,
                'nominal_gaji_ttp' => $request->nominal_gaji_ttp,
                'tmt_golongan' => $request->tmt_golongan
            ]);
            return redirect()->route('golongan-gaji.index')->with('message', 'Data berhasil diubah!');
        }catch (\Throwable $th){

        }return redirect()->back()->withInput($request->all())->withErrors($th);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GolonganGaji  $golonganGaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(GolonganGaji $golongan_gaji)
    {
        try {
            $golongan_gaji->delete();
            return redirect()->back()->with('message',' Data berhasil dihapus!');
        }catch (\Throwable $th){
            return redirect()->back()->withErrors($th);
        }
    }
}
