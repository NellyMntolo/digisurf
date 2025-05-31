<?php 
include_once("../Model/locationsDAO.php");
//include_once("../Controller/cart_controller.php");
include_once("header.php");
include_once("footer.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $all_entext3;?>">
    <meta name="keywords" content="<?php echo $all_entext2;?>">
    <meta name="author" content="Nelly">
    <!-- Google Services -->
    <?php echo $favs;?>
    <?php echo $css; ?>
    <!-- <link rel="stylesheet" type="text/css" href="/assets/css/leaflet.css"> -->
    <title>Locations</title>

    <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'GTM-PPN2XRH', 'event_callback': callback }); return false; } </script>

</head>
<style type="text/css">
	/* Set a size for our map container, the Google Map will take up 100% of this container */
	/*#map {
		width: 100%;
		height: 500px;
	}*/
</style>
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        min-height: 500px;
        border-radius: 20px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
<body class="animsition">
<?php echo $header;?>

<main>
    <div class="main-container" >
        <div class="container cf">
           <!-- <div class="location-top animation-element slide-bottom">
            	<div class="location-top-in">
					<h1><?php echo $all_entext4;?></h1>
				</div>
			</div>
			<div class="location-branches animation-element slide-bottom">
				<div class="ui-group">
					<ul class="simplefilter button-group">
					</ul>
				</div>
			</div>
			<?php echo $all_locations;?> -->
          <div class="row">
            <div class="col-md-4 map-search">

              <div class="row">
                <div class="col-md-12">
                  <form action="#" method="post">
                    <input type="text" id="search_map" class="search_map" name="q" placeholder="Search"><!-- <span><i class="fa fa-search"></i></span> -->
                    <input type="submit" class="search_map_btn" name="">
                  </form>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">

                  <!-- PANEL -->
                  
                  <div class="wrapper center-block">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                      <div class="panel-heading active" role="tab" id="headingOne">
                        <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Living
                          </a>
                        </h4>
                      </div>
                      <!-- <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"> -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                          <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                          <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                          <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Sports And Outdoors
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                          <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accessories
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                          <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                          <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                          <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Public Resources
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                          <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
              <!-- PANEL -->
                  
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  
                </div>
              </div>

            </div>

            <div class="col-md-8 map-locations">
              <div id="map"></div>
              <!-- <img class="ads_image" src="/assets/images/download_button.gif" alt="下載白皮書" width="32" height="32" onclick="return gtag_report_conversion('http://nothingisgarbage.com/Locations')" /> -->
              <!-- <script data-ad-client="ca-pub-4605094500413163" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->

              <div id="map_ads" style="">
                    <!-- Nothing is garbase AdSense Start-->
                    <!-- <img class="ads_image" src="/assets/images/download_button.gif" alt="下載白皮書" width="32" height="32" onclick="return gtag_report_conversion('http://nothingisgarbage.com/Locations')" /> -->
                    <!-- <img class="ads_image" src="/assets/images/ads_test.png"> -->
                        <div id="map_ads" style="">
                              <!-- Nothing is garbase AdSense Start-->
                              <img class="ads_image" src="/assets/images/image1.png" alt="下載白皮書" width="32" height="32" onclick="return gtag_report_conversion('https://www.nothingisgarbage.com/Location_Explore')" />

                              <!-- <img class="ads_image" src="/assets/images/ads_test.png">
                                  <script data-ad-client="ca-pub-4605094500413163" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
                                  (adsbygoogle = window.adsbygoogle || []).push({});
                                  </script> -->
                              <!-- Nothing is garbase AdSense end-->
                        </div>
                        <!-- <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8702817115729597"
                             data-ad-slot="9095272662"
                             data-ad-format="auto">
                        </ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script> -->
                    <!-- Nothing is garbase AdSense end-->
              </div>
              <!-- <input type="text" id="" name="q" placeholder="map_ads"> -->

            </div>
          </div>
            





    

    <!-- GOOGLE MAPS -->

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          // center: new google.maps.LatLng(-33.863276, 151.207977),
          center: new google.maps.LatLng(25.0311442, 121.5377624),
          // zoom: 12
          zoom: 14,
          zoomControl: false,
          mapTypeControl: true,
          scaleControl: true,
          streetViewControl: false,
          rotateControl: true,
          fullscreenControl: true
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          // downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
          // downloadUrl('/assets/markers.xml', function(data) {
          // downloadUrl('../Model/locationsDAO.php', function(data) {
            downloadUrl('/Views/maptestDAO.php', function(data) {  
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('store_id');
              var name = markerElem.getAttribute('store_name');
              var address = markerElem.getAttribute('store_address');
              var type = markerElem.getAttribute('store_type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('store_lat')),
                  parseFloat(markerElem.getAttribute('store_lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });




          // --------------------------------------------------------------------------
            var markers = [];
          // Create the search box and link it to the UI element.
            var input = /** @type {HTMLInputElement} */(
                document.getElementById('search_map'));

            var map_ads = /** @type {HTMLInputElement} */(
                document.getElementById('map_ads'));
            
            // this removes the input from position
            //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(map_ads);

            var searchBox = new google.maps.places.SearchBox(
              /** @type {HTMLInputElement} */(input));

            // [START region_getplaces]
            // Listen for the event fired when the user selects an item from the
            // pick list. Retrieve the matching places for that item.
            google.maps.event.addListener(searchBox, 'places_changed', function() {
              var places = searchBox.getPlaces();

              if (places.length == 0) {
                return;
              }
              for (var i = 0, marker; marker = markers[i]; i++) {
                marker.setMap(null);
              }

              // For each place, get the icon, place name, and location.
              markers = [];
              var bounds = new google.maps.LatLngBounds();
              for (var i = 0, place; place = places[i]; i++) {
                var image = {
                  url: place.icon,
                  size: new google.maps.Size(71, 71),
                  origin: new google.maps.Point(0, 0),
                  anchor: new google.maps.Point(17, 34),
                  scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                var marker = new google.maps.Marker({
                  map: map,
                  icon: image,
                  title: place.name,
                  position: place.geometry.location
                });

                markers.push(marker);

                bounds.extend(place.geometry.location);
              }

              map.fitBounds(bounds);
            });
            // [END region_getplaces]

            // Bias the SearchBox results towards places that are within the bounds of the
            // current map's viewport.
            google.maps.event.addListener(map, 'bounds_changed', function() {
              var bounds = map.getBounds();
              searchBox.setBounds(bounds);
            });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;
            // new XMLHttpRequest();

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

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR7vrl5CUn0lf4vJMI4i7XI_Z3ZNE_5AE&callback=initMap&libraries=places" type="text/javascript"></script>

    <!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR7vrl5CUn0lf4vJMI4i7XI_Z3ZNE_5AE&callback=initMap">
    </script> -->
    <!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtfn-Pez2Ss8ymAj1MNVTL7thkQWBBgbA&callback=initMap">
    </script> -->
    <!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script> -->]


    <!-- jo script
    <script data-ad-client="ca-pub-4605094500413163" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->



		</div>
    </div>

   <?php echo $footer;?> 
</main>



<!-- Script -->
<?php echo $scripts;?>

<!-- LEAFLET
<script type="text/javascript" src="/assets/js/leaflet.js"></script>



<script type="text/javascript">
  //Creat Layer
var baseMap = new L.TileLayer('http://{s}.tiles.mapbox.com/v3/gvenech.m13knc8e/{z}/{x}/{y}.png');

var baseMapIndex = {
  "Map": baseMap
};

// Create the map
var map = new L.map('map', {
    center: new L.LatLng(25.0311442, 121.5377624),
    zoom: 14,
    maxZoom: 18,
    zoomControl: false, // Disable the default zoom controls.
    layers: baseMap
});

// Create the control and add it to the map;
var control = L.control.layers(baseMapIndex);
control.addTo(map);

// Call the getContainer routine.
var htmlObject = control.getContainer();
// Get the desired parent node.
var a = document.getElementById('new-parent');

// Finally append that node to the new parent.
function setParent(el, newParent)
{
    newParent.appendChild(el);
}
setParent(htmlObject, a);
</script>
 -->







<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        centeredSlides: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 0,
		speed:1000
    });
</script>

<!-- Zhen This is for the control of the buttons active class -->
<script>
	$(function() {
	//Simple filter controls
	$('.simplefilter li').click(function() {
		$('.simplefilter li').removeClass('active');
		$(this).addClass('active');
	});
});
</script>

<script type="text/javascript">var _jf = _jf || [];_jf.push(['p','50988']);_jf.push(['_setFont','sourcehansans-tc-extralight','css','.sourcehansans-tc-extralight']);_jf.push(['_setFont','sourcehansans-tc-extralight','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-extralight','weight',100]);_jf.push(['_setFont','sourcehansans-tc-normal','css','.sourcehansans-tc-normal']);_jf.push(['_setFont','sourcehansans-tc-normal','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-normal','weight',300]);_jf.push(['_setFont','sourcehansans-tc-medium','css','.sourcehansans-tc-medium']);_jf.push(['_setFont','sourcehansans-tc-medium','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-medium','weight',600]);(function(f,q,c,h,e,i,r,d){var k=f._jf;if(k.constructor===Object){return}var l,t=q.getElementsByTagName("html")[0],a=function(u){for(var v in k){if(k[v][0]==u){if(false===k[v][1].call(k)){break}}}},j=/\S+/g,o=/[\t\r\n\f]/g,b=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,g="".trim,s=g&&!g.call("\uFEFF\xA0")?function(u){return u==null?"":g.call(u)}:function(u){return u==null?"":(u+"").replace(b,"")},m=function(y){var w,z,v,u,x=typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):" ";if(z){u=0;while((v=w[u++])){if(z.indexOf(" "+v+" ")<0){z+=v+" "}}t[c]=s(z)}}},p=function(y){var w,z,v,u,x=arguments.length===0||typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):"";if(z){u=0;while((v=w[u++])){while(z.indexOf(" "+v+" ")>=0){z=z.replace(" "+v+" "," ")}}t[c]=y?s(z):""}}},n;k.push(["_eventActived",function(){p(h);m(e)}]);k.push(["_eventInactived",function(){p(h);m(i)}]);k.addScript=n=function(u,A,w,C,E,B){E=E||function(){};B=B||function(){};var x=q.createElement("script"),z=q.getElementsByTagName("script")[0],v,y=false,D=function(){x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;a("_eventInactived");B()};if(C){v=setTimeout(function(){D()},C)}x.type=A||"text/javascript";x.async=w;x.onload=x.onreadystatechange=function(G,F){if(!y&&(!x.readyState||/loaded|complete/.test(x.readyState))){y=true;if(C){clearTimeout(v)}x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;if(!F){setTimeout(function(){E()},200)}}};x.onerror=function(H,G,F){if(C){clearTimeout(v)}D();return true};x.src=u;z.parentNode.insertBefore(x,z)};a("_eventPreload");m(h);n(r,"text/javascript",false,3000)})(this,this.document,"className","jf-loading","jf-active","jf-inactive","//d3gc6cgx8oosp4.cloudfront.net/js/stable/v/5.0.3/id/90054322147");</script>
</body>
</html>
