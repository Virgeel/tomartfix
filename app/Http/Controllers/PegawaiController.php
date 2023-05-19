<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('isi.pegawai.createpegawai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedPegawai = $request -> validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telfon' => 'required',
            'foto' => '',
        
        


        ]);
        Pegawai::create($validatedPegawai);

        return redirect('/dashboard/pegawai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
            $pegawai = Pegawai::where('id', $id)
            ->get();
            
            return view('isi.pegawai.view', [
            'pegawai' => $pegawai
    
    
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai=Pegawai::where('id',$id)->first();
        return view('isi.pegawai.editpegawai',[
            'pegawai' => $pegawai,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegawaiRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedPegawai = $request -> validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telfon' => 'required',
            'foto' => '',
        
    ]);

    Pegawai::where('id',$request->id)->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'telfon' => $request->telfon,
        'foto' => $request->foto
    ]);

    return redirect('/dashboard/pegawai')->with('updated','Item telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::destroy($id);

        return redirect('/dashboard/pegawai')->with('deleted', 'Item Baru Telah Dihapus!');
    }
}
