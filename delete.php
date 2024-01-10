<?php

require_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST["id"];
    $query = "DELETE FROM transaksi WHERE ID = $ID";
    var_dump($query);
    $result = mysqli_query($conn, $query);
    header("location:index.php");
} else {
    header("location:index.php");
}
