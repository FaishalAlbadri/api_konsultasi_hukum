<?php

include 'db.php';

$sql = "SELECT * FROM tb_ask";
//buatkan variable untuk menampung nilai array
$response = array();

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $response['question'] = array();
    while($row = $result->fetch_assoc()) {
        //buatkan array untuk menamping data sementar
        $data = array();
        $data['id_ask']        = $row['id_ask'];
        $data['user_name']       = $row['user_name'];
        $data['ask']       = $row['ask'];
        array_push($response['question'], $data);
    }
    $response['status'] = '1';
    $response['msg'] = 'Data Semua Question';
    echo json_encode($response);
} else {
    $response['status'] = '0';
    $response['msg'] = 'Tidak Ada Data Question';
    echo json_encode($response);
}

$conn->close();

?>