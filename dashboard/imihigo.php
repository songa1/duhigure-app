<?php
    include '../php/connect.php';

    $fam = $_COOKIE['family'];

    $c = "SELECT * FROM family WHERE fam_name='$fam'";

    $results = $conn->query($c);
    if ($results->num_rows > 0) {
        while($row = $results->fetch_assoc()) {
            setcookie('famid', $row['fam_id'] ? $row['fam_id'] : "No Id found", time() + (86400 * 30), "/");
        }
    }

    $famid = $_COOKIE['famid'];
    $userid = $_COOKIE['userid'];
    $username = $_COOKIE['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Members</title>
    
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-bg">
    <div class="flex flex-col items-center gap-1 h-1/10 py-0 px-4 h-screen">
        <section class="flex items-center justify-between w-full p-4 shadow h-30">
            <h2 class="m-0 font-bold text-2xl text-primary">Duhigure</h2>
            <div class="flex gap-2">
                <button class="bg-primary text-white px-4 py-1 rounded">Notifications</button>
                <a href="#umuhigo-mushya" class="bg-secondary text-white px-4 py-1 rounded">Umuhigo mushya</a>
            </div>
        </section>
        <section class="flex h-full w-full pt-2">
            <div class="h-full bg-white w-1/6 shadow-lg rounded">
                <div class="flex itemscenter justify-center p-2 gap-2 bg-primary text-white">
                    <img src="../assets/img/user.jpg" class="w-12 h-1/2 bg-primary rounded-full" alt="Cishahayo Songa Achille">
                    <div class="metadata">
                        <h3 class="font-bold text-2xl"><?php echo $username ?></h3>
                        <p class="text-sm"><?php echo $fam ?></p>
                    </div>
                </div>
                <div class="flex flex-col p-4">
                    <a href="./incamake.php" class="px-0 py-2 font-bold text-primary">Incamake</a>
                    <a href="./abanyamuryango.php" class="px-0 py-2 font-bold text-primary">Abanyamuryango</a>
                    <a href="./imihigo.php" class="px-0 py-2 font-bold text-secondary">Imihigo</a>
                    <a href="#" class="px-0 py-2 font-bold text-primary">Imiterere</a>
                    <a class="bg-secondary text-white px-4 py-1 rounded" href="../index.php#kwinjira">Gusohoka</a>
                </div>
            </div>
            <div class="py-0 px-4 w-5/6">

                <!-- Title -->
                <div class="flex items-center justify-between px-auto py-4">
                    <h2 class="font-bold text-primary text-2xl">Imihigo</h2>
                    <input type="text" placeholder="Search..." class="px-2 py-1 border-0 border-b-2 border-b-primary bg-transparent outline-0 text-primary">
                </div>
                
                <!-- We render all members here -->
                <div class="w-full items-center flex flex-col gap-4 h-full scroll px-4 py-auto">
                    
                    <!-- We render one member here -->
                    <?php

                        $d = "SELECT * FROM imihigo WHERE family='$famid'";
                        $resultsu = $conn->query($d);
                        if ($resultsu->num_rows > 0) {
                            while($row = $resultsu->fetch_assoc()) {
                                ?>
                                    <div class="flex items-center p-2 shadow-inner rounded gap-2 w-1/2 hover:shadow">
                                        <div class="mdata">
                                            <a href="./umuhigo.php?id=<?php echo $row['id'] ?>" class="font-bold"><?php echo $row['title']; ?></a>
                                            <p class="text-xs">Created on <?php echo $row['created_at']; ?></p>
                                            <div class="actions" style="display: flex;align-items: center;">
                                                <a class="text-xs bg-primary text-white rounded-sm px-2"><?php echo $row['progress'] ?></a>
                                                <a style="font-size: xx-small; color: red; padding: 5px; cursor: pointer;" href="./siba-umuhigo.php?id=<?php echo $row['id']; ?>">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }else {
                            echo "<h1 class='font-bold'>Nta mihigo, shyiramo imihigo</h1>";
                        }
                    ?>
                    
                    

                </div>
            </div>
        </section>
    </div>

    <div class="modal" id="umuhigo-mushya">
        <form class="modal-box flex items-center flex-col gap-4" method="POST">
            <h3 class="font-bold text-lg">Ongera Umuhigo mushya!</h3>
            <input type="text" name="title" placeholder="Izina ry'umuhigo" class="input input-bordered w-full" required/>
            <textarea name="desc" class="input input-bordered w-full" placeholder="Sobanura umuhigo wawe"></textarea>
            <select class="select select-bordered w-full" name="progress">
                <option value="Urakorwaho">Urakorwaho</option>
                <option value="Wagezweho">Wagezweho</option>
            </select>
            <select class="select select-bordered w-full" name="assigned">
                <?php
                    $a = "SELECT * FROM members WHERE member_family='$famid'";
                    $result = $conn->query($a);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()) {
                ?>
                            <option value="<?php $row['member_id']; ?>"><?php echo $row['member_name']; ?></option>
                <?php
                        }
                    }
                    
                ?>
            </select>
            <div class="modal-action">
                <a href="#" class="px-4 py-2 bg-secondary rounded hover:bg-primary text-white">Funga</a>
                <input type="submit" name="addumu" id="addumu" class="px-4 py-2 bg-primary rounded hover:bg-secondary text-white" value="Emeza"/>
            </div>
        </form>
        <?php
            if(isset($_POST['addumu'])){
                $title = $_POST['title'];
                $desc = $_POST['desc'];
                $progress = $_POST['progress'];
                $mem = $_POST['assigned'];
                $today = date('Y-m-d H:i:s');

               
                $y = "INSERT INTO imihigo (`title`, `description`,`progress`,`member_assigned`,`family`, `created_at`) VALUES ('$title','$desc','$progress','$mem', '$famid','$today')";
                
                if($conn->query($y) === TRUE){  
                    echo "<script>alert('Umuhigo wongeweho neza!')</script>"; 
                    echo "<script>window.location.href = './imihigo.php'</script>";
                } else {
                    echo "<script>alert('Kongeraho umuhigo byanze! Mwongere mugerageze!');</script>";
                    echo $conn->error;
                }
               
            }

            $conn->close();

        ?>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../js/tailwind.js"></script>
</body>
</html>