@extends('layouts.dashboard')

@section('isidb')

<div class="grid-container-content grid-item-left">
    <form method="POST" action="/dashboard/stok/create">
        @csrf
        <?php $count = 1; ?>

    <div class="item2" style="padding-top:50px;">
            <div
            style="font-size:25;font-family:Poppins;font-weight:bold;">

            <div class="parent">

                <a href="/dashboard/stok" style="text-decoration: none;color:#5A5F49">
                    <iconify-icon icon="material-symbols:arrow-right-alt-rounded" rotate="180deg" width="50"></iconify-icon>
                </a>
                <div style="padding-left : 20px;padding-top:8px;">
                    Buat Stok
                </div>

            </div>

        
        <div class="parent" style="padding-left:20px;">
            <div style="padding-top:20px">

                <div class="profilbar" style="border-radius:15;width:200;height:40;">

                    <div class="parent">

                        <iconify-icon icon="uiw:date" height="25" style="padding-left:15px;padding-top:5px;">
                        </iconify-icon>
                        <div style="padding-left:20px;padding-top:8px;">
                            <input type="date" placeholder="01/01/2000" style="font-family:Poppins;border:none;"
                                name="tanggal">
                        </div>

                    </div>

                </div>

            </div>

            <div style="padding-top:10px;padding-left:20px;">
                <div class="parent">

                    <div>
                        <select class="profilbar" type="text" id="pegawai_id" name="pegawai_id"
                            placeholder="Pilih pegawai"
                            style="width:250px;height:43px;padding-top:10px;border:none;">

                            <iconify-icon icon="fluent:people-community-24-filled" height="20" >
                            </iconify-icon>

                            <option selected> Pilih Pegawai </option>

                            @foreach($pegawai as $employee)

                            <option value="{{$employee->id}}">

                                {{$employee->nama}}

                            </option>

                            @endforeach

                        </select>

                    </div>

                </div>
            </div>
            
            <div style="padding-left:700px;width:400px;">
                    <input type="submit" value="Buat Stok" style="background-color:#B3C279">

            </div>
            </div>

        </div>
    </div>
        
            <div class="item3 grid-item-left">
                <div style="padding-top:50px;">
                    <table
                        style="width:1400px; background-color:white;border:solid 1px rgb(218, 218, 218); text-align:left;">

                        <thead>
                            <tr style="background-color:#f7f7f7;font-family:Poppins;">
                                <th style="text-align: center;">
                                    #
                                </th>
                                <th style="padding:10px;">
                                    Nama Produk
                                </th>
                                <th style="padding-left:20px;">
                                    Kategori
                                </th>
                                <th>
                                    Harga
                                </th>
                                <th>
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

                            @foreach ($products -> skip(0) as $produk)

                            <input type="hidden" name="produk_id[]" value="{{ $produk->id }}">

                            <tr style="font-family:Poppins;">
                                <td
                                    style="padding:10px;text-align:center;border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
                                    {{$count++}}
                                </td>
                                <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
                                    <div class="parent" style="padding-bottom:20px;">
                                        <img src="{{$produk -> foto}}" width="70px"
                                            style="padding-right:20px;padding-top:15px;">

                                        <div style="padding-bottom:10px;padding-top:20px;">
                                            <input type="hidden" name="nama[]" value="{{$produk->nama}}"
                                                style="width:200px;">
                                            {{$produk->nama}}
                                        </div>

                                    </div>
                                </td>
                                <td style="border:solid 1px rgb(218, 218, 218);padding-left:10px;">
                                    <input type="hidden" name="kategori[]" value="{{$produk->kategori}}"
                                        style="width:200px;">
                                    {{$produk->kategori}}
                                </td>
                                <td
                                    style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse;padding-left:10px;">
                                    Rp. {{$produk->harga}}
                                    <input type="hidden" name="harga[]" value="{{$produk->harga}}" style="width:200px;">

                                </td>
                                <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
                                    <input type="text" name="stokAwal[]"
                                        style="height:50px;width:50px;border:none;padding-left:20px">
                                </td>
                                <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
                                    <input type="text" name="stokAkhir[]" style="height:50px;width:50px;border:none">
                                </td>
                                <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
                                    <input type="text" name="terjual[]" style="height:50px;width:50px;border:none">
                                </td>
                                <td style="border:solid 1px rgb(218, 218, 218);border-collapse:collapse">
                                    <input type="text" name="total[]" style="height:50px;width:50px;border:none">
                                </td>
                            </tr>

                            @endforeach
                        </tbody>

                    </table>

                    <div style="padding:100px;">

                    </div>

                </div>

            </div>
        </div>

    </form>

</div>

</div>

@endsection