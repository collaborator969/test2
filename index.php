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
    <?php
    echo "<script>";
    echo "function initMap() {";
        echo "var uluru = {lat: 38.8926815, lng: -77.0131214};";
        echo "var uluru1 = {lat: 50.45202, lng: 30.5234};";
        echo "var map = new google.maps.Map(document.getElementById('map'), {";
            echo "zoom: 10,";
            echo "center: uluru";
            echo "});";
            require_once 'connection.php';
            $link = mysqli_connect($host, $user, $password, $database) 
                    or die("Ошибка " . mysqli_error($link));

            $query ="SELECT bi_image, c_name, c_adres, id FROM bd_test.spr_users";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
                        
            $rows = mysqli_num_rows($result);
            
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $row = mysqli_fetch_row($result);
                // Add to XML document node
                $sname=$row[1];
                $saddress=$row[2];
                //$sUrl2 = "https://maps.googleapis.com/maps/api/geocode/xml?address=1600+Pennsylvania+Ave+NW,+Washington+View,+DC&key=AIzaSyAlI7xpGZFeqkvBov_lUxSI7f6LdBV8toU";   
                $sUrl2 = "https://maps.googleapis.com/maps/api/geocode/xml?address=$saddress&key=AIzaSyAlI7xpGZFeqkvBov_lUxSI7f6LdBV8toU";   
                $xml = simplexml_load_file($sUrl2);
                $llat=$xml->result->geometry->location->lat;
                $llng=$xml->result->geometry->location->lng;
                //echo $llat;
                //echo 'lat="' . $row['lat'] . '" ';
                //echo 'lng="' . $row['lng'] . '" ';
                //echo 'type="' . $row['type'] . '" ';
            echo "var marker = new google.maps.Marker({";
            echo "position: {lat: $llat, lng: $llng},";
            echo "map: map";
            echo "});";
            }
            //echo "var marker1 = new google.maps.Marker({";
            //echo "position: uluru1,";
            //echo "map: map";
            //echo "});";
        //var marker2 = new google.maps.Marker({
          //position: {lat: 50.45102, lng: 30.5284},
          //map: map
        //});
        //var marker2 = new google.maps.Marker({
          //position: {lat: 50.45602, lng: 30.5214},
          //map: map
        //});
        //var marker = new google.maps.Marker({
          //position: uluru,
          //map: map
        //});
        //var marker1 = new google.maps.Marker({
          //position: uluru1,
          //map: map
        //});
        echo "}";
        echo "</script>';";
    ?>
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
    $sUrl2 = "https://maps.googleapis.com/maps/api/geocode/xml?address=1600+Pennsylvania+Ave+NW,+Washington+View,+DC&key=AIzaSyAlI7xpGZFeqkvBov_lUxSI7f6LdBV8toU";   
    //$adrr = "12345 Украина Киев пр. Оболонский, 34б"
    $xml = simplexml_load_file($sUrl2);
    echo $xml->result->geometry->location->lat;
    echo $xml->result->geometry->location->lng;
    //1600 Pennsylvania Ave NW, Washington, DC
    //1500 S Capitol St SE Washington, DC
    //800 Florida Ave NE Washington, DC
    echo $llat;
    
 


?>

  </body>
</html>