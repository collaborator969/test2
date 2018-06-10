<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
  <div>
    <a href="manage_users.php">Manage users</a>
    <br><br>
            
  </div>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 50.45466, lng: 30.5238};
        var uluru1 = {lat: 50.45202, lng: 30.5234}; 
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
        var marker1 = new google.maps.Marker({
          position: uluru1,
          map: map
        });
        var marker2 = new google.maps.Marker({
          position: {lat: 50.45102, lng: 30.5284},
          map: map
        });
        var marker2 = new google.maps.Marker({
          position: {lat: 50.45602, lng: 30.5214},
          map: map
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
        var marker1 = new google.maps.Marker({
          position: uluru1,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlI7xpGZFeqkvBov_lUxSI7f6LdBV8toU&callback=initMap">
    </script>
    <?php
    //$sUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyAlI7xpGZFeqkvBov_lUxSI7f6LdBV8toU";
    //$strJson = htmlspecialchars(file_get_contents($sUrl));
    //echo $strJson;
    //$obj = json_decode($strJson, true);
    //$obj = json_decode($strJson);
    //echo "---------------------------";
    //echo $obj->results[2];
    //echo $obj->"results"->geometry->location->lat;
    //$sUrl2 = "https://maps.googleapis.com/maps/api/geocode/xml?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyAlI7xpGZFeqkvBov_lUxSI7f6LdBV8toU";
    //$sUrl2 = "https://maps.googleapis.com/maps/api/geocode/xml?address=04080+Obolonskay+str,+Kiev+Ukraine&key=AIzaSyAlI7xpGZFeqkvBov_lUxSI7f6LdBV8toU";   
    //$adrr = "12345 Украина Киев пр. Оболонский, 34б"
    //$xml = simplexml_load_file($sUrl2);
    //echo $xml->result->geometry->location->lat;
    //echo $xml->result->geometry->location->lng;
    
 


?>

  </body>
</html>