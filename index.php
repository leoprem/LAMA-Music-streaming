
<?php

//    session_destroy()
    include("includes/config.php");

    if(isset($_SESSION['userLoggedIn']))
    {
        $userLoggedIn = $_SESSION['userLoggedIn'];
    }
    else
    {
        header("Location:register.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LAMA-music</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  
    <div id="nowPlayingContainer">
       <div id="nowPlayingBar">
          <div id="nowPlayingLeft">
              <div class="content">
                  <span class="albumLink">
                      <img class = "albumArt" src="http://cache.boston.com/resize/bonzai-fba/Globe_Photo/2011/04/14/1302796985_4480/539w.jpg" alt="album art">
                  </span>
                  
                  <div class="trackInfo">
                      <span class="trackName">
                          <span>Merry Christmas</span>
                      </span>
                       <span class="artistName">
                          <span>Santa Claus</span>
                      </span>
                  </div>
              </div>
          </div>
          <div id="nowPlayingCenter">
              <div class="content playerControls">
                  <div class="buttons">
                      <button class="controlButton shuffle" title="Shuffle Button">
                          <img src="assets/images/icons/shuffle.png" alt="shuffle">
                      </button>
                      <button class="controlButton previous" title="Previous Button">
                          <img src="assets/images/icons/previous.png" alt="previous">
                      </button>
                      <button class="controlButton play" title="Play Button">
                          <img src="assets/images/icons/play.png" alt="play">
                      </button>
                      <button class="controlButton pause" title="Pause Button" style="display:none;">
                          <img src="assets/images/icons/pause.png" alt="pause" >
                      </button>
                      <button class="controlButton next" title="Next Button">
                          <img src="assets/images/icons/next.png" alt="next">
                      </button>
                      <button class="controlButton repeat" title="Repeat Button">
                          <img src="assets/images/icons/repeat.png" alt="repeat">
                      </button>   
                  </div>
                   <div class="playbackBar">
                          <span class="progressTime current">0:00</span>
                          <div class="progressBar">
                              <div class="progressbarBg">
                                  <div class="progress"></div>
                              </div>
                          </div>
                          <span class="progressTime remaining">0:00</span>
                      </div>
              </div>
          </div>
          <div id="nowPlayingRight">
              <div class="volumeBar">
                  <button class="controlButton volume" title="Volume button">
                      <img src="assets/images/icons/volume.png" alt="Volume">
                  </button>
                   <div class="progressBar">
                              <div class="progressbarBg">
                                  <div class="progress"></div>
                              </div>
                   </div>
              </div>
          </div>
           
       </div>        
    </div>
    
</body>
</html>