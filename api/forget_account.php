<?php
include "db.php"; 
 
 if (isset($_POST['user_mail'])) {

	$user_mail = $_POST['user_mail'];
	$response = array();
 
	$query = "SELECT * FROM tb_user WHERE user_mail ='$user_mail'";
	$hasil = mysqli_query($conn,$query);
 
if(!$hasil ||mysqli_num_rows($hasil)>0){
   $response['user']= array();

	while ($row = mysqli_fetch_assoc($hasil)) {

		$data= array();

		$data['user_name']=$row['user_name'];
		$data['user_password']=$row['user_password'];
		array_push($response['user'],$data);
	}
	
    $response['result']= true ;
    $response['msg']="berhasil";
    echo json_encode($response);

 
} else {  
 	$response['result']= false ;
    $response['msg']="gagal";
    echo json_encode($response);
}
}
$conn->close();
?>
