<?php 

include('config2/connects.php');

$sql = 'SELECT name, number,id FROM clothes';
$result = mysqli_query($conn, $sql);

$clothes = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<h4 class="center  grey-text">clothes</h4>
<div class="container">
<div class="row">
<?php foreach($clothes as $clothe): ?>
<div clas = "col s6  md3">


<div class="card z-depth-0">
<div class="card-content center">
<h6><?php echo htmlspecialchars($clothe["name"]); ?></h6>
<div><?php echo htmlspecialchars($clothe["number"]); ?></div>

</div>
</div>
</div>
<?php endforeach; ?>
</div>
</div>

<?php include('templates/footer.php'); ?>
</html>