<?php
include 'db.php'; 
 

if(isset($_POST["user_name"]) && 
   isset ($_POST["ask"])){

  $user_name= $_POST['user_name'];
  $ask= $_POST['ask'];

 
  $query = "INSERT INTO tb_ask (user_name,ask) VALUES ('$user_name','$ask')";
  $hasil  = mysqli_query($conn,$query);
  if($hasil)
  {
      $response["result"]= true ;
      $response["msg"]= "Berhasil";
      echo json_encode($response);
  }
 else {
     $response['result']= false ;
     $response['msg']="Terjadi Kesalahan Data";
     echo json_encode($response);
  }
}else{
    $response['result']= false ;
    $response['msg']="Anda Tidak Berhasil";
    echo json_encode($response);
}
?>