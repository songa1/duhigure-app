<?php
    include '../php/connect.php';
    $id = $_GET['id'];

    $g = "DELETE FROM members WHERE member_id=$id";

    $del = $conn->query($g);

    if($del === TRUE) {
        echo "<script>alert('Umunyamuryango yavanyweho neza!')</script>";
        echo "<script>window.location.href = './abanyamuryango.php'</script>";
    }

?>