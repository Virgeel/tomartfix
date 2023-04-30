@extends('layouts.main')

@section('isi')


<title>
    Login Tomart
</title>

<body style="margin: 0;">
    <div class="loginbg">
        <div style="padding-top:300px;padding-left:200px;">
            <img src="{{asset('images/comma.png')}}" width="105" height="74">
            <img src="{{asset('images/comma.png')}}" width="105" height="74">
        <div style="border-radius:10px;background: rgba(255,255,255,0.6);background-size:200px;width : 600px;heigth : 5000px;font-size:32px;padding:40px;font-weight:semi-bold">
            Lakukan apa yang kamu bisa,<br>
gunakan apa yang kamu miliki, <br>
mulailah dari mana kamu berada.
</div>
        </div>
    </div>

<div style="padding-left:1200px;padding-top:200px">
<div style="font-weight:bold;font-size:25px;font-family:'Poppins">
    Selamat Datang

</div>

<div style="font-size:17px;padding-top:10px;font-family:'Poppins">
    Silakan isi data akun yang telah terdaftar <br> sebelumnya

</div>

<div style="font-family:Poppins;padding-top:20px;">
<form action ="/login" method="post">
    @csrf
    <label for="email">
        <b>Email</b>
        </label>

    <br>
    <div class="input-box">
            
            <iconify-icon icon="ic:outline-email" height="30" style="color:gray;position: absolute;padding:10px;"></iconify-icon>
            <input type="email" class="input-field" id="email" name="email" placeholder="Masukkan email" style="padding-left:50px;" >
       
            @error('email')
        <div class="invalid-feedback">
            {{$message}}
    
        </div>
    @enderror
    </div>
        
        
   
   

    

    <p>
    
    <label for="password"><b>Password</b></label>

    

    <br>
    <div class="input-box">
        <iconify-icon icon="mdi:lock" height="30" style="color:gray;padding:10px;position: absolute;"></iconify-icon>
        <input class="input-field" type="password" id="password" name="password" placeholder="Password" style="padding-left:50px">
        
        @error('password')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror  

    </div>
    
    <p>
    <input type="submit" value="Masuk">
</form>   

<div style="font-family:'Poppins'">
Belum mempunyai akun ? 
<a href="/register"> <b> Daftar Sekarang </b> </a>
</div>
</div>

</div>
</body>

@endsection

