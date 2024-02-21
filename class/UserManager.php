<?php

class UserManager{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUser($pseudo, $password)
    {
        $req = $this->db->prepare('SELECT * FROM user WHERE user_name = :pseudo AND password = :password');
        $req->execute([
            'user_name' => $pseudo,
            'password' => $password
        ]);
        $data = $req->fetch();
        return new User($data);
    }

    public function addUser($pseudo, $password)
    {
        $req = $this->db->prepare('INSERT INTO user(user_name, password) VALUES (:user_name, :password)');
        $req->execute([            
            'user_name' => $pseudo,
            'password' => $password
        ]);
    }
}