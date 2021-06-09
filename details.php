<?php

include('config2/connects.php');

session_start();
if(isset($_SESSION['username'])){
   
 }else{
    header('Location: index.php');
 
  }
if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM clothes WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        header('Location: dashboard.php');
    } else {
        echo 'query error: '. mysqli_error($conn);
    }

}
if(isset($_GET['id'])){
    $id= mysqli_real_escape_string($conn,$_GET['id']);
   $sql = "SELECT * FROM clothes WHERE id=$id";
   $result = mysqli_query($conn, $sql);
   $clothe = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);

}

?>
<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>
<div class="container center">
		<?php if($clothe): ?>
			<h4><?php echo $clothe['name']; ?></h4>
			<p>Created by <?php echo $clothe['email']; ?></p>
			<p>at:<?php echo date($clothe['created_at']); ?></p>
			<h5>number available:</h5>
			<p><?php echo $clothe['number']; ?></p>
	           
      
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $clothe['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>
			<a href="edit.php?id=<?php echo $clothe['id']?>"  class='btn brand z-depth-0'>Edit</a>

			
		<?php else: ?>
			<h5>No such clothe exists.</h5>
		<?php endif ?>
	</div>
<?php include('templates/footer.php'); ?>
</html>