<?php
session_start();
?>
<html>
<script src="validations.js"></script>
<?php
include 'database.php';

$showAlert = false; 
$showError = false; 
$exists=false;

if (isset($_POST['signup'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

        $email =$_POST['Email']; 
        $password =$_POST['Password'];
        $name =$_POST['Name'];
        $dir = '/database/images/';
        $filename = $dir.$_FILES['picture']['name'];
        move_uploaded_file($_FILES['picture']['tmp_name'],$filename);
        $securityQuestion = $_POST['security'];
        
       // if(($password == $cpassword) && $exists==false) {   
           // $hash = password_hash($password, PASSWORD_DEFAULT);
                 
            $sql="insert into learner(email,password,fname,picture,security_answer) 
                    values('".$_POST["email"]."','".$_POST["password"]."','".$_POST['fname']."','".
                .$filename."','".$_POST["security_answer"]."')";

               // $_FILES['picture']['name']
            $result = $conn->query($sql);
    
            if ($result) 
                $showAlert = true; 
       //} 

    if($showAlert) {    
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }

    if($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert aria-label="Close"> <span aria-hidden="true">×</span> 
        </button> 
        </div> '; 
    }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> 
        </button>
    </div> '; 
    }
}

if(isset($_POST['cancel'])){
    header("Location:home.php");
}