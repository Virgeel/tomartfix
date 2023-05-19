@extends('layouts.dashboard')

@section('isidb')


<div class="grid-container-content grid-item-left">

<form action="/dashboard" method="GET">
<div class="item2">
    <div class="parent">

    <div style="padding-right : 100px;padding-top : 40px;">
        <div class="profilbar" style="border-radius:15;width:300;height:40;box-shadow:transparent;">

            <div class="parent">

                <iconify-icon icon="uiw:date" height="25" style="padding-left:15px;padding-top:5px;"></iconify-icon>
                <div style="padding-left:20px;padding-top:8px;">
                    <input type="month" name="tanggal" style="font-family:Poppins;border:none;width:220px;font-weight:bold;color:5A5F49;" value="{{request('filterpenjualan')}}">
                </div>
                
            </div>
            
        </div>
    </div>

    <div style="padding-right : 100px;padding-top : 30px;">
        <div style="border-radius:15;width:200;height:40;box-shadow:none;">
            <div class="parent">
                <div style="padding-left:15px;padding-top:10px">
                    <iconify-icon icon="fluent:people-community-24-filled" height="20" style=""></iconify-icon>
                </div>
                
                <select class = "profilbar" type="text" id="pegawai_id" name="pegawai_id" placeholder="Pilih pegawai" style="position:absolute;width:250px;height:43px;padding-top:10px;border:none;font-weight:bold;color:5A5F49" value="{{request('filterpenjualan')}}" >
                                   
                    <iconify-icon icon="fluent:people-community-24-filled" height="20" >
                    </iconify-icon>
                        
                            
                    <option selected> Pilih Pegawai </option>
                    
                    
                        @foreach($pegawai as $employee)
    
                        <option value="{{$employee->id}}">{{$employee->nama}}</option>
                        @endforeach
    
                </select>

                <div style="padding-top:5px;padding-left:70px;">
                    <iconify-icon icon="material-symbols:keyboard-arrow-down-rounded" height="30" style=""></iconify-icon>

                </div>

            </div>
           
           
        
        </div>
    </div>

    <div style="padding-right : 100px;padding-top : 30px;">
        
        <input type=submit value="Export" style="padding-top:10px;border-radius:15;width:135;height:40;background-color:#B3C279;color:white;box-shadow:none;">
    </div>
    </div>

</div>
  
</form> 

    
    


<div class="item3" style="color:5A5F49;padding-top:80px">
    <div class="parent">
        <div style="width:400;height:150;background-color:white;border-radius:15px;">
    
            <div class="parent">
                <div>
                    <div style="font-size:20;font-family:Poppins;font-weight:bold;padding-top : 20px;padding-left:20px;">
                        Jumlah Penjualan
                    </div>
                    <div style="font-family:Poppins;font-weight:bold;font-size:50;padding-left : 30px;padding-top:10px;">
                        {{$stok->count('id')}}
                    </div>
                </div>
                <div style="padding-top:20px;">
                    <img src= "{{asset('images/jumlah.png')}}" width="200">
                </div>
        
        
            </div>
           
            
        </div>
        <div style="padding-left:30px;">
            <div style="width:400;height:150;background-color:white;border-radius:15px;">
    
                <div class="parent">
                    <div>
                        <div style="font-size:20;font-family:Poppins;font-weight:bold;padding-top : 20px;padding-left:20px;">
                            Total Penjualan
                        </div>
                        <div style="font-family:Poppins;font-weight:bold;font-size:30;padding-left : 30px;padding-top:20px;">
                           Rp.  {{number_format($stok->sum('total'),0,',','.',)}}
                        </div>
                    </div>
                    <div style="">
                        <img src= "{{asset('images/total.png')}}" width="110">
                    </div>
            
            
                </div>
                
            </div>

          
    
        </div>
        
    
    
    
    </div>
    
    <div style="font-family:Poppins;font-weight:bold;padding-top:20px;color:#5A5F49;font-size:19px;">
            Grafik Penjualan
    </div>
    
        <div style="padding-top:5px;"></div>
    
        <div style="font-family:Poppins;color:#5A5F49;font-size:15px;">
            Berikut adalah rincian grafik dari penjualan kamu
    
            <div style="padding-top:30px;"></div>
            <div class="item3" style="width:850px">
                <form action="/dashboard" method="GET">
                @include('layouts.chartpenjualan')
                </form>
            </div>
            
        </div>

    <div style="background-color:white;padding:25px;border-radius:15px;font-family:Poppins;width:max-content;">
        <div class="parent">
            Rata rata penjualan

            <div style="padding-left: 600px;font-weight:bold;">
                Rp.  {{number_format($stok->avg('total'),0,',','.',)}}
            </div>
        </div>

    </div>
    

    
    

</div>


<div class="column item4" style="padding-top:20px;padding-left:20px;">

    <div class="profilbar" style="width:350px;color:5A5F49">

                <div style="padding-top:10px;padding-left:60px;font-size:15px;padding-bottom:5px;">
                Halo,
                <br>
                <div style="font-weight:bold;font-size:20">
                @if(auth()->user()->level=='admin')
                    Admin {{auth()-> user()->nameawal}}
                @elseif(auth()->user()->level=='owner')
                    Owner {{auth()-> user()->nameawal}}
                @endif
                    
                </div>
                </div>
        
    </div>
    <div style="padding-top:20px;"> 
    </div>

    <div class="penjualanbox" style="width:350px;">
            <div>
                <div style="padding-left:20px;padding-top:20px;padding-bottom:10px;">
                    Penjualan Terbaru
                </div>
                
                <div>
                    @include('layouts.penjualanterbaru')
                </div>
                
            </div>
            
    </div>

</div>
    




@endsection