@extends('layouts.main')

@section('isi')
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

<html>

<title>
    Register Tomart

</title>

<body class="bgregister" style="margin: 0">


        <div style="padding-top: 200px;padding-left: 650px;padding-bottom:300px;">
        <div style="padding: 40px;border-radius:30px;width : 500px;heigth : 300px;background-color:rgba(255,255,255,1);font-family:'Poppins'">
        
            <b> <div style="font-size:30">  Mulai Sekarang </div></b> 
            <br>
            Silakan isi detail informasi untuk membuat akun Anda.

            <br>
            
<div style="font-family:Poppins;padding-top:20px;">
<form action ="/register" method="post">
    @csrf
    <div class="parent">
        <div style="width:1000px;">
            <label for="nameawal"><b>Nama Awal </b></label>
            <br>
            <input class="formbar" type="text" id="nameawal" name="nameawal" placeholder="Nama awal" style="width:230px">
      
        </div>
        <div style="width:1000px;">
            <label for="nameakhir"><b>Nama Akhir </b></label>
    <br>

            <input class="formbar" type="text" id="nameakhir" name="nameakhir" placeholder="Nama akhir" style="width:250px">
      
        </div>
   

    </div>
    
    <label for="email"><b>Email</b></label>
    <br>
    <input class="formbar" type="text" id="email" name="email" placeholder="contoh@gmail.com" style="width:100%">
    <p>

    <label for="password"><b>Password</b></label>
    <br>
    <input class="formbar" type="text" id="password" name="password" placeholder="Password" style="width:100%">
        <p>

    <input type="hidden" id="level" name="level" value="admin">

    <div style="padding-left:175px">
        
    <input type="submit" value="Daftar">
    </div>
</form>   

<div style="font-family:'Poppins';padding-left:100px">
Sudah mempunyai akun ? 
<a href="/login"> <b> Login Sekarang </b> </a>
</div>
</div>
        </div>
        </div>

    </div>
    
</body>

</html>

@endsection