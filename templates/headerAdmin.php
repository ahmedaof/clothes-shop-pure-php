<?php 


?>

<!DOCTYPE html>
<html lang="en">
<style>
.disp{

    
    display:none !important;

}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clothes shop</title>
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<style>
.brand{
    background:#cbb09c !important;
}
.brand-text{
   color: #cbb09c !important;
}
form{
    maxx-width:460px;
    margin:20px auto;
    padding:20px
}
</style>
</head>
<body class="grey lighten-4">
<nav class="white z-depth-0">
<div class='container'>
<a href="index.php" class='brand-logo center brand-text'>Clothes Shop</a>
<ul id="nav-mobile" class ="right hide-on-small-and-down">

<li><a href="logIn.php" class ="btn brand z-depth-0"><?php  echo $_SESSION['username']; ?></a></li>

<li><a href="add.php" class ="btn z-depth-0">add clothes</a></li>
<li><a href="logOut.php" class ="btn z-depth-0">log out</a></li>

</ul>
</div>
</nav>

</html>