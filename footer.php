<section class="sectionMap">
  <div class="wrapp">
    <div class="seditBlock">
      <div class="block">
        <?php assetImg('logo1.png');?>
        <p><i class="fas fa-home"></i> aaaa</p>
        <p><i class="fas fa-phone"></i> aaaa</p>
        <p><i class="fas fa-envelope"></i> aaaa</p>
        <p><i class="far fa-clock"></i> aaaa</p>
        <a class="seditBtn" href="<?php echo get_permalink(get_page_by_path('kontakt')); ?>">SZCZEGÓŁY</a>
      </div>
      <div class="block">
        <div id="map"></div>
      </div>
    </div>
  </div>
</section>


<section class="sectionFooter">
  <div class="wrapp">
    <div class="seditBlock">
      <div class="block"><p>© VDF Group 2019</p></div>
      <div class="block"><p>Projekt i realizacja: <a href="http://bigcom.pl">BigCom</a></p></div>
    </div>
  </div>
</section>
<script src="<?php echo get_template_directory_uri() . '/assets/js/code-theme.js'; ?>" type="text/javascript"></script>
<?php wp_footer();?>
<?php
$mapxy = explode(',', sedit(null, 'googlemapxy', 'value'));
echo '
<script type="text/javascript">
function initMap() {
  var myLatLng = {
    lat: ' . $mapxy[0] . ',
    lng: ' . $mapxy[1] . '
  };
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: ' . get_option('sizemap') . ',
    disableDefaultUI: true,
    center: myLatLng
  });
  var image = "' . get_image_option('link', 'marker', 'marker', false) . '";
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    icon: image,
    url: "' . get_option('linkmarker') . '",
    mapTypeControlOptions: {
      mapTypeIds: ["styled_map"]
    }
  });
  var styledMapType = new google.maps.StyledMapType([
    {
        "stylers": [
            {
                "hue": "#ff1a00"
            },
            {
                "invert_lightness": true
            },
            {
                "saturation": -100
            },
            {
                "lightness": 33
            },
            {
                "gamma": 0.5
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#2D333C"
            }
        ]
    }
]);
  map.mapTypes.set("styled_map", styledMapType);
  map.setMapTypeId("styled_map");

  google.maps.event.addListener(marker, "click", function() {
    window.location.href = marker.url;
});

}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=' . get_option('googlemapapi') . '&language=pl&ver=1.9.8&callback=initMap"></script>
';
?>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>
<script src="http://localhost:49902/livereload.js"></script>
</body>
</html>
