<?php
    require_once('classes/database.php');
    $con = new database();
 
    $sweetAlertConfig = "";
 
    if (isset($_POST['add_student'])){
     
      
      $firstname = $_POST['first_name'];
      $lastname = $_POST['last_name'];
      $email = $_POST['email'];
      $admin_id = $_SESSION['admin_id'];
 
      $userID = $con->addstudent($firstname, $lastname, $email ,$admin_id);
     
      if ($userID) {
        $sweetAlertConfig = "
        <script>
        Swal.fire({
          icon: 'success',
          title: 'Registration Successful',
          text: 'You have successfully registered as an admin.',
          confirmButtonText: 'OK'
        }).then(() => {
          window.location.href = 'login.php';
        });
        </script>
        ";
      } else {
        $sweetAlertConfig = "
         <script>
        Swal.fire({
          icon: 'error',
          title: 'Registration Failed',
          text: 'An error occurred during registration. Please try again.',
          confirmButtonText: 'OK'
        });
        </script>"
       
        ;
      }
    }
?>