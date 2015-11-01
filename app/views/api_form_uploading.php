<?php
$timestamp = time();
$hash = md5('unique_salt' . $timestamp);
$sch_id = 8;
$user_id = 31;
$users_id = '71,25,70,67,69,86,23,31,24';
$cate_id = '84,85,86,87';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
      <head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google Maps AJAX + mySQL/PHP Example</title>
    <script src="http://maps.google.com/maps/api/js?sensor=false"
            type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[

    var customIcons = {
      restaurant: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      bar: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      }
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(47.6145, -122.3418),
        zoom: 13,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("phpsqlajax_genxml.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var type = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + address;
          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon,
            shadow: icon.shadow
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>
  </script>
  

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Api Form Uploading testing.</title>
    </head>

    <body onload="load()">
        <div id="map" style="width: 500px; height: 300px"></div>
        <form id="form1" name="form1"  method="POST" action="/api/signup" accept-charset="UTF-8" enctype="multipart/form-data">
            
            
            <h1>SignUp Api Test</h1>
            <p>
                <input name="user_type" type="radio" checked value="2" />
                    User
                    <input name="user_type" type="radio" value="3" />
                    Driver
                    
                </p><br />
            
            <p>
                <label>Name
                    <input type="text" name="name" id="name" value="" />
                </label>
                <br />
                <label>Email
                    <input type="text" name="email" id="email" value="" />
                </label>
                <br />
                <label>Password
                    <input type="password" name="password" id="pass" value="" />
                </label>
                
            </p>
             <p>
                <label>birthday
                    <input type="text" name="birthday" id="birthday" value="" />
                </label>
                <br />
                <label>phone
                    <input type="text" name="phone" id="phone" value="" />
                </label>
                <br />
                <label>city
                    <input type="text" name="city" id="city" value="" />
                </label>
                <br />
                <label>street
                    <input type="text" name="street" id="street" value="" />
                </label>
                <br />
                <label>zipcode
                    <input type="text" name="zipcode" id="zipcode" value="" />
                </label>
                <br />
                <label>state
                    <input type="text" name="state" id="state" value="" />
                </label>
               <br />
                <label>favorite_drink
                    <input type="text" name="favorite_drink" id="favorite_drink" value="" />
                </label>
               <br />
                <label>dev_token
                    <input type="text" name="dev_token" id="dev_token" value="" />
                </label>
               <br />
                <label>order_status
                    <input type="text" name="order_status" id="order_status" value="" />
                </label>
               <br />
                <label>profile_picture
                    <input type="file" name="profile_picture" id="profile_picture" value="" />
                </label>
               
            </p>
                
                
            
            <br></br>
            <input type="submit" name="sub" value="Post Upload" />
        </form>
        
        
        <form id="form1" name="form1"  method="POST" action="/api/login" accept-charset="UTF-8" enctype="multipart/form-data">
            <input type="hidden" name="timestamp" id="timestamp" value="<?php echo $timestamp; ?>" />
            <input type="hidden" name="hash" id="hash" value="<?php echo $hash; ?>" />
            <input type="hidden" name="path" id="path" value="<?php echo '/' . $user_id; ?>" />
            
            
            <h1>Login Api Test</h1>
            
            <p>
                <label>Email
                    <input type="text" name="email" id="email" value="" />
                </label>
                <br />
                <label>Password
                    <input type="password" name="password" id="pass" value="" />
                </label>
                
            </p>
             
            <br></br>
            <input type="submit" name="sub" value="Post Upload" />
        </form>
        
        <form id="form1" name="form1"  method="POST" action="/api/acceptFriend" accept-charset="UTF-8" enctype="multipart/form-data">
            
            
            <h1>Accept Friend Api Test</h1>
            
            <p>
                <label>User Id
                    <input type="text" name="user_id" id="user_id" value="" />
                </label>
                <br />
                <label>Friend Id
                    <input type="text" name="friend_id" id="friend_id" value="" />
                </label>
                
            </p>
             
            <br></br>
            <input type="submit" name="sub" value="Post Upload" />
        </form>
        
        
    </body>
