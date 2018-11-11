<?php
    include_once("menu.php");
    $latitud=$_GET['latitud'];
    $longitud=$_GET['longitud'];
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Visitas</h1>
            <p>Registro de visitas</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Sample Forms</a></li>
        </ul>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center><h3>Visitas</h3></center>
                    </div>
                    <div class="form-group-lg">
                        <div class="col-md-4"><p id="demo">Click en el bottom para mostrar su ubicación</p></div>
                        <div class="col-md-2"><button class="btn btn-primary" onclick="getLocation()">Ubicar</button></div>
                        <br>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12"><div id="mapholder"></div></div>
                    </div>
                    <div class="form-group row" hidden>
                        <div class="col-md-2"><label class="col-form-label text-md-right" for="latitud">Latitud:</label></div>
                        <div class="col-md-4"><input class="form-control" type="text" name="latitud" id="latitud" required></div>
                    </div>
                    <div class="form-group row" hidden>
                        <div class="col-md-2"><label class="col-form-label text-md-right" for="longitud">Longitud:</label></div>
                        <div class="col-md-4"><input class="form-control" type="text" name="longitud" id="longitud" required></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyAUIE4qNC1oK13FQyhTP5NVzBIcrN7WMas"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->
<script>
    var x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;
        var latlon = new google.maps.LatLng(lat, lon)
        var mapholder = document.getElementById('mapholder')
        var lat1 = document.getElementById('latitud')
        var lon1 = document.getElementById('longitud')
        mapholder.style.height= '15em';
        mapholder.style.width = '20em';

        lat1.setAttribute("value", lat);
        lon1.setAttribute("value", lon);

        var myOptions = {
            center:latlon,zoom:14,
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            mapTypeControl:false,
            navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
        }

        var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
        var marker = new google.maps.Marker({position:latlon,map:map,title:"Estas aquí!"});
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "Usuario denegó la solicitud de geolocalización."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "La información de ubicación no está disponible."
                break;
            case error.TIMEOUT:
                x.innerHTML = "La solicitud para agotar el tiempo de espera de la ubicación del usuario."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "Un error desconocido ocurrió."
                break;
        }
    }
</script>