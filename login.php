<?php


// session_start();
include 'inc/header.php'; 
include 'handlers/APIS.php';
if (isset($_SESSION['loged']) == 1) {
    header("Location: index.php"); 
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && 
    isset($_POST['login'])) {
    $result = $uvalid->loginvalidate($request->post('email'), $request->post('password'));
    $result2 = $ouser->logIn($request->post('email'),$request->post('password'));
    if(empty($result)){
        if (empty($result2)) {
             echo 'email is not found .';
        }else{

            $_SESSION['loged'] = 8 ;
             header("Location: index.php");  
        }

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
             if (empty($result) && empty($result2)) {
                echo 'vh-100';
             }?> d-flex justify-content-center align-items-center mx-auto text-center">
<form method='POST'>
<div class="row form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name='email' />
  <label for="floatingInput">Email address</label>
</div>
<div class="row form-floating mb-3">
  <input type="password" class="form-control" id="floatingInputpassword" placeholder="****************" name='password' />
  <label for="floatingInputpassword">Password</label>
</div>
  <button type="submit" class="btn btn-primary w-50" name='login'>Log in</button>
  <a class="btn btn-primary w-50 my-2" href='signup.php'>Sign up</a>
</form>
</div>
<?php include 'inc/footer.php'; ?>