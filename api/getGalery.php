<?php

include 'db.php';

$sql = "SELECT * FROM tb_galery";
//buatkan variable untuk menampung nilai array
$response = array();

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $response['galery'] = array();
    while($row = $result->fetch_assoc()) {
        //buatkan array untuk menamping data sementar
        $data = array();
        $data['id_galery']        = $row['id_galery'];
        $data['galery_title']     = $row['galery_title'];
        $data['galery_img']       = $row['galery_img'];
        $data['galery_date']       = $row['galery_date'];
        array_push($response['galery'], $data);
    }
    $response['status'] = '1';
    $response['msg'] = 'Data Semua Galery';
    echo json_encode($response);
} else {
    $response['status'] = '0';
    $response['msg'] = 'Tidak Ada Data Galery';
    echo json_encode($response);
}

$conn->close();

?>