<?php
require_once 'Product.php' ;
class User extends Product {
    
    public function logIn($email,$password){
        $sqlconn = new  SQLConnection() ;
        $query = "select * from user where email =:email and password =:password";
        $result = $sqlconn->conn->prepare($query);
        $result->execute(['email' => $email , 'password' => $password ]);
        if(!empty($result)){
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }
    public function signUp($name , $email , $password ){
        $sqlconn = new  SQLConnection() ;
        $query = "insert into user(name,email,password) 
        values ('$name','$email','$password');";
        $result = $sqlconn->conn->prepare($query);
        $result->execute();
        if(!empty($result)){
            return 1;
        }
        return 0;
    }
   
}

?>