@extends('layouts.dashboard')

@section('isidb')

<div class="grid-container-edit" style="padding-top:20px;">
    <div class="item2" style="padding-top:20px;">
        <div style="font-size:25;font-family:Poppins;font-weight:bold;">
            <a href="/dashboard/pegawai" style="text-decoration:none;color:#5A5F49">
                <div class="parent">
        
                    <iconify-icon icon="material-symbols:arrow-right-alt-rounded" rotate="180deg" width="50">
                    </iconify-icon>
                    <div style="padding-left : 20px;padding-top:8px;">
                        Edit Pegawai
                    </div>
                </div>
            </a>
        
        </div>
        
    </div>
    
    <div class="item3" style="padding-top:20px;">
        <div
            style="width:375px;height:600px;background-color:white;font-family:Poppins;padding-top:60px;padding-left:80px;padding-bottom:60px;font-weight:bold;color:#5A5F49;border-radius:30px;">
            Isi form dibawah ini dengan sesuai
    
            <div style="padding-top:40px;" type="hidden">
            </div>
    
            <form method="POST" action="/dashboard/pegawai/{{$pegawai->id}}/edit">
                @csrf
                <label for="nama"> Nama Pegawai* </label>
                <br>
                <input class="formbar" type="text" id="nama" name="nama" placeholder="Nama Produk" style="width:80%;"
                    value="{{$pegawai->nama}}">
    
                <p>
                    <label for="alamat"> Alamat* </label>
                    <br>
                    <input class="formbar" type="text" id="alamat" name="alamat" placeholder="alamat" style="width:80%"
                        value="{{$pegawai->alamat}}">
    
                    <p>
                        <label for="telfon"> Nomor Telefon* </label>
                        <br>
                        <input class="formbar" type="text" id="telfon" name="telfon" placeholder="Nomor telfon"
                            style="width:80%;" value="{{$pegawai->telfon}}">
    
                        <p>
                            <label for="foto"> Foto Profil</label>
                            <br>
                            <input class="formbar" type="text" id="foto" name="foto" placeholder="Link gambar"
                                style="width:80%;" value="{{$pegawai->foto}}">
    
                            <div style="padding-top:30px;padding-left:60px;">
                                <input type="submit" value="Tambah Pegawai" style="background-color:#B3C279">
    
                            </div>
    
            </form>
    
        </div>
    
    </div>
    

</div>



@endsection