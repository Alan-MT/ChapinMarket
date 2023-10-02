<?php
$host = "localhost";
$dbname = "chapinmarket";
$user = "postgres";
$password = "Ottopaty73";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

 if (isset($_POST['checking_edit'])) {
    $stud_id = $_POST['cust_id'];
    $result_array = [];

    // Use prepared statement to fetch customer data
    $query = "SELECT * FROM ventaCompra.cliente";
    $result = pg_query_params($conn, $query, array($stud_id));

    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    } else {
        echo $return = "No se encontraron registros.";
    }
}

pg_close($conn);
?>
