<?php include("includes/includedFiles.php");

    if(isset($_GET['id']))
    {
        $album_id = $_GET['id'];
        
        $album = new Album($con,$album_id);
        
        $artist = $album->getArtist();          //returns Artist class object    
        $artistId=$artist->getId();
    }
    else{
        header("Location: index.php");
    }

?>
<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album->getArtworkPath(); ?>" alt="Artwork">
    </div>
    <div class="rightSection">
        <h2><?php echo $album->getTitle(); ?></h2>
        <p role='link' tabindex="0" onclick="openPage('album_page.php?id=<?php echo $artistId; ?>')">By <?php echo $artist->getName(); ?></p>
        <p><?php echo $album->getNumberOfSongs(); ?> Songs</p>
        
    </div>
</div>
<div class="trackListContainer">
    <ul class="trackList">
        
        <?php
            $songIdArray = $album->getSongIds();
            $i = 1; //track number counter
        
        
            if(isset($songIdArray))
            {
                foreach($songIdArray as $songId)
                {
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

<nav class="optionMenu">
        <input type="hidden" class="songId">
        <?php echo Playlist::getPlaylistDropdown($con,$userLoggedIn->getUsername()); ?>
</nav>




