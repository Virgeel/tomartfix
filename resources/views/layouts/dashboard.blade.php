<link rel="stylesheet" href ="{{asset('css/styles.css')}}">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://code.iconify.design/iconify-icon/1.0.3/iconify-icon.min.js"></script>

<title> Dashboard Tomart </title>

<body style ="margin: 0;background-color:#eef2df;">
    
<div class="bgdashboard">

    <div class="row">
        
            @include('isi.sidebar')

            <div style="padding-left:450px;">
                
                
                @yield('isidb')

            </div>
        
            
        

        
    </div>
    

</div>

</body>