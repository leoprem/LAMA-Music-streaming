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
        <span>By <?php echo $artist->getName(); ?></span>
    </div>
</div>



<?php include("includes/footer.php") ?>