<html>
<link rel="stylesheet" href ="{{asset('css/styles.css')}}">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://code.iconify.design/iconify-icon/1.0.3/iconify-icon.min.js"></script>

<title> Dashboard Tomart </title>

<body class="grid-container" style ="margin: 0;background-color:#eef2df;">
    
<div class="bgdashboard">

    

        <div class="item1">
            @include('isi.sidebar')
        </div>
            

        <div class="item3">
                @yield('isidb')

            </div>
        
            
        

        
    
    

</div>

        
<script>
    // Get all modal buttons
    var modalBtns = document.getElementsByClassName("modal-btn");
    
    // Iterate over modal buttons and attach click event listener
    for (var i = 0; i < modalBtns.length; i++) {
        modalBtns[i].addEventListener("click", function() {
            var modalId = this.getAttribute("data-modal-id");
            var modal = document.getElementById(modalId);
            modal.style.display = "block";
        });
    }
    
    // Get all close buttons
    var closeBtns = document.getElementsByClassName("close");
    
    // Iterate over close buttons and attach click event listener
    for (var i = 0; i < closeBtns.length; i++) {
        closeBtns[i].addEventListener("click", function() {
            var modal = this.parentNode.parentNode;
            modal.style.display = "none";
        });
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener("click", function(event) {
        if (event.target.classList.contains("modal")) {
            event.target.style.display = "none";
        }
    });
</script>


</body>
</html>