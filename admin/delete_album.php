<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if($_SESSION['admin_type']!='super'){
		$_SESSION['failure'] = "You don't have permission to perform this action";
    	header('location: albums.php');
        exit;

	}
    
    $album_id = $del_id;
    $path_db = getDbInstance();
    $path_db->where('id', $album_id);
    $art_path = $path_db->getvalue('album','artworkPath');
    
    $db = getDbInstance();
    $db->where('id', $album_id);
    $status = $db->delete('album');
    $status = unlink(ART_PATH.$art_path);
    
    if ($status) 
    {
        $_SESSION['info'] = "Album deleted successfully!";
        header('location: albums.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete album.";
    	header('location: albums.php');
        exit;

    }
    
}