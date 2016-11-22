<?php include 'top.php'; ?>
<?php include 'header.php'; ?>  
<?php include 'nav.php'; ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Intro to Denver</title>
        <script src="js/jquery-2.2.3.min.js" type="text/javascript"></script>
        <script src="js/cycle2.js" type="text/javascript"></script>
        <style type="text/css">
            *{
                margin: 0;
                padding: 0;
            }
            
            .cycle-slideshow{
                text-align: center;
            }

        </style>

    </head>

    <body>
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
                 data-cycle-pager-fx="fade">            

                <img src="images/kun1.jpg" alt="">
                <img src="images/kun2.jpg" alt="">
                <img src="images/kun3.jpg" alt="">
                <img src="images/kun4.jpg" alt="">
            </div>
                 </div>
            <div id="pager"></div>
            <img id="prev" src="images/arrow-left.png">
            <img id="next" src="images/arrow-right.png">
        </div>
       
        
        <div class="dcontent">
            <div class="container1">
            <div id="dcword">
                <h2 id="dh2">Kunming: The Spring City</h2>
                <p id="dp">
                    Kunming, capital of Yunnan Province, is known as 'the City of Eternal Spring' for its pleasant climate and flowers that bloom all year long. With a history of more than 2,400 years, it was the gateway to the celebrated Silk Road that facilitated trade with Tibet, Sichuan, Myanmar, India and beyond. Today it is the provincial political, economical and cultural center of Yunnan as well as the most popular tourist destination in southwest China.        </p>
                <h3 id="dh3">Dining</h3>
                <p id="dp">In addition to attractive scenic spots, Kunming is also renowned for its many delicious dishes. Due to the multi-cultural nature of the province, the city brings together the most representative food of the various nationalities residing in Yunnan, so eating here is an experience not to be missed. The famous food includes Steaming-Pot Chicken, Across Bridge Rice Noodles, and Xuanwei Ham. The night market is the best place to sample and enjoy the local snacks.</p> 
                <h3 id="dh3">Shopping</h3>
                <p id="dp">Do not forget to purchase some locally produced souvenirs for your friends or family before leaving this charming city. The local wood carvings and minority tie-dye products are highly recommended. Jinma Biji Square is considered the best place to go for your purchases.</p>        
            </div>

            <div id="dcmap">
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:600px;width:500px;'><div id='gmap_canvas' style='height:600px;width:500px;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://www.buyinstagramfollowersreviews.net/">buy instagram followers</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map() {
    var myOptions = {zoom: 10, center: new google.maps.LatLng(24.880095, 102.83289200000002), mapTypeId: google.maps.MapTypeId.ROADMAP};
    map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
    marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(24.880095, 102.83289200000002)});
    infowindow = new google.maps.InfoWindow({content: '<strong>Kunming</strong><br>Kunming Chenggong New District<br>'});google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map, marker);
    });
    infowindow.open(map, marker);
}
google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
            </div>
        </div>
    </body>

</html>

<?php include 'footer.php'; ?> 