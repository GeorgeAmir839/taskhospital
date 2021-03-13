<?php
require 'connected.php';
class class1
{
    var $name;
    var $email;
    var $password;
    var $nationalid;
    function __construct()
    {
        echo "welcome";
    }

    function setname($name){
        $this->name=$name;

    }
    function getname(){
        return $this->name;
    }
    function setemail($email){
        $this->email=$email;

    }
    function getemail(){
        return $this->email;
    }
    function setpassword($password){
        $this->password=$password;

    }
    function getpassword(){
        return $this->password;
    }
    function setnationalid($nationalid){
        $this->nationalid=$nationalid;

    }
    function getnationalid(){
        return $this->nationalid;
    }
    



}
?>