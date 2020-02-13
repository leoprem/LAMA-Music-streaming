<?php 
include("includes/includedFiles.php");

if(isset($_GET['id']))
    {
        $artist_id = $_GET['id'];  
    }
    else{
        header("Location: index.php");
    }

$artist = new Artist($con,$artist_id);



?>
<div class="entityInfo borderBottom">
   <div class="centerSection">
       <div class="artistInfo">
           <h1 class="artistName"><?php echo $artist->getName()?></h1>
           <div class="headerButtons">
               <button class="button color" onclick="playFirstSong()">
                   PLAY
               </button>
           </div>
       </div>
       
   </div>
    
</div>
<div class="trackListContainer borderBottom">
    <ul class="trackList">
       <h2>SONGS</h2>
        
        <?php
            $songIdArray = $artist->getSongIds();
            $i = 1; //track number counter
        
        
            if(isset($songIdArray))
            {
                foreach($songIdArray as $songId)
                {
                    if($i > 5)
                    {
                        break;
                    }
                    
                    $albumSong = new Song($con,$songId);
                    
                    $albumArtist = $albumSong->getArtist();
                        
                    echo "<li class='trackListRow'>
                            <div class='trackNumber'> 
                                <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"". $albumSong->getId()."\",tempPlaylist,true)'>
                                <span> 
                                    $i
                                </span>
                            </div>
                            
                            <div class='trackInfo'>
                            
                            <span class='trackName'>". $albumSong->getTitle()." </span>
                            <span class='artistName'>".$albumArtist->getName()."</span>
                            
                            </div>
                            
                            <div class='trackOptions'>
                                <input type='hidden' class = 'songId' value='".$albumSong->getId()."'>
                                <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
                            </div>
                            <div class='trackDuration'>
                                <span classs='Duration'>". $albumSong->getDuration() ."
                            </div>
                        </li>";
                        $i++ ;   // Track number increment
                }
            }
        ?>
        <script>
            var tempSongIds =  '<?php echo json_encode($songIdArray)?>';
                tempPlaylist = JSON.parse(tempSongIds);
        </script>
        
    </ul>
</div>
<div class="gridViewContainer">
                  <h2>ALBUMS</h2>
                   <img src="" alt="">
                   <?php 
                        $albumQuery = mysqli_query($con,"SELECT * FROM album WHERE artist='$artist_id'");
                        while($row = mysqli_fetch_assoc($albumQuery)):
                            
                            echo "<div class='gridViewItem'>
                                <span  role='link' tabindex = '0' onclick=\"openPage('album_page.php?id=" . $row['id'] . "')\"  >
                                    <img src='" . ART_PATH.$row['artworkPath'] ."' alt='artwork'>
                            
                                  <div class='gridViewInfo'>"
                                   .$row['title'].
                                  "</div>
                                </span>
                            </div>";
                   
                        endwhile;
                   ?>
                   
               </div>
<nav class="optionMenu">
        <input type="hidden" class="songId">
        <?php echo Playlist::getPlaylistDropdown($con,$userLoggedIn->getUsername()); ?>
        
</nav>