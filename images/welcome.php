<?php include 'top.php'; ?>
<?php include 'header.php'; ?>  
<?php include 'nav.php'; ?>

<div id = "slide">
    <h1 id="intro1"><center>
            Denver & Kunming
        </center></h1>
    <h2 id="intro2"><center>
            Connection ・ Conversation ・ Communication
        </center></h2>

</div> 
<body>
    <div class="location">
        <div class="map">
            <img src="images/map.jpg" alt="worldmap", style="width:800px" usemap="#imgmap2016428135815">           
            <map id="imgmap2016428135815" name="imgmap2016428135815">
                <area shape="circle" alt="" title="" coords="273,237,34" href="kunming.php" target="" />
                <area shape="circle" alt="" title="" coords="610,205,33" href="denver.php" target="" />
                <!-- Created by Online Image Map Editor (http://www.maschek.hu/imagemap/index) -->
            </map>
            <h2 id="map2">Where are we?</h2>
            <h3 id="map3">Click on location to see more!</h3>
        </div>

        <div class="desmap">
            <p>Denver is located in the South Platte River Valley on the western edge of the High Plains just east of the Front Range of the Rocky Mountains.
                Due to its inland location on the High Plains, at the foot of the Rocky Mountains, Denver, like all cities along the eastern edge of the Rocky Mountains, is subject to sudden changes in weather.
            </p>

            <p>Located in the middle of the Yunnan–Guizhou Plateau, Kunming is located at an altitude of 1,900 metres (6,234 feet) above sea level and at a latitude just north of the Tropic of Cancer.
                Because of its location in the southwest of China, Kunming missed out on China's rapid economic growth in the 1990s. However, the city has recently received renewed attention.</p>
            <br>
        </div>

    </div>
    <style>
        div.comb{
            height:600px;
            width:1280px;
            background-image: url("images/usachina.jpg");
        }
        #combpic{
            margin-right: 0px;
            margin-top: 0px;
            height:100%;
            width:854px;
            float: right;
        }
        div.usachina{
            margin: 0px 0px;
            height: 600px;
            width:425px;
            background-image: url("images/usachina.jpg");
            float:left;

        }
        #comb{
            margin-right: 0px;
            width:853px;
            height: 600px;
        }

        /*DARKEN*/
        .combpic img {
            -webkit-filter: brightness(-65%);
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
            -ms-transition: all 1s ease;
            transition: all 1s ease;
        }

        .combpic img:hover {
            -webkit-filter: brightness(0%);
        }
        #kun5{
            height: 600px;
            width: 426.66px;
            position: abosulte;
            overflow: hidden;
            margin-left: 426px;  
                  
        }
         #den5{
            height: 600px;
            width: 426.66px;
            position: absolute;
            overflow: hidden;  
            margin-left: 0px;
        }
    </style>

    <div class="comb">
        <div class="usachina">
            <h2 id="usachinah2">The connection between the West and the East</h2>
            <p id="usachinacontent">
                We are moth cities with high altitude, but we are culturally different. Denver 
                and Kunming build a bridge between 
            </p>
        </div>
        <div class="combpic">
            <img id="kun5" src="images/kun5.jpg" alt=""/>
            <img id="den5" src="images/den5.jpg" alt=""/>
        </div>
    </div>
    <div style="height: 100px">
        <h3 id="follow"> Follow us to learn more:
        </h3>
        <!-- START SOCIAL MEDIA WIDGET --><center>
            <ul id="socialbar">
                <li id="facebook">
                    <a target="_blank" href="https://www.facebook.com/denversistercities/?fref=ts">
                        <IMG src="https://cdn0.iconfinder.com/data/icons/brands-flat-1/60/facebook-letter-social-media-f-128.png">
                    </a>
                </li>
                <li id="twitter">
                    <a target="_blank" href="https://twitter.com/DSCI">
                        <IMG src="https://cdn0.iconfinder.com/data/icons/brands-flat-1/60/twitter-bird-animal-social-media-128.png">
                    </a>
                </li>
                <li id="Pinterest">
                    <a target="_blank" href="https://www.pinterest.com/denversci/">
                        <IMG src="https://cdn0.iconfinder.com/data/icons/brands-flat-1/60/pininterest-social-media-letter-p-visual-128.png">
                    </a></li>
                <li id="Youtube">
                    <a target="_blank" href="https://www.youtube.com/user/denversistercities">
                        <IMG src="https://cdn0.iconfinder.com/data/icons/brands-flat-1/60/youtube-video-social-media-play-128.png">
                    </a>
                </li>


            </ul>

            <!-- END SOCIAL MEDIA WIDGET -->
        </center>
    </div>


</body>

<br> 
<?php include 'footer.php'; ?> 