<?php
class User {
  public $username;
    public $name;
    public $password;
    public $role;
    public $created_at;
    public $updated_at;

    public function __construct($username, $name, $password, $role = 'patient') {
        $this->username = $username;
        $this->name = $name;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->role = $role;
    }
};
