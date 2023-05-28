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

    public function landing(Request $request)
    {
        $pegawai_id = $request->input('pegawai_id');
        $tanggal = $request->input('tanggal');

        $startDate = Carbon::parse($tanggal)->startOfMonth();
        $endDate = Carbon::parse($tanggal)->endOfMonth();

        $tanggal = [];
        for ($i = 1; $i <= 31; $i++) {
            $date = Carbon::createFromDate($startDate->format('Y'), $startDate->format('m'), $i);
            if ($date->lte($endDate) && $date->gte($startDate)) {
                $tanggals[] = $date->format('d');
            } else {
                $tanggals[] = null;
            }
        }

        // Generate all dates between start and end dates
        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            $tanggal[] = $currentDate->format('d');
            $currentDate->addDay();
        }

$stok = Stok::query()
    ->whereBetween('tanggal', [$startDate, $endDate])
    ->select('pegawai_id', 'tanggal', DB::raw('SUM(total) as total'))
    ->groupBy('pegawai_id', 'tanggal')
    ->orderBy('tanggal', 'asc')
    ->get();

$penjualan = Stok::query()
    ->select('pegawai_id', 'tanggal', DB::raw('SUM(total) as total'))
    ->with('pegawai')
    ->groupBy('pegawai_id', 'tanggal')
    ->orderBy('tanggal', 'asc')
    ->get();

// Populate the total values for each date from the database results
$total = [];
foreach ($tanggal as $date) {
    $matchingStok = $stok->first(function ($item) use ($date) {
        return Carbon::parse($item->tanggal)->format('d') === $date;
    });
    $total[$date] = $matchingStok ? $matchingStok->total : 0;
}


return view('isi/dashboard', [
    "products" => Produk::all(),
    "pegawai" => Pegawai::all(),
    "stok" => $stok,
    "tanggal" => $tanggal,
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