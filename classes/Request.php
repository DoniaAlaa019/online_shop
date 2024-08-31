<?php

class Request{

    public function get($index){
        return (isset($_GET[$index]))? $_GET[$index] : false;
    }
    public function post($index){
        return (isset($_POST[$index]))? $_POST[$index] : false;
    }
    public function file($index){
        return (isset($_FILES[$index]))? $_FILES[$index] : false;
    }
}



?>