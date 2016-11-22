<!DOCTYPE html>
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

            #container{
                width:100%;
                height:100%; 
                overflow:hidden;
                background-image:url("images/back1.jpg") ;
            }

            #slideshow{
                width:100%;
                height:100%;              
            }
            #slideshow img{
                margin: 0px 140px;
                width:1000px;
                height:618px; 
                box-shadow: 0 10px 15px 0 rgba(0, 0, 0, 0.2), 0 10px 40px 0 rgba(0, 0, 0, 0.19);
            }
            #pager{
                text-align: center;
                height:120px;
                width:100%;
                position: absolute;
                bottom: 15%;
                background: rgba(0,0,0,.8);
                z-index: 1000;
                opacity: 0;
                transition: all 0.3s ease-in-out 0s;

            }
            #pager:hover{
                opacity:1;
            }
            #prev{
                height:120px;
                width:120px;
                position: absolute;
                top:0;
                bottom:0;
                left:0;
                margin: auto 10px;
                z-index: 1000;
                transition: all 0.3s ease-in-out 0s;
            }
            #next:hover{
                opacity:1
            }
            #prev:hover{
                opacity:1
            }
            #next{
                height:120px;
                width:120px;
                position:absolute;
                top:0;
                bottom:0;
                right:0;
                margin: auto 10px;
                z-index: 1000;
                transition: all 0.3s ease-in-out 0s;
            }
            #pager img{
                margin:10px 5px;
                opacity:0.3;
                transition:all .3s ease-in-out 0s;
            }
            #pager img:hover{
                opacity:1;
                transform: scale(1.05);
                z-index:100;
            }
        </style>
       
    </head>

    <body>
        <div id="container">
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
                
                 <img src="images/den1.jpg" alt="">
                <img src="images/den2.jpg" alt="">
                <img src="images/den3.jpg" alt="">
                <img src="images/den4.jpg" alt="">
            </div>
            <div id="pager"></div>
            <img id="prev" src="images/arrow-left.png">
            <img id="next" src="images/arrow-right.png">
        </div>
        <style>
    dcontent.bjqs-controls.v-centered{
        background-color: lightgrey;
        width: 1280px;
        height: 100%
    }

    div.dc1{margin-top: 30px;
    margin-bottom: 30px;
    width: 800px;
    box-shadow: 0 10px 15px 0 rgba(0, 0, 0, 0.2), 0 10px 40px 0 rgba(0, 0, 0, 0.19);
    text-align: center;
    margin-left: 30px;
    float: left; 
    background-color: white;
    
    }
    #dc1h2{
        background-color: darkslateblue;
        font-family: avenir;
        font-weight: bold;
        font-size: 30px;
        color:white;
        margin: 0px;
    }
    #dc1p1{
        background-color: lavenderblush;
         margin: 0px;
    }
</style>

    <div class="dc1">
        <h2 id="dc1h2">Denver: The Mile High City</h2>
        <p id="dc1p1">
            Welcome to Denver, where 300 days of sunshine, 
            a thriving cultural scene, diverse neighborhoods, 
            and natural beauty combine for the world's most spectacular playground. 
            A young, active city at the base of the Colorado Rocky Mountains, Denver's 
            stunning architecture, award-winning dining and unparalleled views are all 
            within the walking distance from the 16th Street pedestrian mall. Upscale 
            shopping awaits in Cherry Creek, while Denver's seven professional sports teams 
            entertain year-round.
        </p>
    </div>

    </body>

</html>