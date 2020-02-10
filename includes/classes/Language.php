<?php
    class Language
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
            $query = mysqli_query($this->con,"SELECT language FROM languages WHERE id='$this->id'");
            
            $language = mysqli_fetch_assoc($query);
            return $language['language'];
        }   
    }

?>