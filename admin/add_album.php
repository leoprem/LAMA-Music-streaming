<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH.'/includes/auth_validate.php';

// Serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{

     // Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_db = array_filter($_POST);

    // Insert user and timestamp
    //$data_to_db['created_by'] = $_SESSION['user_id'];
    //$data_to_db['created_at'] = date('Y-m-d H:i:s');


// file upload

include("includes/artwork_upload.php"); //returns true $file_error if any error in file upload

$last_id = false;
    
if(!$file_error)
{
//    $imageFileType: File type extention
    
    $ph= date("dmhms"); //date month hour minute second
    $filepath=$target_dir. $ph .".".$imageFileType;
    move_uploaded_file($_FILES["artworkPath"]["tmp_name"], $filepath);
    $data_to_db['artworkPath'] =  $ph .".".$imageFileType;
    $db = getDbInstance();
    $last_id = $db->insert('album', $data_to_db);
}



/////////////////end   
    
    
    
  

  

    if ($last_id)
    {
        $_SESSION['success'] = 'Album added successfully!';
        // Redirect to the listing page
        header('Location: albums.php');
        // Important! Don't execute the rest put the exit/die.
    	exit();
    }
    else
    {
        echo 'Insert failed: ' . $db->getLastError();
        exit();

    }
}

// We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;
?>
<?php include BASE_PATH.'/includes/header.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Add Album</h2>
        </div>
    </div>
    <!-- Flash messages -->
    <?php include BASE_PATH.'/includes/flash_messages.php'; ?>
    <form class="form" action="" method="post" id="album_form" enctype="multipart/form-data">
        <?php include BASE_PATH.'/forms/album_form.php'; ?>
    </form>
</div>
<script type="text/javascript">
$(document).ready(function(){
   $('#album_form').validate({
       rules: {
            title: {
                required: true,
                minlength: 3
            },
//            l_name: {
//                required: true,
//                minlength: 3
//            },
            artworkPath:{
                required: true, 
                extension: "png|jpe?g|gif", 
                filesize: 1048576 
            }
        }
    });
});
</script>
<?php include BASE_PATH.'/includes/footer.php'; ?>