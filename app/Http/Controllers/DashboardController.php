<?php

namespace App\Http\Controllers;


use App\Models\Produk;
use App\Models\Stok;
use App\Models\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //

    public function landing(Request $request){
        $pegawai_id = $request->input('pegawai_id');

    $tanggal = $request->input('tanggal');

    $startDate = Carbon::parse($tanggal)->startOfMonth();
    $endDate = Carbon::parse($tanggal)->endOfMonth();

    for ($i = 1; $i <= 31; $i++) {
        $date = Carbon::createFromDate($startDate->format('Y'), $startDate->format('m'), $i);
        if ($date->lte($endDate) && $date->gte($startDate)) {
            $tanggals[] = $date->format('d');
        } else {
            $tanggals[] = null;
        }
    }
    
    $stok = Stok::query()
    ->where('pegawai_id', $pegawai_id)
    ->whereBetween('tanggal', [$startDate, $endDate])
    ->select('pegawai_id', 'tanggal', DB::raw('SUM(total) as total'))
    ->groupBy('pegawai_id','tanggal')
    ->orderBy('tanggal', 'asc')
    ->get()
    ->map(function($item){
        $item->tanggal = Carbon::parse($item->tanggal)->startOfDay();
        return $item;
    });

    //Default Value perhari adalah 0
    $total = array_fill_keys($tanggals, 0);

    //Nampilin dalam bentuk harian
    foreach ($stok as $result) {
        $total[$result->tanggal->format('d')] = $result->total;
    }
    
    $total = array_values($total);
    
    
    $penjualan = Stok::query()
        
    ->select('pegawai_id','tanggal',DB::raw('SUM(total) as total'))
    ->with('pegawai')
    ->groupBy('pegawai_id','tanggal')
    ->orderBy('tanggal','asc')
    ->distinct('pegawai_id')
    ->get();


    if(request('filterpenjualan')){
        $stok -> where('pegawai_id','like','%' ,'tanggal' . request('filterpegawai') . '%');

    }
        
        return view('isi/dashboard',[
            "products" => Produk::all(),
            "pegawai" => Pegawai::all(),
            "stok" => $stok,
            "tanggal" => $tanggals,
            "penjualan" => $penjualan,
            "date" => $startDate->format('Y-m-d') . ' - ' . $endDate->format('Y-m-d'),
            "total" => $total,
        ]);
    }

    public function penjualanterbaru(){
        return view('layouts.penjualanterbaru');
    }

    public function produk(){
        return view('isi/produk/produk');
    }

    public function pegawai(){

        
        $pegawai = Pegawai::latest();

        if(request('search')){
            $pegawai -> where('nama','like','%' . request('search') . '%');
        }

        return view('isi/pegawai/pegawai',[
            "products" => Produk::all(),
            "pegawai" => $pegawai->get()
        ]);
        
    }

    public function stok(Request $request){
        $tanggal = $request->input('tanggal');
        $stok = Stok::query()
                ->when($tanggal, function($query, $tanggal) {
                    return $query->whereDate('tanggal', $tanggal);
                })
                
                ->select('pegawai_id','tanggal',DB::raw('SUM(total) as total'))
                ->with('pegawai')
                ->groupBy('pegawai_id','tanggal')
                ->orderBy('id','asc')
                ->distinct('pegawai_id')
                ->latest();

        
    
        
        $pegawai = Pegawai::all();

        return view('isi/stok/stok',[
            "products" => Produk::all(),
            "pegawai" => Pegawai::all(),
            "stok" => $stok->paginate(10),
        ], );
    }
    
}
