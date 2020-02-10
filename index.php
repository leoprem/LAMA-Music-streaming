<?php include("includes/header.php"); ?>
    <h2 class="username">Hi <?php echo $userLoggedIn ?></h2>
    <h1 class="pageHeadingBig">Some Music You May Like</h1>
    
               <div class="gridViewContainer">
                   <img src="" alt="">
                   <?php 
                        $albumQuery = mysqli_query($con,"SELECT * FROM album ORDER BY RAND() LIMIT 10");
                        while($row = mysqli_fetch_assoc($albumQuery)):
                            
                            echo "<div class='gridViewItem'>
                                <a  href='album_page.php?id=" . $row['id'] . "'>
                                    <img src='" . $row['artworkPath'] ."' alt='artwork'>
                            
                                  <div class='gridViewInfo'>"
                                   .$row['title'].
                                  "</div>
                                </a>
                            </div>";
                   
                        endwhile;
                   ?>
                   
               </div>
                
<?php include("includes/footer.php"); ?>