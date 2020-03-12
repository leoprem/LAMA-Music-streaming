<?php 
      include("includes/includedFiles.php");
?>
   <script>
        
       $(".username span").text(userLoggedIn);
       
   </script>
    <h2 class="username">Hi <span></span></h2>
    <h1 class="pageHeadingBig">Browse New Songs</h1>
    
               <div class="gridViewContainer">
                   <img src="" alt="">
                   <?php 
                        $albumQuery = mysqli_query($con,"SELECT * FROM album ORDER BY RAND() LIMIT 12");
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