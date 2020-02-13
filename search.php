<?php
    include("includes/includedFiles.php");
    if(isset($_GET['term']))
    {
        $term = urldecode($_GET['term']);
    }
else
{
    $term = "";
}

?>
<div class="searchContainer">
    <h4>
        Search for an Artist, Album or Song
    </h4>
    <input type="text" autofocus class="searchInput" value="<?php echo $term ?>" placeholder="Search" onfocus="this.value = this.value;">
</div>

<script>
    $(".searchInput").focus();
    $(function(){
        $(".searchInput").keyup(function(){
            clearTimeout(timer);
            
            timer = setTimeout(function(){
                var val;
                val = $(".searchInput").val();
                openPage("search.php?term="+val);
            },2000);
        }); 
    });
    
</script>

<?php
    if($term == "")
    {
        exit();
    }
    
    ?>
<div class="trackListContainer borderBottom">
    <ul class="trackList">
       <h2>SONGS</h2>
        
        <?php
        
            $newterm = mysqli_real_escape_string($con,$term);
            $songsQuery = mysqli_query($con,"SELECT id FROM songs WHERE title LIKE \"%$newterm%\" LIMIT 10");
    
            if(mysqli_num_rows($songsQuery) == 0)
            {
                echo "<span class='noResults'>No Songs matching ".$term."</span>";
            }
            $songIdArray = array();
            $i = 1; //track number counter
        
        
            if(isset($songIdArray))
            {
                while($row = mysqli_fetch_assoc($songsQuery))
                {
                    if($i > 15)
                    {
                        break;
                    }
                    
                    array_push($songIdArray,$row['id']);
                    
                    $albumSong = new Song($con,$row['id']);
                    
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


<div class="artistContainer borderBottom">
   <h2>ARTISTS</h2>
   <?php
    $artistQuery = mysqli_query($con,"SELECT id FROM artist WHERE name LIKE '$newterm%' LIMIT 10");
    
     if(mysqli_num_rows($artistQuery) == 0)
            {
                echo "<span class='noResults'>No Artists matching ".$term."</span>";
            }
        
    while($row = mysqli_fetch_assoc($artistQuery))
    {
        $artistFound = new Artist($con,$row['id']);
        
        echo "<div class='searchResultRow'>
                <div class='artistName>
                    <span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $artistFound->getId() ."\")'>
					"
					. $artistFound->getName() .
					"
					</span>
                </div>
             </div>";
        
    }
            
            
    ?>
    
</div>
<div class="gridViewContainer">
                  <h2>ALBUMS</h2>
                   <img src="" alt="">
                   <?php 
                        $albumQuery = mysqli_query($con,"SELECT * FROM album WHERE title LIKE '$newterm%'");
    
                     if(mysqli_num_rows($albumQuery) == 0)
                        {
                            echo "<span class='noResults'>No Albums matching ".$term."</span>";
                        }
    
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