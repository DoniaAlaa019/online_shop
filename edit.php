<?php 

require 'inc/header.php'; 
include_once 'handlers/APIS.php';
if (isset($_SESSION['loged']) == '') {

    header("Location: login.php");  
}
$data = $opro->selectOne($request->get('id'));
if(empty($data)){
    header("Location: notfound.php");  
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && 
    isset($_POST['submit'])) {
    $result1 = $valid->validate($request->post('name'),$request->post('price'),$request->file('img'),$request->post('desc'));
    if(empty($result1) || ($data[0]['image'] == "images//".$request->file('img')['name']) ){
        $img = $request->file('img')['name'];
        $result = $opro->editProduct($request->get('id'),$request->post('name'),$request->post('desc'),$request->post('price'),"images//$img");
        move_uploaded_file($request->file('img')['tmp_name'],"images/$img");
        header("Location: index.php");  
    }else{
        foreach ($result1 as $value) {
            foreach ($value as $index) {
                echo $index.'<br>' ;
            }
        }
    }
}
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <form method='POST' enctype="multipart/form-data">
                <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name = "name" value="<?php echo $data[0]['name'] ; ?>"/>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $data[0]['price'] ; ?>"/>
                </div>

                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "desc"><?php echo $data[0]['description'] ; ?></textarea>
                </div>

                <div class="mb-3">
                <label for="formFile" class="form-label">Image:</label>
                <input class="form-control" type="file" id="formFile" name="img" value="<?php echo $data[0]['image'] ; ?>"/>
                </div>

                <div class="col-lg-3">
                        <img src="<?php echo $data[0]['image'] ; ?>" class="card-img-top"/>
                        </div>
                        
                <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>



<?php include 'inc/footer.php'; ?>