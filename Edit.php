<?php 

session_start();
if(isset($_SESSION['username'])){
   
 }else{
 
    header('Location: index.php');

  }

include('config2/connects.php');
if(isset($_GET['id'])){
    $id= mysqli_real_escape_string($conn,$_GET['id']);
   $sql = "SELECT * FROM clothes WHERE id=$id";
   $result = mysqli_query($conn, $sql);
   $clothe = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);

}

$email=$name = $number = "";

$errors = array('email'=>'','name' =>'','number'=>'');
if(isset($_POST['submit'])){
    $id = mysqli_real_escape_string($conn, $_POST['id_to_edit']);
  
    if(empty($_POST['email'])){
        $errors['email'] =  'an email is required<br />';
    }else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $errors['email'] = "email must be valid";
        }
      
    }
    if(empty($_POST['name'])){
        $errors['name']= "an name is required<br />";
   
    }
    if(empty($_POST['number'])){
        $errors['number']= "an number is required<br />";
    }

    if(array_filter($errors)){

    }else{
    
       
        $email = $_POST['email'];
        $name = $_POST['name'];
        $number = $_POST['number'];
     

        // create sql
        $sql = "UPDATE clothes SET name ='$name' , email = '$email',number = '$number' WHERE id='$id' ";

        // save to db and check
        if(mysqli_query($conn, $sql)){
            // success
            header('Location: dashboard.php');
        } else {
            echo 'query error: '. mysqli_error($conn);
        }
     
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>
 
 <section class="container grey-text">
 <h4 class="center">Edit clothes</h4>
 <form action="Edit.php" method ="POST" class="white">


 <label>your email</label>
 <input type="text"name ="email" value ="<?php echo htmlspecialchars($email) ;  ?>">
 <div class="red-text"><?php echo $errors['email'];?></div>
 <label>clothes type</label>
 <input type="text" name ="name" value ="<?php echo htmlspecialchars($name) ;  ?>" >
 <div class="red-text"><?php echo $errors['name'];?></div>
 <label>number available</label>
 <input type="number"name ="number" value ="<?php echo $number ;  ?>" >
 <div class="red-text"><?php echo $errors['number'];?></div>
 <div class="center">
     
 <input type="hidden" name="id_to_edit" value="<?php echo $clothe['id']; ?>">
 <input type="submit" name = "submit" value ="save" class ="btn brand z-depth-0">
</form>

 </div>
 </form>
 </section>

<?php include('templates/footer.php'); ?>
    

</html>