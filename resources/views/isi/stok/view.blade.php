@extends('layouts.dashboard')

@section('isidb')

<div class="column">
 

    <div style="font-size:25;font-family:Poppins;font-weight:bold;position: absolute;right:5%;left:20%; top : 5.5%;">
        
        <div class="parent">
            
            <a href="/dashboard/stok">
            <iconify-icon icon="material-symbols:arrow-right-alt-rounded" rotate="180deg" width="50"></iconify-icon>
            </a>
            <div style="padding-left : 20px;padding-top:8px;">
                Stok hari ini
            </div>
            
            </div>
        
    </div>

    <div class="parent">
        <div style="position: absolute;right:5%;left:24%; top : 15%;">
    
            <div class="profilbar" style="border-radius:15;width:200;height:40;">
        
                <div class="parent">
        
                    <iconify-icon icon="uiw:date" height="25" style="padding-left:15px;padding-top:5px;"></iconify-icon>
                    <div style="padding-left:20px;padding-top:8px;">
                        {{$stok[0]->tanggal}}
                    </div>

                    
                    
                </div>

            </div>

        </div>

                <div style="position: absolute;right:5%;left:45%; top : 14%">
                    <div class="parent">
                     
                            <div>
                                <select class = "profilbar" type="text" id="namaPegawai" name="namaPegawai" placeholder="Pilih pegawai" style="position:absolute;width:250px;height:43px;padding-top:10px;border:none;" >
                                   
                                    <iconify-icon icon="fluent:people-community-24-filled" height="20" >
                                    </iconify-icon>
                                        
                                            
                                    <option selected> {{$stok[0]->pegawai->nama}} </option>
                                    
                                    

                                </select>
                            </div>
                                 


                                    </div>
                               
                            
            
                            <div style="padding-left:700px;">
                                
                                
                            
                        
                       
                        
                    </div>
                </div>

                    
                
            
                <div style="position:absolute;top:20%;">
                    <div style="padding-top:50px;">
                        <table style="width:1400px; background-color:white;border:solid 1px rgb(218, 218, 218); text-align:left;">
                    
                            <thead>
                            <tr style="background-color:#f7f7f7;font-family:Poppins; border:solid 1px rgb(218, 218, 218)">
                               <th style="text-align: center;">
                                #
                               </th>
                               <th style="padding:10px;">
                                Nama Produk
                               </th>
                               <th>
                                Kategori
                               </th>
                               <th style="padding-left:20px;">
                                Harga
                               </th>
                               <th style="padding-left:20px;">
                                Stok Awal
                               </th>
                               <th>
                                Stok Akhir
                               </th>
                               <th>
                                Terjual
                               </th>
                               <th style="text-align:left;">
                                Total
                               </th>
                              
                            </tr>
                        </thead>

                        <tbody>
<?php $count = 1; ?>

@foreach ($stok as $stoks)


<input type="hidden" name="id[]" value="{{ $stoks->id }}">

    
<tr style="font-family:Poppins; ">
    <td style="padding:10px;text-align:center;border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
        {{$count++}}
    </td>
    <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
        <div class="parent" style="padding-bottom:20px;">
        
       <div style="padding-bottom:10px;padding-top:20px;padding-left:20px;">
        <div style="padding-left:10px;">
            {{$stoks->nama}}
        </div>
        
    </div>
       
        </div>
    </td>
    <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse;padding-left:20px;">
        {{$stoks->kategori}}
    </td>
    <td style="border:solid 1px rgb(218, 218, 218);padding-left:20px;">
        Rp. {{$stoks->harga}}
        
    </td>
    <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
        <div style="padding-left:10px;">
            {{$stoks->stokAwal}}
        </div>
    

        
    </td>
    <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
        <div style="padding-left:10px;">
        {{$stoks->stokAkhir}}
        </div>
    </td>

    <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
        <div style="padding-left:10px;">
            {{$stoks->terjual}}
        </div>
        
    </td>
    <td style="border:1px solid rgb(218, 218, 218);border-collapse:collapse">
        <div style="padding-left:10px;">
            Rp. {{number_format($stoks->total,0,',','.',)}}
        </div>
        
    </td>
</tr>

@endforeach
                        </tbody>
                    
                    </table>
    
                  
    
                    
                </div>
    
    </div>
<div class="half-circle" style="font-family:Poppins;text-align:right;position:fixed;">
    <div class="column" style="padding-right:125px;">

        <div style="padding-top:50px;font-size:20px;">
            Total Pendapatan 
        </div>
        <div style="font-size:50px;font-weight:bold">
            Rp {{number_format($hasil,0,',','.',)}}
        </div>
       
    </div>
    
    
</div>
    
                </div>

               
                
           


            


 

            
        
    </div>
    
   
    

</div>
<div style="padding:300px;">
</div>

@endsection