<?php
include 'SQLConnection.php' ;
class Product extends SQLConnection{
    
    public function selectAll(){
        $query = "select * from product";
        $result = $this->conn->prepare($query);
        $result->execute();
        if(!empty($result)){
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }
    public function selectOne($id){
        $query = "select * from product where id = ?";
        $result = $this->conn->prepare($query);
        $result->execute([$id]);
        if(!empty($result)){
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }
    public function createProduct($name , $des , $price , $img ){
        $query = "insert into product(name,code,price,description,image) 
        values ('$name','2000','$price','$des','$img');";
        $result = $this->conn->prepare($query);
        $result->execute();
        if(!empty($result)){
            return 1;
        }
        return 0;
    }
    public function editProduct($id , $name , $des , $price , $img ){
        $query = "update product set name = '$name' , 
        price = '$price' , description = '$des' , image = '$img' where id = ?";
        $result = $this->conn->prepare($query);
        $result->execute([$id]);
        if(!empty($result)){
            return 1;
        }
        return 0;
    }
    public function deleteProduct($id){
        $query = "delete from  product where id = ?";
        $result = $this->conn->prepare($query);
        $result->execute([$id]);
        if(!empty($result)){
            return 1;
        }
        return 0;
    }
}

?>