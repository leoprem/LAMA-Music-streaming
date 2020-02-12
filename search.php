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
        var timer;
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


<div class="trackListContainer borderBottom">
    <ul class="trackList">
       <h2>SONGS</h2>
        
        <?php
    
            $songsQuery = mysqli_query($con,"SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10");
    
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
        <script>
            var tempSongIds =  '<?php echo json_encode($songIdArray)?>';
                tempPlaylist = JSON.parse(tempSongIds);
        </script>
        
    </ul>
</div>