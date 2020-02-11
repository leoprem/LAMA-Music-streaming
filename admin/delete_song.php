<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if($_SESSION['admin_type']!='super'){
		$_SESSION['failure'] = "You don't have permission to perform this action";
    	header('location: songs.php');
        exit;

	}
    $song_id = $del_id;

    $path_db = getDbInstance();
    $path_db->where('id', $song_id);
    $art_path = $path_db->getvalue('songs','path');
    
    $db = getDbInstance();
    $db->where('id', $song_id);
    $status = $db->delete('songs');
    
    $status = unlink($art_path);
    
    if ($status) 
    {
        $_SESSION['info'] = "Song deleted successfully!";
        header('location: songs.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete song.";
    	header('location: songs.php');
        exit;

    }
    
}