<?php 
session_start();

if(isset($_SESSION['username'])){
  header('location: dashboard.php');
}else{
  header('location: logIn.php');
}
include('config/connect.php');


?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>






        


<?php include('templates/footer.php'); ?>
</html>