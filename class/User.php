<?php

class User{

    private $id;
    private $pseudo;
    private $password;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->pseudo = $data['user_name'];
        $this->password = $data['password'];
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

   

    public function getId()
    {
        return $this->id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

}