<?php
    $songQuery = mysqli_query($con,"SELECT * FROM songs ORDER BY RAND() LIMIT 4");
    $resultArray = array();

    while($row = mysqli_fetch_assoc($songQuery))
    {
        array_push($resultArray,$row['id']);
    }
        
    $jsonArray = json_encode($resultArray);

?>
<script>
    
    
    $(document).ready(function(){
        currentPlaylist = <?php echo $jsonArray ?>;
        audioElement = new Audio();
        console.log(currentPlaylist[0]);
        setTrack(currentPlaylist[0],currentPlaylist,false);
    })
    function setTrack(trackId,newPlaylist,play)
    {
        $.post("includes/handlers/ajax/getSongJson.php",{songId : trackId },function(data){
           
            console.log(data);
            var track = JSON.parse(data);
            $(".trackName span").text(track.title);
            
            $.post("includes/handlers/ajax/getArtistJson.php",{artistId : track.artist },function(data){
                 var artist = JSON.parse(data);
                $(".artistName span").text(artist.name); 
            });
                   
            audioElement.setTrack(track.path);
            audioElement.play();
        });
        audioElement.setTrack("assets/music/No_6_06 I Don't Care.mp3");
        if(play)
            {
                audioElement.audio.play();
            }
    }
    
    function playSong()
    {
        audioElement.play();
        $('.controlButton.play').hide();
        $('.controlButton.pause').show();
    }
    function pauseSong()
    {
        audioElement.pause();
        $('.controlButton.pause').hide();
        $('.controlButton.play').show();
    }
</script>

              
  <div id="nowPlayingContainer">
   <div id="nowPlayingBar">
      <div id="nowPlayingLeft">
          <div class="content">
              <span class="albumLink">
                  <img class = "albumArt" src="http://cache.boston.com/resize/bonzai-fba/Globe_Photo/2011/04/14/1302796985_4480/539w.jpg" alt="album art">
              </span>

              <div class="trackInfo">
                  <span class="trackName">
                      <span></span>
                  </span>
                   <span class="artistName">
                      <span></span>
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
                  <button class="controlButton play" title="Play Button" onclick = 'playSong()'>
                      <img src="assets/images/icons/play.png" alt="play">
                  </button>
                  <button class="controlButton pause" title="Pause Button" style="display:none;" onclick = 'pauseSong()'>
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