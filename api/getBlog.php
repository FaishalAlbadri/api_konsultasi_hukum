<?php

include 'db.php';

$sql = "SELECT * FROM tb_blog";
//buatkan variable untuk menampung nilai array
$response = array();

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $response['blog'] = array();
    while($row = $result->fetch_assoc()) {
        //buatkan array untuk menamping data sementar
        $data = array();
        $data['id_blog']        = $row['id_blog'];
        $data['blog_title']     = $row['blog_title'];
        $data['blog_news']       = $row['blog_news'];
        $data['blog_upload']       = $row['blog_upload'];
        $data['blog_img']       = $row['blog_img'];
        array_push($response['blog'], $data);
    }
    $response['status'] = '1';
    $response['msg'] = 'Data Semua Blog';
    echo json_encode($response);
} else {
    $response['status'] = '0';
    $response['msg'] = 'Tidak Ada Data Blog';
    echo json_encode($response);
}
$conn->close();

?>