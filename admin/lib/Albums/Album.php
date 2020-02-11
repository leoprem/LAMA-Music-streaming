<?php
class Album
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = array(
            'id' => 'ID',
            'title' => 'Title',
            'artist' => 'Artist',
            'genre' => 'Genre',
            'artworkPath' => 'Artwork',
        );

        return $ordering;
    }
}
?>
