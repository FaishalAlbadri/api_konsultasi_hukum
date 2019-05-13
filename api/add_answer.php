<?php
include 'db.php'; 
 

if(isset($_POST["user_name"]) && 
   isset($_POST["answer"]) && 
   isset ($_POST["id_ask"])){

  $user_name= $_POST['user_name'];
  $id_ask= $_POST['id_ask'];
  $answer= $_POST['answer'];

 
  $query = "INSERT INTO tb_answer (user_name,id_ask,answer) VALUES ('$user_name','$id_ask','$answer')";
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