<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    //

    public function index(){

        $products = Produk::latest();

        if(request('search')){
            $products -> where('nama','like','%' . request('search') . '%');
        }


        return view('isi.produk.produk',[
            "products" => $products->paginate(6)

        ]);

    }
    public function tambah(){
        return view('isi.produk.createproduk',[
        ]);
    }

    public function store(Request $request)
    {
        $validatedProduk = $request -> validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'foto' => '',
        
        


        ]);
        Produk::create($validatedProduk);

        return redirect('/dashboard/produk');
    

}
    

    public function destroy($id){

        Produk::destroy($id);

        return redirect('/dashboard/produk')->with('deleted', 'Item Baru Telah Dihapus!');
    }

    public function edit($id){
        $products=Produk::where('id',$id)->first();
        return view('isi.produk.editproduk',[
            'products' => $products,
        ]);
}

public function update(Request $request){
        
   
    $validatedData = $request -> validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'foto' => '',
        
    ]);

    Produk::where('id',$request->id)->update([
        'nama' => $request->nama,
        'kategori' => $request->kategori,
        'harga' => $request->harga,
        'foto' => $request->foto
    ]);

    return redirect('/dashboard/produk')->with('updated','Item telah diupdate!');

    
}

    
}