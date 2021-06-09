<?php 


session_start();
if(isset($_SESSION['username'])){
   
 }else{
    header('Location: index.php');
 
  }

include('config2/connects.php');

$email=$name = $number ="";

$errors = array('email'=>'','name' =>'','number'=>'');
if(isset($_POST['submit'])){
if(empty($_POST['email'])){
    $errors['email'] = 'An email is required';
} else{
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email must be a valid email address';
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
    
   
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
      
        // create sql
        $sql = "INSERT INTO clothes(name,email,number) VALUES('$name','$email','$number')";

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
 <h4 class="center">add clothes</h4>
 <form action="add.php" method ="POST" class="white">
 <label>your email</label>
 <input type="text"name ="email" value ="<?php echo htmlspecialchars($email) ;  ?>">
 <div class="red-text"><?php echo $errors['email'];?></div>
 <label>clothes type</label>
 <input type="text" name ="name" value ="<?php echo htmlspecialchars($name) ;  ?>" >
 <div class="red-text"><?php echo $errors['name'];?></div>
 <label>number available</label>
 <input type="number"name ="number" value ="<?php echo $number ;  ?>" >
 <div class="red-text"><?php echo $errors['number'];?></div><br>

 <div class="center">
 <input type="submit" name = "submit" value ="submit" class ="btn brand z-depth-0">
 </div>
 </form>
 </section>

<?php include('templates/footer.php'); ?>
    

</html>