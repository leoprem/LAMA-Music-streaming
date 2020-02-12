<?php
    $songQuery = mysqli_query($con,"SELECT * FROM songs ORDER BY RAND() LIMIT 10");
    $resultArray = array();

    while($row = mysqli_fetch_assoc($songQuery))
    {
        array_push($resultArray,$row['id']);
    }
        
    $jsonArray = json_encode($resultArray);

?>
<script>
    
    
    $(document).ready(function(){
        newPlaylist = <?php echo $jsonArray ?>;
        audioElement = new Audio();
        console.log(newPlaylist[0]);
        setTrack(newPlaylist[0],newPlaylist,false);
        updateVolumeProgressBar(audioElement.audio);
        //progress bar movement control
        
        $("#nowPlayingContainer").on("mousedown touchstart mousemove touchmove", function(e){
            e.preventDefault();
        })
        
        
        $(".playbackBar .progressBar").mousedown(function()
        {
            mouseDown = true;
        });
        $(".playbackBar .progressBar").mousemove(function(e)
        {   
            if(mouseDown)
                {
                    timeFromOffset(e,this);
                }
         
        });
        $(".playbackBar .progressBar").mouseup(function(e)
        {       
            timeFromOffset(e,this);
         
        });
        $(document).mouseup(function(){
            mouseDown = false;
        });
        
        //volume bar movement control
        $(".volumeBar .progressBar").mousedown(function()
        {
             mouseDown = true;
        });
        $(".volumeBar .progressBar").mousemove(function(e)
        {   
            if(mouseDown)
                {
                    var percentage = e.offsetX / $(this).width();
                    if(percentage >= 0 && percentage <=1)
                        {
                            audioElement.audio.volume = percentage;
                        }
                }
         
        });
        $(".volumeBar .progressBar").mouseup(function(e)
        {       
            var percentage = e.offsetX / $(this).width();
            if(percentage >= 0 && percentage <=1)
                {
                    audioElement.audio.volume = percentage;
                }
         
        });
        $(document).mouseup(function(){
            mouseDown = false;
        });
        
    });
    
    function timeFromOffset(mouse,progressBar)
    {
        var percentage =    mouse.offsetX / $(progressBar).width() * 100;
        var seconds = audioElement.audio.duration * (percentage/100);
        audioElement.setTime(seconds);
    }
    function prevSong()
    {
        if(audioElement.audio.currentTime >= 3 || currentIndex == 0)
            {
                audioElement.setTime(0);
            }
        else
            {
                currentIndex--;
                setTrack(currentPlaylist[currentIndex],currentPlaylist,true);
            }
    }
    function nextSong()
    {
        if(repeat)
            {
                audioElement.setTime(0);
                playSong();
                return;
            }
        if(currentIndex == currentPlaylist.length - 1 )
        {
                currentIndex = 0;
        }
        else
        {
            currentIndex++;
        }
        var trackToPlay = shuffle? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
        
        setTrack(trackToPlay,currentPlaylist,true);
    }
    
    function setRepeat()
    {
        repeat = !repeat;
        var imageName =  repeat? "repeat-active.png":"repeat.png";
        $(".controlButton.repeat img").attr("src","assets/images/icons/"+imageName);
    }
    
    
     function setMuted()
    {
        audioElement.audio.muted = !audioElement.audio.muted;
        var imageName =  audioElement.audio.muted? "volume-mute.png":"volume.png";
        $(".controlButton.volume img").attr("src","assets/images/icons/"+imageName);
    }
     function setShuffle()
    {
        shuffle = !shuffle;
        var imageName =  shuffle? "shuffle-active.png":"shuffle.png";
        $(".controlButton.shuffle img").attr("src","assets/images/icons/"+imageName);
        
        if(shuffle)
            {
                shuffleArray(shufflePlaylist);
                currentIndex = shufflePlaylist.indexOf(audioElement.currentlyPlaying.id);
            }
            else
                {
                   currentIndex = currentPlaylist.indexOf(audioElement.currentlyPlaying.id);
                }
    }
    
    function shuffleArray(a) {
    var j, x, i;
    for (i = a.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = a[i];
        a[i] = a[j];
        a[j] = x;
    }
    return a;
}
    
    
    function setTrack(trackId,newPlaylist,play)
    {
        if(currentPlaylist != newPlaylist)
            {
                currentPlaylist = newPlaylist;
                shufflePlaylist = currentPlaylist.slice();
                shuffleArray(shufflePlaylist);
            }
        if(shuffle)
            {
                currentIndex = shufflePlaylist.indexOf(trackId);
            }
        else
            {
                currentIndex = currentPlaylist.indexOf(trackId);
            }
       
        pauseSong();
        $.post("includes/handlers/ajax/getSongJson.php",{songId : trackId },function(data){
           
            
            var track = JSON.parse(data);
            $(".trackName span").text(track.title);
            
            $.post("includes/handlers/ajax/getArtistJson.php",{artistId : track.artist },function(data){
                 var artist = JSON.parse(data);
                $(".artistName span").text(artist.name); 
                $(".artistName span").attr("onclick","openPage('artist.php?id="+artist.id+"')");
            });
            $.post("includes/handlers/ajax/getAlbumJson.php",{albumId : track.album },function(data){
                 var album = JSON.parse(data);
                $(".albumLink img").attr("src",album.artworkPath); 
                $(".albumLink img").attr("onclick","openPage('album_page.php?id="+album.id+"')"); 
                $(".trackName span").attr("onclick","openPage('album_page.php?id="+album.id+"')"); 
                
            });
            audioElement.setTrack(track);
            if(play)
                {
                    playSong();
                }
        });
        
    }
    
    function playSong()
    {
        if(audioElement.audio.currentTime == 0)
        {   
            $.post("includes/handlers/ajax/updatePlays.php",{songId: audioElement.currentlyPlaying.id});
        }
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
                  <img role="link" tabindex="0" class = "albumArt" src="" class="albumArtwork" >
              </span>

              <div class="trackInfo">
                  <span class="trackName">
                      <span role="link" tabindex="0"></span>
                  </span>
                   <span class="artistName">
                      <span role="link" tabindex="0"></span>
                  </span>
              </div>
          </div>
      </div>
      <div id="nowPlayingCenter">
          <div class="content playerControls">
              <div class="buttons">
                  <button class="controlButton shuffle" title="Shuffle Button" onclick="setShuffle()">
                      <img src="assets/images/icons/shuffle.png" alt="shuffle">
                  </button>
                  <button class="controlButton previous" title="Previous Button" onclick="prevSong()">
                      <img src="assets/images/icons/previous.png" alt="previous">
                  </button>
                  <button class="controlButton play" title="Play Button" onclick = 'playSong()'>
                      <img src="assets/images/icons/play.png" alt="play">
                  </button>
                  <button class="controlButton pause" title="Pause Button" style="display:none;" onclick = 'pauseSong()'>
                      <img src="assets/images/icons/pause.png" alt="pause" >
                  </button>
                  <button class="controlButton next" title="Next Button" onclick="nextSong()">
                      <img src="assets/images/icons/next.png" alt="next">
                  </button>
                  <button class="controlButton repeat" title="Repeat Button" onclick="setRepeat()">
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
              <button class="controlButton volume" title="Volume button" onclick="setMuted()">
                  <img src="assets/images/icons/volume.png" alt="Volume" >
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