<?php include("includes/includedFiles.php");

    if(isset($_GET['id']))
    {
        $playlist_id = $_GET['id'];            
    }
    else{
        header("Location: index.php");
    }

$playlist = new Playlist($con,$playlist_id);
$owner = new User($con,$playlist->getOwner());

?>
<div class="entityInfo">
    <div class="leftSection">
       <div class="playlistImage">
        <img src='assets/images/icons/playlist.png' alt="Artwork">
        </div>
    </div>
    <div class="rightSection">
        <h2><?php echo $playlist->getName(); ?></h2>
        <p>By <?php echo $playlist->getOwner(); ?></p>
        <p><?php echo $playlist->getNumberOfSongs(); ?> Songs</p>
        <button class="button" onclick="deletePlaylist('<?php echo $playlist_id; ?>')">DELETE PLAYLIST</button>
        
    </div>
</div>
<div class="trackListContainer">
    <ul class="trackList">
        
        <?php
            $songIdArray = $playlist->getSongIds();
            $i = 1; //track number counter
        
        
            if(isset($songIdArray))
            {
                foreach($songIdArray as $songId)
                {
                    $playlistSong = new Song($con,$songId);
                    
                    $songArtist = $playlistSong->getArtist();
                    

                    
                    echo "<li class='trackListRow'>
                            <div class='trackNumber'> 
                                <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"". $playlistSong->getId()."\",tempPlaylist,true)'>
                                <span> 
                                    $i
                                </span>
                            </div>
                            
                            <div class='trackInfo'>
                            
                            <span class='trackName'>". $playlistSong->getTitle()." </span>
                            <span class='artistName'>".$songArtist->getName()."</span>
                            
                            </div>
                            
                           <div class='trackOptions'>
                                <input type='hidden' class = 'songId' value='".$playlistSong->getId()."'>
                                <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
                            </div>
                            <div class='trackDuration'>
                                <span classs='Duration'>". $playlistSong->getDuration() ."
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
        <div class="item" onclick="removeFromPlaylist(this,'<?php echo $playlistSong->getId();?>')">Remove From Playlist</div>
        
</nav>




