<?php
$conn = mysqli_connect('localhost', 'ahmed','test1234',"clothes_shop");
if(!$conn){
    echo 'error is:'.mysqli_connect_error();
}
?>