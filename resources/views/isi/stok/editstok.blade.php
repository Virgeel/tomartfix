@extends('layouts.dashboard')

@section('isidb')

<div class="grid-container-content grid-item-left">
    <form method="POST" action="/dashboard/stok/{{$stok[0]->pegawai_id}}/{{$stok[0]->tanggal}}/edit">
        @csrf

        <div class="item2" style="padding-top:50px;">
            <div style="font-size:25;font-family:Poppins;font-weight:bold;">

                <div class="parent">
    
                    <iconify-icon icon="material-symbols:arrow-right-alt-rounded" rotate="180deg" width="50"></iconify-icon>
                    <div style="padding-left : 20px;padding-top:8px;">
                        Edit Stok
                    </div>
    
                </div>
    
            </div>
    
            <div class="parent" style="padding-left:20px;">
                <div style="padding-top:20px;">
    
                    <div class="profilbar" style="border-radius:15;width:200;height:40;">
    
                        <div class="parent">
    
                            <iconify-icon icon="uiw:date" height="25" style="padding-left:15px;padding-top:5px;">
                            </iconify-icon>
                            <div style="padding-left:20px;padding-top:8px;">
    
                                <input type="date" placeholder="01/01/2000" style="font-family:Poppins;border:none;"
                                    name="tanggal" value="{{$stok[0]->tanggal}}">
                            </div>
    
                        </div>
    
                    </div>
    
                </div>
    
                <div style="padding-top:10px;padding-left:20px;">
                    <div class="parent">
    
                        <div>
                            <select class="profilbar" type="text" id="namaPegawai" name="namaPegawai"
                                placeholder="Pilih pegawai" style=";width:250px;height:43px;padding-top:10px;border:none;">
    
                                <iconify-icon icon="fluent:people-community-24-filled" height="20">
                                </iconify-icon>
    
                                <option selected> {{$stok[0]->pegawai->nama}} </option>
    
                            </select>
                        </div>
                    </div>
                </div>

                <div style="padding-left:700px;width:400px;">
                        <input type="submit" value="Simpan" style="background-color:#B3C279">
                </div>
            </div>
        
        </div>
        
        <div class="item3 grid-item-left">
            <div style="padding-top:50px;">
                <table
                    style="width:1400px; background-color:white;border:solid 1px rgb(218, 218, 218); text-align:left;">

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
                            <td
                                style="padding:10px;text-align:center;border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
                                {{$count++}}
                            </td>
                            <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
                                <div class="parent" style="padding-bottom:20px;">

                                    <div style="padding-bottom:10px;padding-top:20px;padding-left:20px;">
                                        <input type="hidden" name="nama[]" value="{{$stoks->nama}}"
                                            style="width:200px;">
                                        {{$stoks->nama}}
                                    </div>

                                </div>
                            </td>
                            <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse;padding-left:20px;">
                                <input type="hidden" name="kategori[]" value="{{$stoks->kategori}}"
                                    style="width:200px;">
                                {{$stoks->kategori}}
                            </td>
                            <td style="border:solid 1px rgb(218, 218, 218);padding-left:20px;">
                                Rp. {{$stoks->harga}}
                                <input type="hidden" name="harga[{{$stoks->id}}]" value="{{$stoks->harga}}"
                                    style="width:200px;">

                            </td>
                            <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
                                <div style="padding-left:10px;">

                                    <input type="number" name="stokAwal[{{$stoks->id}}]" style="width:100px;"
                                        value="{{$stoks->stokAwal}}">

                                </div>

                            </td>
                            <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
                                <div style="padding-left:10px;">

                                    <input type="number" name="stokAkhir[{{$stoks->id}}]" style="width:100px;"
                                        value="{{$stoks->stokAkhir}}">
                                </div>
                            </td>

                            <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
                                <div style="padding-left:10px;">
                                    <input type="hidden" name="terjual[{{$stoks->id}}]" style="width:100px;"
                                        value="{{$stoks->terjual}}">
                                    {{$stoks->terjual}}
                                </div>

                            </td>
                            <td style="border:1px solid rgb(218, 218, 218);border-collapse:collapse">
                                <div style="padding-left:10px;">
                                    <input type="hidden" name="total[{{$stoks->id}}]" style="width:100px;"
                                        value="{{$stoks->total}}">
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



</form>



</div>
<div style="padding:300px;">
</div>

@endsection