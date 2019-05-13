<?php
include "db.php"; 
 
 if (isset($_POST['user_name']) && isset($_POST['user_password'])) {

	$user_name = $_POST['user_name'];
	$user_password = $_POST['user_password'];
	$response = array();
 
	$query = "SELECT * FROM tb_user WHERE user_name ='$user_name' AND user_password='$user_password'";
	$hasil = mysqli_query($conn,$query);
 
if(!$hasil ||mysqli_num_rows($hasil)>0){
   $response['user']= array();

	while ($row = mysqli_fetch_assoc($hasil)) {

		$data= array();

		$data['id_user']=$row['id_user'];
		$data['user_name']=$row['user_name'];
		$data['user_fullname']=$row['user_fullname'];
		$data['user_mail']=$row['user_mail'];
		$data['user_password']=$row['user_password'];
		$data['user_birthday']=$row['user_birthday'];
		$data['user_gender']=$row['user_gender'];

		array_push($response['user'],$data);
	}
	
    $response['result']= true ;
    $response['msg']="login berhasil";
    echo json_encode($response);

 
} else {  
 	$response['result']= false ;
    $response['msg']="login,gagal";
    echo json_encode($response);
}
}
$conn->close();
?>
