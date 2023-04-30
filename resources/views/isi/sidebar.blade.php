
<div style="padding-left:50px;padding-top:20px;">
    <div class="sidebardashboard">
    <div class="column">
        <div style="position: relative;right:30%;bottom:30%;">
        <img src = "{{asset('images/logo.png')}}" width="360px">
        </div>
        <div style="position: relative;bottom:40%;">
        <a class="sidebarrow {{Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard" style="text-decoration:none;">
            <iconify-icon icon="material-symbols:grid-view-outline-rounded" height="30" ></iconify-icon>
            <div style="padding-left : 10px;font-family:Poppins;font-size:18;font-weight:bold;">
            Dashboard</div>
            </a>
        <a class="sidebarrow {{Request::is('dashboard/produk*') ? 'active' : ''}}" href ="/dashboard/produk" style="text-decoration:none;">
            <iconify-icon icon="game-icons:tomato" height="30" style=""></iconify-icon>
            <div style="padding-left : 10px;font-family:Poppins;font-size:18;font-weight:bold;">
            Produk</div>
            </a>
        <a class="sidebarrow {{Request::is('dashboard/pegawai*') ? 'active' : ''}}" href="/dashboard/pegawai" style="text-decoration:none;">
            <iconify-icon icon="fluent:people-community-24-filled" height="30" style=""></iconify-icon>
            <div style="padding-left : 10px;font-family:Poppins;font-size:18;font-weight:bold;">
            Pegawai</div>
            </a>

        <a class="sidebarrow {{Request::is('dashboard/stok*') ? 'active' : ''}}" href="/dashboard/stok" style="text-decoration:none;">
            <iconify-icon icon="material-symbols:list-alt" height="30" style=""></iconify-icon>
            <div style="padding-left : 10px;font-family:Poppins;font-size:18;font-weight:bold;">
            Stok Jalan</div>
            </a>
       
        <div style="padding-top:300px;">
        <form action="/logout" method="post">
        <button type="submit" style="box-shadow:none;">
        <div class="row" style="font-family:Poppins;font-size:19;font-weight:bold;;cursor: pointer;color :5A5F49">
            Logout
            
                @csrf
            <iconify-icon icon="material-symbols:logout" height="30" style=";padding-left:150px;" ></iconify-icon>
        </button>
        
        </div>
        
        </div>
       
    </form>
    </div>
    </div>
       
    </div>
</div>