<?php
include 'db.php'; 
 

if(isset($_POST["user_name"]) && 
   isset ($_POST["user_fullname"]) && 
   isset ($_POST["user_mail"]) && 
   isset ($_POST["user_password"]) && 
   isset ($_POST["user_birthday"]) && 
   isset ($_POST["user_gender"])){

  $user_name= $_POST['user_name'];
  $user_fullname= $_POST['user_fullname'];
  $user_mail= $_POST['user_mail'];
  $user_password= $_POST['user_password'];
  $user_birthday= $_POST['user_birthday'];
  $user_gender = $_POST['user_gender'];

 
  $query = "INSERT INTO tb_user (user_name,user_fullname,user_mail,user_password,user_birthday,user_gender) VALUES ('$user_name','$user_fullname','$user_mail','$user_password','$user_birthday','$user_gender')";
  $hasil  = mysqli_query($conn,$query);
  if($hasil)
  {
      $response["result"]= true ;
      $response["msg"]= "Register Berhasil";
      echo json_encode($response);
  }
 else {
     $response['result']= false ;
     $response['msg']="Username/Email Sudah Terpakai";
     echo json_encode($response);
  }
}else{
    $response['result']= false ;
    $response['msg']="Anda Tidak Berhasil Register";
    echo json_encode($response);
}
?>