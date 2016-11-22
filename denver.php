
<?php include 'top.php'; ?>
<?php include 'header.php'; ?>  
<?php include 'nav.php'; ?>


<head>
    <meta charset="utf-8">
    <title>Intro to Denver</title>
    <script src="js/jquery-2.2.3.min.js" type="text/javascript"></script>
    <script src="js/cycle2.js" type="text/javascript"></script>
    
</head>
<body>
    <style type="text/css">
        
    </style>




    <div id="container">
        <div class="container2">
        <div id="slideshow" class="cycle-slideshow"
             data-cycle-fx = "fade"
             data-cycle-speed = "1000"
             data-cycle-timeout ="1500"
             data-cycle-pager="#pager"
             data-cycle-pager-template ="<a herf='#'><img src='{{src}}' height=100 width=150/>" 
             data-cycle-next = "#next"
             data-cycle-prev = "#prev"
             data-cycle-manual-fx="scrollHorz"
             data-cycle-pager-fx="fade"
             data->            

            <img src="images/den1.jpg" alt="">
            <img src="images/den2.jpg" alt="">
            <img src="images/den3.jpg" alt="">
            <img src="images/den4.jpg" alt="">
        </div>
        </div>     
        <div id="pager"></div>
        <img id="prev" src="images/arrow-left.png">
        <img id="next" src="images/arrow-right.png">
    </div>
        
   
    <div class="dcontent">
        <div class="container1">
        <div id="dcword">
            <h2 id="dh2">Denver: The Mile High City</h2>
            <p id="dp">
                Welcome to Denver, where 300 days of sunshine, a thriving cultural scene, diverse
                neighborhoods, and natural beauty combine for the world's most spectacular 
                playground. A young, active city at the base of the Colorado Rocky Mountains, 
                Denver's stunning architecture, award-winning dining and unparalleled views are 
                all within the walking distance from the 16th Street pedestrian mall. Upscale
                shopping awaits in Cherry Creek, while Denver's seven professional sports teams 
                entertain year-round.            </p>
            <h3 id="dh3">Things to Do in Denver</h3>
            <p id="dp">When you wake up in Denver, adventure awaits. Explore the city's greatest spots. Get local Denver tips on attractions, scenic sightseeing, biking and tours, golf & other destinations. Whether you're a local, here for the weekend or more than a week, discover the best things to do in Denver during your trip. Plus,find the perfect Denver hotel.</p>
        <h3 id="dh3">Attractions</h3>
        <p id="dp">From downtown amusement parks to fascinating museums, Denver's attractions deliver unique and unforgettable experiences.</p> 
        </div>
        
        <div id="dcmap">
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'>
</script><div style='overflow:hidden;height:600px;width:500px;'>
    <div id='gmap_canvas' style='height:600px;width:500px;'></div><div>
        <small><a href="http://embedgooglemaps.com">									
                embed google maps							
            </a></small></div><div><small>
                    <a href="http://buywebtrafficexperts.com">buy website traffic</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(39.7392358,-104.990251),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(39.7392358,-104.990251)});infowindow = new google.maps.InfoWindow({content:'<strong>Denver</strong><br>Denver Downtown<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
        </div>
        </div>
    </div>


    <div>
        <?php include 'footer.php'; ?> 
    </div>
</body>