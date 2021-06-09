<?php 
session_start();
if(isset($_SESSION['username'])){
   
 }else{
  header('location:index.php');
 
  }

  include('config2/connects.php');

  $sql = 'SELECT name, number,id FROM clothes';
  $result = mysqli_query($conn, $sql);
  
  $clothes = mysqli_fetch_all($result,MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);
  
?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/headerAdmin.php'); ?>
<h3 class="center-align"><?php echo 'welcome '.$_SESSION['username'];?></h3>
<h4 class="center  grey-text">clothes</h4>
<div class="container">
<div class="row">
<?php foreach($clothes as $clothe): ?>
<div clas = "col s6  md3">


<div class="card z-depth-0">
<div class="card-content center">
<h6>name:<?php echo htmlspecialchars($clothe["name"]); ?></h6>
<div>available number:<?php echo htmlspecialchars($clothe["number"]); ?></div>

</div>
<div class = "card-action right-align">
<a href="details.php?id=<?php echo $clothe['id']?>" class="brand-text">more info</a>


</div>
</div>
</div>
<?php endforeach; ?>
</div>
</div>

<?php include('templates/footer.php'); ?>
</html>