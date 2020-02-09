<?php
    class Artist
    {
        private $id;
        private $con;
        
        public function __construct($con,$id)
        {
            $this->con = $con;
            $this->id = $id; 
        } 
        
        public function getName()
        {
            $artist_query = mysqli_query($this->con,"SELECT name FROM artist where id='$this->id'");
            $artist = mysqli_fetch_assoc($artist_query);
            return $artist['name'];
        }
        
        

        
    }

?>