<?php include("includes/header.php");

    if(isset($_GET['id']))
    {
        $album_id = $_GET['id'];
        
        $album = new Album($con,$album_id);
        
        $artist = $album->getArtist();          //returns Artist class object          
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
        <p>By <?php echo $artist->getName(); ?></p>
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
                                <img class='play' src='assets/images/icons/play-white.png'>
                                <span> 
                                    $i
                                </span>
                            </div>
                            
                            <div class='trackInfo'>
                            
                            <span class='trackName'>". $albumSong->getTitle()." </span>
                            <span class='artistName'>".$albumArtist->getName()."</span>
                            
                            </div>
                            
                            <div class='trackOptions'>
                                <img class='optionsButton' src='assets/images/icons/more.png'>
                            </div>
                            <div class='trackDuration'>
                                <span classs='Duration'>". $albumSong->getDuration() ."
                            </div>
                        </li>";
                        $i++ ;   // Track number increment
                }
            }
        ?>
        
    </ul>
</div>



<?php include("includes/footer.php") ?>






