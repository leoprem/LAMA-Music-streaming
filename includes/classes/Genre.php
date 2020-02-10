<?php
    class Genre
    {
        private $id;
        private $con;
        
        public function __construct($con,$id)
        {
            $this->con = $con;
            $this->id = $id; 
        } 
        
        public function getLanguage()
        {
            $query = mysqli_query($this->con,"SELECT name FROM genres WHERE id='$this->id'");
            $genre = mysqli_fetch_assoc($query);
            return $genre['name'];
        }   
    }

?>