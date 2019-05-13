<?php
include "db.php"; 
 
 if (isset($_POST['id_ask'])) {

	$id_ask = $_POST['id_ask'];
	$response = array();
 
	$query = "SELECT * FROM tb_answer WHERE id_ask ='$id_ask'";
	$hasil = mysqli_query($conn,$query);
 
if(!$hasil ||mysqli_num_rows($hasil)>0){
   $response['theanswer']= array();

	while ($row = mysqli_fetch_assoc($hasil)) {

		$data= array();

		$data['id_answer']=$row['id_answer'];
		$data['id_ask']=$row['id_ask'];
		$data['user_name']=$row['user_name'];
		$data['answer']=$row['answer'];

		array_push($response['theanswer'],$data);
	}
	
    $response['result']= true ;
    $response['msg']="Berhasil";
    echo json_encode($response);

 
} else {  
 	$response['result']= false ;
    $response['msg']="Kosong";
    echo json_encode($response);
}
}
$conn->close();
?>
