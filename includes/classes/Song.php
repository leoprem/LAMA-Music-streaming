<?php
    class Song
    {
        private $id;
        private $con;
        private $mysqliData;
        private $title;
        private $artistId;
        private $albumId;
        private $languageId;
        private $genreId;
        private $duration;
        private $path;
        
        
        public function __construct($con,$id)
        {
            $this->con = $con;
            $this->id = $id;
            
            $query = mysqli_query($this->con,"SELECT * FROM songs where id='$this->id'");
            $mysqliData = mysqli_fetch_assoc($query);
            
            $this->title = $mysqliData['title'];
            $this->artistId = $mysqliData['artist'];
            $this->albumId = $mysqliData['album'];
            $this->languageId = $mysqliData['language'];
            $this->genreId = $mysqliData['genre'];
            $this->duration = $mysqliData['duration'];
            $this->path = $mysqliData['path'];
            
        } 
        public function getTitle()
        {
            return $this->title;
        }
        public function getArtist()
        {
            return new Artist($this->con,$this->artistId);
        }
        public function getAlbum()
        {
            return new Album($this->con,$this->albumId);
        }
        public function getLanguage()
        {
            return new Language($this->con,$this->language);
        }
        public function getGenre()
        {
            return Genre($this->con,$this->genre);
        }
        public function getDuration()
        {
            return $this->duration;
        }
        public function getPath()
        {
            return $this->path;
        }
        public function getMysqliData()
        {
            return $this->mysqliData;
        }
    }

?>