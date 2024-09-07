<?php
class UserValidation{

    protected $errors = [
        'email' => [
            'filter' => FILTER_VALIDATE_EMAIL,
            'error' => 'The email must be a valid email address.'
        ] ,
        'name' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'option' => ['options' => ['regexp' => "/^[a-zA-Z,'.\-\s]{5,}$/"]],
            'error' => 'The first name must ba at least 5 characters.'
        ] , 
        'password' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'option' => ['options' => ['regexp' => "/(\w|\W |\s){8,}/"]],
            'error' => 'Password must be at least one uppercase letter
                        lowercase letter , digit , a special character with no spaces and minimum 8 length.'
        ] ,
        'all_fields' =>[
            'required' => ' field is required.' ,
            'not-matched' => 'Confirmed Password doesn\'t Matched.'
        ]
    
    ]; 
    protected $errorlist;
    public function validate($name,$email,$password,$cpassword){
        if(empty($name)){
            $this->errorlist['name']['required'] = 'The name '.$this->errors['all_fields']['required'] ;
        }else{
               if(!filter_var($name,$this->errors['name']['filter'], $this->errors['name']['option'])){
                  $this->errorlist['name']['error'] = $this->errors['name']['error'] ;
             }
        }
        if($email == '' ){
            $this->errorlist['email']['required'] = 'The email '.$this->errors['all_fields']['required'] ;
        }else{
            if(!filter_var($email,$this->errors['email']['filter'])){
                $this->errorlist['email']['error'] = $this->errors['email']['error'] ;
             }
        }  
        if($password == '' ){
            $this->errorlist['password']['required'] = 'The password '.$this->errors['all_fields']['required'] ;
        }else{
            if(!filter_var($password,$this->errors['password']['filter'] , $this->errors['password']['option'])){
                $this->errorlist['password']['error'] = $this->errors['password']['error'] ;
             }
        }    
        if(empty($cpassword) ){
            $errorlist['cpassword']['required'] = 'The Confirmed password '.$this->errors['all_fields']['required'] ;
        }else{
            if($password != $cpassword){
                $errorlist['cpassword']['error'] = $this->errors['all_fields']['not-matched'] ;
             }
        } 
    

        return $this->errorlist;
    }
    public function loginvalidate($email,$password){
        if($email == '' ){
            $this->errorlist['email']['required'] = 'The email '.$this->errors['all_fields']['required'] ;
        } 
        if($password == '' ){
            $this->errorlist['password']['required'] = 'The password '.$this->errors['all_fields']['required'] ;
        }      

        return $this->errorlist;
    }
}


?>