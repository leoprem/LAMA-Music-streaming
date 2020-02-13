<?php 
      include("includes/includedFiles.php");
?>
<div class="playListContainer">
    <div class="gridViewContainer">
        <h2>
            PLAYLISTS
        </h2>
        <div class="buttonItems">
            <button class="button color" onclick="createPlaylist()">NEW PLAYLIST</button>
        </div>
    </div>
</div>
    <?php
    $username = $userLoggedIn->getUsername();
    $playlistQuery = mysqli_query($con,"SELECT * FROM playlists WHERE owner = '$username'");
    
                     if(mysqli_num_rows($playlistQuery) == 0)
                        {
                            echo "<span class='noResults'>You don't have any playlists yet. ".$term."</span>";
                        }
    
                        while($row = mysqli_fetch_assoc($playlistQuery)):
                            
                            $playlist = new Playlist($con,$row);
                            echo "<div class='gridViewItem' role='link' tabindex='0' onclick='openPage(\"playlist.php?id=".$playlist->getId()."\")'>
                                        <div class='playlistImage'>
                                            <img src='assets/images/icons/playlist.png'>
                                        </div>
                                      <div class='gridViewInfo'>"
                                       .$playlist->getName().
                                      "</div>

                            </div>";
                   
                        endwhile;
                   ?>