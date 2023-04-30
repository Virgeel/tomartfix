<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Pegawai;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $products = Produk::latest();

        if(request('search')){
            $products -> where('nama','like','%' . request('search') . '%');
        }
        return view('isi.stok.createstok',[
            "pegawai" => Pegawai::all(),
            "products" => $products->get(),
        ]);

       
    }

    // public function produk()
    // {

    //     $products = Produk::latest();

    //     if(request('search')){
    //         $products -> where('nama','like','%' . request('search') . '%');
    //     }

    //     return view('isi.stok.createstokproduk',[
    //         "products" => $products->get()
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedStok = $request -> validate([

                'nama.*' => 'required',
                'kategori.*' => '',
                'harga.*' => '',
                'pegawai_id' => 'required|exists:pegawais,id',
                'produk_id.*' => 'required|exists:produks,id',
                'tanggal.*' => 'required',
                'stokAwal.*' => 'required',
                'stokAkhir.*' => '',
                'terjual.*' => '',
                'total.*' => '',
            ]);

            foreach ($validatedStok['produk_id'] as $index => $productId) {

                $terjual = $validatedStok['stokAwal'][$index];

                if (isset($validatedStok['stokAkhir'][$index])) {
                    $terjual -= $validatedStok['stokAkhir'][$index];
                }
        
                $total = $terjual * $validatedStok['harga'][$index];

                $stok = new Stok([
                   
                    'nama' => $validatedStok['nama'][$index],
                    'kategori' => $validatedStok['kategori'][$index],
                    'harga' => $validatedStok['harga'][$index],
                    'tanggal' => $request->input('tanggal'),
                    'stokAwal' => $validatedStok['stokAwal'][$index],
                    'stokAhir' => $validatedStok['stokAkhir'][$index],
                    'total' => $validatedStok['total'][$index],
                    'produk_id' => $validatedStok['produk_id'][$index],
                    'pegawai_id' => $request->input('pegawai_id'),

                ]);

                

                
                // 'terjual' => $validatedStok['terjual'][$index],

                


                $produk = Produk::find($productId);
                $produk->stok()->save($stok);

            }
    
            return redirect('/dashboard/stok')->with('success', 'Stok berhasil ditambahkan.');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit($pegawai_id, $tanggal)
{ 
    $stok = Stok::where('pegawai_id', $pegawai_id)
                ->where('tanggal', $tanggal)
                ->with('produk')
                ->get();


    $hasil = Stok::where('pegawai_id' ,$pegawai_id)
                    ->where('tanggal',$tanggal)
                    ->sum('total');

    

    return view('isi.stok.editstok', [
        'stok' => $stok,
        'hasil' => $hasil,
        

    ]);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStokRequest  $request
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pegawai_id, $tanggal)
    {
        $validatedStok = $request -> validate([

            'id' => 'required|array',         
            'stokAwal.*' => '',
            'stokAkhir.*' => '',
            'terjual.*' => '',
            'total.*' => '',
            'harga.*' => '',
        ]);

        foreach ($validatedStok['id'] as $index => $id) {

            $stokAwal = $validatedStok['stokAwal'][$id];
            $stokAkhir = $validatedStok['stokAkhir'][$id] ?? null;
            $harga = $validatedStok['harga'][$id];
        
            if ($stokAkhir !== null) {
                $terjual = $stokAwal - $stokAkhir;
                $total = $terjual * $harga;
            } else {
                $terjual = null;
                $total = null;
            }

            Stok::where('pegawai_id',$pegawai_id)
                        ->where('tanggal',$tanggal)
                        ->where('id',$id)
                        ->update([
               
                            'stokAwal' => $stokAwal,
                            'stokAkhir' => $stokAkhir,
                            'terjual' => $terjual,
                            'total' => $total,

            ]);

        }
        
        

        
        return redirect('/dashboard/stok')->with('success', 'Stok berhasil ditambahkan.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy($pegawai_id, $tanggal)
    {
        Stok::where('pegawai_id',$pegawai_id)
                ->where('tanggal',$tanggal)
                ->delete();


                return redirect('/dashboard/stok')->with('deleted', 'Item Baru Telah Dihapus!');
        
            }
        }