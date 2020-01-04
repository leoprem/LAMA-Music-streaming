<?php
class Songs
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
        $ordering = [
            'id' => 'ID',
            'title' => 'Title',
            'artist' => 'Artist',
            'album' => 'Album',
            'language' => 'Language',
            'genre' => 'Genre'
        ];

        return $ordering;
    }
}
?>
