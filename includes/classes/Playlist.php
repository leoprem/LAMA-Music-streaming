<?php
    
    class Playlist
    {
        
        private $con;
        private $id;
        private $name;
        private $owner;
        
        public function __construct($con,$data)
        {
            if(!is_array($data))
            {
                $query = mysqli_query($con,"SELECT * from playlists WHERE id ='$data'");
                $data = mysqli_fetch_assoc($query);
            }
            $this->con = $con;
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->owner = $data['owner'];       
        } 
        public function getName()
        {
            return $this->name;
        }
       public function getId()
        {
            return $this->id;
        }
        public function getOwner()
        {
            return $this->owner;
        }
        public function getNumberOfSongs()
        {
            $query = mysqli_query($this->con,"SELECT songId FROM playlistsongs WHERE playlistid ='$this->id'");
            return mysqli_num_rows($query);
        }
        public function getSongIds()
        {
            $query = mysqli_query($this->con, "SELECT songId FROM playlistSongs WHERE playlistId='$this->id' ORDER BY id ASC");
            $array = array();
            while($row = mysqli_fetch_assoc($query))
            {
                array_push($array,$row['songId']);
            }
            return $array;
        }
        public static function getPlaylistDropdown($con,$username)
        {
            $dropdown = '<select class="item playlist">
            <option value="">Add to playlist</option>';
            
            $query = mysqli_query($con,"SELECT id,name FROM playlists WHERE owner = '$username'");
            
            while($row = mysqli_fetch_assoc($query))
            {
                $id = $row['id'];
                $name = $row['name'];
                $dropdown .= "<option value='$id'>$name</option>";
            }
            return $dropdown.'</select>';
        }
    }

?>