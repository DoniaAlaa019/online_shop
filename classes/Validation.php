<?php
class Validation{

    protected $errors = [
        'name' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'option' => ['options' => ['regexp' => "/^[a-zA-Z,'.\-\s\d]{5,}$/"]],
            'error' => 'The name must ba at least 5 characters.'
        ] , 
        'price' => [
            'filter' => FILTER_VALIDATE_REGEXP,
           'option' => ['options' => ['regexp' => "/^([0-9]{1,8})+(\.[0-9]{0,8})?$/"]],
            'error' => 'The price must ba number only.'
        ] ,
        'image' => [
            'extension' => 'jpg',
            'Error_extension' => 'The extension of uploaded image must be jpg',
            'size' => 1024*1024*21 ,
            'Error_size' => 'The size of upload image must ba greater than 21M' ,
            'exist' => 'The upload image is found'
        ] , 
        'all_fields' =>[
            'required' => ' field is required.' 
        ]
    
    ]; 
    protected $errorlist;
    public function validate($name,$price,$image,$des){
        if(empty($name)){
            $this->errorlist['name']['required'] = 'The name '.$this->errors['all_fields']['required'] ;
        }else{
               if(!filter_var($name,$this->errors['name']['filter'], $this->errors['name']['option'])){
                  $this->errorlist['name']['error'] = $this->errors['name']['error'] ;
             }
        }
        if($price == '' ){
            $this->errorlist['price']['required'] = 'The price name '.$this->errors['all_fields']['required'] ;
        }else{
            if(!filter_var($price,$this->errors['price']['filter'] , $this->errors['price']['option'])){
                $this->errorlist['price']['error'] = $this->errors['price']['error'] ;
             }
        }      
        if(empty($image['name'])){
            $this->errorlist['image']['required'] = 'The upload image '.$this->errors['all_fields']['required'] ;
        }else{
            
            $nameimage = $image['name'];
            $ext = strtoupper(pathinfo($image['name'], PATHINFO_EXTENSION));
            if(file_exists("images/$nameimage")){
                $this->errorlist['image']['error'] = $this->errors['image']['exist'] ;
            }elseif(strtolower($ext) != $this->errors['image']['extension'] ) {
                $this->errorlist['image']['error'] = $this->errors['image']['Error_extension'] ;
            }elseif(((int)$image['size']) > $this->errors['image']['size']) {
                $this->errorlist['image']['error'] = $this->errors['image']['Error_size'] ;

            } 
            // else {
            //     move_uploaded_file($image['tmp_name'],"images/$nameimage");
            // }  
        }
        if(empty($des) ){
            $this->errorlist['des']['required'] = 'The des '.$this->errors['all_fields']['required'] ;
        }
        return $this->errorlist;
    }
}


?>