@extends('layouts.dashboard')

@section('isidb')

<div class="grid-container-edit" style="padding-top:20px;">
    <div class="item2" style="padding-top:20px;">
        <div style="font-size:25;font-family:Poppins;font-weight:bold;">
            <a href="/dashboard/produk/" style="text-decoration:none;color:#5A5F49">
                <div class="parent">

                    <iconify-icon icon="material-symbols:arrow-right-alt-rounded" rotate="180deg" width="50">
                    </iconify-icon>
                    <div style="padding-left : 20px;padding-top:8px;">
                        Edit Produk
                    </div>
                </div>
            </a>

        </div>
    </div>

    <div class="item3" style="padding-top:20px;">

        <div
            style="width:375px;height:600px;background-color:white;font-family:Poppins;padding-top:60px;padding-left:80px;padding-bottom:60px;font-weight:bold;color:#5A5F49;border-radius:30px;">
            Edit data
            <div style="padding-top:40px;" type="hidden">
            </div>

            <form method="POST" action="/dashboard/produk/{{$products->id}}/edit">
                @csrf
                <label for="nama"> Nama Produk* </label>
                <br>
                <input class="formbar" type="text" id="nama" name="nama" placeholder="Nama Produk" style="width:80%;"
                    value="{{$products->nama}}">

                <p>
                    <label for="kategori"> Kategori* </label>
                    <br>
                    <select type="text" id="kategori" name="kategori" placeholder="Kategori produk" style="width:80%;">
                        <option selected>{{$products->kategori}}</option>
                        <option value="Sayur">Sayur</option>
                        <option value="Bawang">Bawang</option>
                        <option value="Cabai">Cabai</option>
                        <option value="Lauk">Lauk</option>
                        <option value="Buah">Buah</option>
                    </select>

                    <p>
                        <label for="harga"> Harga* </label>
                        <br>
                        <input class="formbar" type="text" id="harga" name="harga" placeholder="Nama Produk"
                            style="width:80%;" value="{{$products->harga}}">

                        <p>
                            <label for="foto"> Link Gambar</label>
                            <br>
                            <input class="formbar" type="text" id="foto" name="foto" placeholder="Link gambar"
                                style="width:80%;" value="{{$products->foto}}">

                            <div style="padding-top:30px;padding-left:60px;">
                                <input type="submit" value="Perbarui Produk" style="background-color:#B3C279">

                            </div>

            </form>

        </div>

    </div>

</div>

@endsection