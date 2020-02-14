<?php
class Users
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
            'username' => 'Username',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'status' =>'Type'
        );

        return $ordering;
    }
}
?>