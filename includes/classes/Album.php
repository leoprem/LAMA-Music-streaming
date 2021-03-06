<?php
    class Album
    {
        private $id;
        private $title;
        private $artistId;
        private $genre;
        private $artworkPath;
        private $con;
        
        public function __construct($con,$id)
        {
            $this->con = $con;
            $this->id = $id;
            
            $album_query = mysqli_query($this->con,"SELECT * FROM album where id='$this->id'");
            $album_row = mysqli_fetch_assoc($album_query);
            
            $this->title = $album_row['title'];
            $this->artistId = $album_row['artist'];
            $this->genre = $album_row['genre'];
            $this->artworkPath = $album_row['artworkPath'];
        } 
        
        public function getTitle()
        {
            return $this->title;
        }
        public function getArtist()
        {
            return new Artist($this->con,$this->artistId);
        }
        public function getGenre()
        {
            return $this->genre;
        }
        public function getArtworkPath()
        {
            return ART_PATH.$this->artworkPath;
        }  
        public function getNumberOfSongs()
        {
            $query = mysqli_query($this->con,"SELECT id FROM songs WHERE album='$this->id'");
            return mysqli_num_rows($query);
        }
        public function getSongIds()
        {
            $query = $query = mysqli_query($this->con,"SELECT id FROM songs WHERE album='$this->id' ORDER BY albumOrder ASC");
            $array = array();
            
            while($row = mysqli_fetch_assoc($query))
            {
                array_push($array,$row['id']);
            }
            return $array;
        }
        
    }

?>