<?php

class UsersController extends Controller
{
    public function __construct()
    {
        Parent::__construct("Users");
    }
    public function signIn($values)
    {
        $values = $this->sanitizeInputArray($values);
        $email = $values["email"];
        $password = $values["password"];
        return $this->selectWhere("Where `email` = '$email' and `password` = '$password'");
    }
    public function signUp($values)
    {
        $values = $this->sanitizeInputArray($values);
        $this->insert($values);
    }
}
?>