<?php 
session_start();

if(isset($_SESSION['username'])){
  header('location: dashboard.php');
}
include('config/connect.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
$username = $_POST['username'];
$pass = $_POST['password'];
$hashedPass = sha1($pass);
$stmt =$conn->prepare("SELECT username ,password from users WHERE username =? AND password =? AND GroupId =1 ");
$stmt->execute(array( $username ,$hashedPass));
$count = $stmt->rowCount();
echo $count;

if($count > 0){
   $_SESSION['username']= $username;
    header('location: dashboard.php');
    exit();
 }else{
    header('location: index.php');
}


}

?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<h3 class="center-align">please log in first</h3>
<h3 class="center-align">Admin Log In</h3>


<div class="row">
    <form class="col s6  offset-s3" action ="logIn.php" method = 'POST' >
      <div class="row ">
        <div class="input-field col s12 ">
          <input id="username" type="text"  name = 'username'>
          <label for="username">username</label>
        </div>
      </div>
      <div class="row ">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name ='password'>
          <label for="password">Password</label>
        </div>
      </div>
       <input type ="submit" name ='logIn' value = "logIN" class="btn brand z-depth-0">
    </form>
  </div>
        


<?php include('templates/footer.php'); ?>
</html>