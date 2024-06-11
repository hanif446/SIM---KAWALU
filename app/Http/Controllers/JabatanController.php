<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:jabatan_show', ['only' => 'index']);
        $this->middleware('permission:jabatan_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:jabatan_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:jabatan_delete', ['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('jabatan.index', [
            'jabatan' => $jabatan
        ]);
    }

    public function select(Request $request)
    {
        $jabatan = [];
        $search = $request->q;
        if($request->has('q')){
            $jabatan= Jabatan::select('id', 'nama_jabatan')->where('nama_jabatan', 'LIKE', "%$search%")->get();
        }else{
            $jabatan = Jabatan::select('id',  'nama_jabatan')->limit(5)->get();
        }

        return response()->json($jabatan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create',[ 
            'jenis_jabatan' => $this->jenis_jabatan()
        ]);
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
            'nama_jabatan' => 'required',
            'jenis_jabatan' => 'required',
            'eselon' => 'required',
            'tmt_jabatan' => 'required',

         ])->validate();

        try {
            Jabatan::create([
                'nama_jabatan' => $request->nama_jabatan,
                'jenis_jabatan' => $request->jenis_jabatan,
                'eselon' => $request->eselon,
                'tmt_jabatan' => $request->tmt_jabatan
            ]);
            return redirect()->route('jabatan.index')->with('message', 'Data berhasil disimpan!');
        }catch (\Throwable $th){

        }return redirect()->back()->withInput($request->all())->withErrors($th);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        return  view('jabatan.edit', [
            'jabatan' => $jabatan,
            'jenis_jabatan' => $this->jenis_jabatan()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        Validator::make(
        $request->all(),[
            'nama_jabatan' => 'required',
            'jenis_jabatan' => 'required',
            'eselon' => 'required',
            'tmt_jabatan' => 'required',

         ])->validate();

        try {
            $jabatan->update([
                'nama_jabatan' => $request->nama_jabatan,
                'jenis_jabatan' => $request->jenis_jabatan,
                'eselon' => $request->eselon,
                'tmt_jabatan' => $request->tmt_jabatan
            ]);
            return redirect()->route('jabatan.index')->with('message', 'Data berhasil diubah!');
        }catch (\Throwable $th){

        }return redirect()->back()->withInput($request->all())->withErrors($th);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        try {
            $jabatan->delete();
            return redirect()->back()->with('message',' Data berhasil dihapus!');
        }catch (\Throwable $th){
            return redirect()->back()->withErrors($th);
        }
    }

    private function jenis_jabatan()
    {
        return [
            'Jabatan Struktural' => 'Jabatan Struktural',
            'Jabatan Fungsional' => 'Jabatan Fungsional',
            'Jabatan Umum' => 'Jabatan Umum'
        ];
    }
}
