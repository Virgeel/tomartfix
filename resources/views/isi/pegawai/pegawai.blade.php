@extends('layouts.dashboard')

@section('isidb')

<div style="position: absolute;right:5%;left:23.5%; top : 5.5%;">

<div class="parent">

    <div  style="bottom : 200%;width:700px;text-align:left;opacity : 0.5">
        <div class="parent">

            <div style="padding-top:10px;font-size:17;padding-left:20px;color:5A5F49">
                <form action = "/dashboard/pegawai">
                    <div class="parent">


                    
                    <input class="search" type="text" placeholder="Cari Pegawai" name="search" style="font-size:17;width:650px;height:60px;border-top-left-radius:15px;border-top-right-radius:0;border-bottom-right-radius:0;border-bottom-left-radius:15px;background-color:#B3C279" value="{{request('search')}}">

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
        <a href="/dashboard/pegawai/tambah">
        <div class="addbutton" style=>
            <div style="padding-top:10px;font-size:15;">
            Tambah Pegawai
            </div>
        </div>
    </a>
        
    </div>
    
    
    

</div>

@if($pegawai -> count())
<div style="padding-top:50px" type="hidden">


</div>
    <table style="width:1400px; background-color:white;border-collapse:collapse; text-align:left;">

        <thead>
        <tr style="background-color:#f7f7f7;font-family:Poppins;">
           <th style="text-align: center;">
            #
           </th>
           <th style="padding:10px;">
            Nama Pegawai
           </th>
           <th>
            Alamat
           </th>
           <th style="text-align:left;">
            No Telefon
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
@foreach ($pegawai -> skip(0) as $employee)
    
        <tr style="font-family:Poppins;">
            <td style="padding:10px;text-align:center">
                {{$count++}}
            </td>
            <td>
                <div class="parent" style="padding-bottom:20px;">
                    <div style="padding-top:10px;padding-right:20px;">
                        <img src="{{$employee->foto}}" width="50px;" height="50px;" style="border-radius:50%;">
                    </div>             
               <div style="padding-bottom:10px;padding-top:20px;">
                {{$employee -> nama}}
            </div>
               
                </div>
            </td>
            <td>
                {{$employee -> alamat}}
            </td>
            <td>
                {{$employee -> telfon}}
            </td>
            <td>
                <a href="/dashboard/pegawai/{{$employee -> id}}/edit"> 
                    <div class="editbutton">
                        EDIT
                    </div>
                        
                </a>
            </td>
            <td>

                <div style="padding-top:13px;">
                    <form action="/dashboard/pegawai/{{$employee->id}}" method="post">
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
                    cursor : pointer;"> </form>
                </div>
                
            </td>
        </tr>
      
        @endforeach

    </table>


@else

<table style="width:1400px; background-color:white;border-collapse:collapse; text-align:left;">

    <thead>
    <tr style="background-color:#f7f7f7;font-family:Poppins;">
       <th style="text-align: center;">
        #
       </th>
       <th style="padding:10px;">
        Nama Pegawai
       </th>
       <th>
        Alamat
       </th>
       <th style="text-align:left;">
        No Telefon
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