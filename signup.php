<?php
include 'inc/header.php';
include 'handlers/APIS.php'; 
if (isset($_SESSION['loged']) == 1) {
    header("Location: index.php");  
}
$result=[];
if ($_SERVER["REQUEST_METHOD"] == "POST" && 
    isset($_POST['signup'])) {
    $result = $uvalid->validate($request->post('name'),$request->post('email'),$request->post('password'),$request->post('cpassword'));
    if(empty($result)){
        $ouser->signUp($request->post('name'),$request->post('email'),$request->post('password'));
        header("Location: login.php");  
    }else{
        foreach ($result as $value) {
            foreach ($value as $index) {
                echo $index.'<br>' ;
            }
        }
    }
}

?>
<div class="row w-50 container <?php 
             if (empty($result)) {
                echo 'vh-100';
             }?> d-flex justify-content-center align-items-center mx-auto text-center">
<form method='POST'>
<div class="row form-floating mb-3 ">
  <input type="text" class="form-control" id="floatingInputname" placeholder="name" name='name' />
  <label for="floatingInputname">Name</label>
</div>
<div class="row form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name='email' />
  <label for="floatingInput">Email address</label>
</div>
<div class="row form-floating mb-3">
  <input type="password" class="form-control" id="floatingInputpassword" placeholder="****************" name='password' />
  <label for="floatingInputpassword">Password</label>
</div>
<div class="row form-floating mb-3">
  <input type="password" class="form-control" id="floatingInputcpassword" placeholder="****************" name='cpassword' />
  <label for="floatingInputcpassword">Password</label>
</div>

  <button type="submit" class="btn btn-primary w-50" name='signup'>Sign up</button>
  <a class="btn btn-primary w-50 my-2" href='login.php'>Log in</a>
</form>
</div>
<?php include 'inc/footer.php'; ?>