<?php
    include '../php/connect.php';
    $id = $_GET['id'];

    $g = "DELETE FROM imihigo WHERE id='$id'";

    $del = $conn->query($g);

    if($del === TRUE) {
        echo "<script>alert('Umuhigo wavanyweho neza!')</script>";
        echo "<script>window.location.href = './imihigo.php'</script>";
    }

?>