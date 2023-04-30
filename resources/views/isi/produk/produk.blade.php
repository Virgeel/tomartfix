@extends('layouts.dashboard')

@section('isidb')

<div style="position: absolute;right:5%;left:23.5%; top : 5.5%;">

    <div class="parent">

        <div  style="bottom : 200%;width:700px;text-align:left;opacity : 0.5">
            <div class="parent">
    
                <div style="padding-top:10px;font-size:17;padding-left:20px;color:5A5F49">
                    <form action = "/dashboard/produk">
                        <div class="parent">
    
    
                        
                            <input class="search" type="text" placeholder="Cari Produk" name="search" style="font-size:17;width:650px;height:60px;border-top-left-radius:15px;border-top-right-radius:0;border-bottom-right-radius:0;border-bottom-left-radius:15px;background-color:#B3C279" value="{{request('search')}}">

                            <div style="padding-top:8px;">
                                <button style="background-color:#B3C279;height:60px;width:50px;border-top-right-radius:15px;border-bottom-right-radius:15px;border:none;">
                                    <iconify-icon icon="il:search" height="20" style="color:#5A5F49"></iconify-icon> 
                                </button>
                            </div>
                        <div style="padding-left:535px;">
                            
                        
                        </div>
                    </div>
                    </form>   
                    </div>
                
               
    
      
            
        </div>
    </div>
    <div style="padding-left:500px;">
        <a href="/dashboard/produk/tambah">
        <div class="addbutton" style=>
            <div style="padding-top:10px;font-size:15;">
            Tambah Produk
            </div>
        </div>
    </a>
        
    </div>
    
    
    

</div>


@if($products -> count())

<div style="padding-top:50px" type="hidden">


</div>
    <table style="width:1400px; background-color:white;border-collapse:collapse; text-align:left;">

        <thead>
        <tr style="background-color:#f7f7f7;font-family:Inter;">
           <th style="text-align: center;">
            #
           </th>
           <th style="padding:10px;">
            Nama Produk
           </th>
           <th>
            Kategori
           </th>
           <th style="text-align:left;">
            Harga
           </th>
           <th style="text-align:left;">
            EDIT
           </th>
           <th style="text-align:left;">
            HAPUS
           </th>
        </tr>
    </thead>
    
    <?php $count = 1; ?>
@foreach ($products -> skip(0) as $produk)
    
        <tr style="font-family:Inter;">
            <td style="padding:10px;text-align:center">
                {{$count++}}
            </td>
            <td>
                <div class="parent" style="padding-bottom:20px;">
 <img src ="{{$produk -> foto}}" width="70px" style="padding-right:20px;padding-top:15px;">
                
               <div style="padding-bottom:10px;padding-top:20px;">
                {{$produk -> nama}}
            </div>
               
                </div>
            </td>
            <td>
                {{$produk -> kategori}}
            </td>
            <td>
                Rp. {{number_format($produk -> harga,0,',','.',)}}
            </td>
            <td>
                <a href="/dashboard/produk/{{$produk -> id}}/edit"> 
                    <div class="editbutton">
                        EDIT
                    </div>
                        
                </a>
            </td>
            <td>
                <div style="padding-top:15px;">
                <form action="/dashboard/produk/{{$produk->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    
                    <input type="submit" value="HAPUS"  onclick="return confirm('Pegawai ini akan dihapus')" style="padding-top:3;
                    text-align: center;
                    width: 90;
                    height: 28;
                    border:none;
                    background-color: #E64A3B;
                    border-radius:5px;
                    color:white;
                    font-family: Poppins;
                    font-weight:400;
                    font-size: 15;
                    cursor : pointer;">
                </form>
            </div>
            </td>
        </tr>
      
        @endforeach

    </table>

    <div style="padding-top : 20px;font-family:Inter;color:white">
        {!! $products->links('vendor/pagination/default') !!}

    </div>

    
    
  
@else

<table style="width:1400px; background-color:white;border-collapse:collapse; text-align:left;">

    <thead>
    <tr style="background-color:#f7f7f7;font-family:Poppins;">
       <th style="text-align: center;">
        #
       </th>
       <th style="padding:10px;">
        Nama Produk
       </th>
       <th>
        Kategori
       </th>
       <th style="text-align:left;">
        Harga
       </th>
       <th style="text-align:left;">
        EDIT
       </th>
       <th style="text-align:left;">
        HAPUS
       </th>
    </tr>
</thead>



</table>
<div style="background-color:white;font-family:Poppins;padding:40px;text-align:center;width:1320px;">
    Data tidak ditemukan
</div>

    


    @endif

    


@endsection


