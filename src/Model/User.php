<?php

class User
{
    private Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function register()
    {
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $this->db->query("INSERT INTO users (name, mail, password) VALUES (:name, :mail, :password)", [
            'name' => $name,
            'mail' => $mail,
            'password' => $password,
        ]);
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM users");
        return $this->db->dbAllResults();
    }
}