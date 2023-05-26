@section('modal')
<div id="modal{{$employee->id}}" class="modal">
    <div class="modal-content" style="width: 20%;">
        <div class="modal-header" style="background-color: #B3C279">
            {{-- <span class="close">&times;</span> --}}
            <h2 style="font-weight: 100">Informasi Pegawai</h2>
        </div>
        <div class="modal-body"
            style="margin:auto;width:50%;text-align:center;padding-top:10px;">
            <img src="{{$employee->foto}}" style="width: 80%">
            <p> Nama : {{$employee->nama}}</p>
            <p> Alamat : {{$employee->alamat}}</p>
            <p> Nomor : {{$employee->telfon}}</p>
            <p>
                <div id="mapsingle" style="height:300px;width:300px;"> </div>
        </div>
    </div>
</div>

@endsection