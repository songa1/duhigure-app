<?php
    include './php/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUHIGURE MU MURYANGO</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div>
        <div class="h-screen bg-hero bg-no-repeat bg-cover">
            <section class="flex items-center justify-between w-full p-4 shadow h-30">
                <h2 class="m-0 font-bold text-2xl text-primary">AskPublic</h2>
                <div class="flex gap-2">
                    <a href="#kwinjira" class="bg-primary text-white px-4 py-1 rounded hover:bg-secondary">Injira</a>
                    <a href="#umuryango-mushya" class="bg-secondary text-white px-4 py-1 rounded hover:bg-primary">Ongera Umuryango</a>
                </div>
            </section>
            <section class="flex flex-col items-center justify-center h-5/6 max-w-screen-md m-auto gap-2">
                <h1 class="font-bold text-6xl text-center">DUHIGURE MU MURYANGO</h1>
                <p class="text-center text-sm font-bold">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas, blanditiis ad quos odit fugit facilis harum incidunt fugiat autem illo consectetur magni eos laboriosam voluptatibus quo? Laborum in reprehenderit praesentium voluptates, maiores earum sequi voluptatem perspiciatis, dignissimos quod alias veritatis?</p>
                <button class="bg-primary text-white px-4 py-2 rounded hover:bg-secondary">Tangira</button>
            </section>
        </div>
        
    </div>

    <div class="modal" id="kwinjira">
        <form class="modal-box flex items-center flex-col gap-4" method="POST">
            <h3 class="font-bold text-lg">Injira mu muryango!</h3>
            <input type="text" name="your_email" placeholder="Imeyili yawe" class="input input-bordered w-full" required/>
            <input type="password" name="your_pass" placeholder="Ijambobanga ryawe" class="input input-bordered w-full" required/>
            <div class="modal-action">
                <a href="#" class="px-4 py-2 bg-secondary rounded hover:bg-primary text-white">Funga</a>
                <input type="submit" name="login_btn" id="login_btn" class="px-4 py-2 bg-primary rounded hover:bg-secondary text-white" value="Injira"/>
            </div>
        </form>
    </div>

    <?php  

        if(isset($_POST['login_btn'])){
            $email_log = $_POST['your_email'];
            $password = $_POST['your_pass'];

            $email_log = stripcslashes($email_log);  
            $password = stripcslashes($password);  
            $email_log = mysqli_real_escape_string($conn, $email_log);  
            $password = mysqli_real_escape_string($conn, $password);  

            $sql = "SELECT * FROM members WHERE member_mail = '$email_log' AND member_pass = '$password'";
            $resulto = mysqli_query($conn, $sql);  
            $row = mysqli_fetch_array($resulto, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($resulto); 
            $fammid = $row['member_family'];
            
            if($count == 1){
                $f = "SELECT * FROM family WHERE fam_id='$fammid'";
                $resultu = mysqli_query($conn, $f);  
                $roww = mysqli_fetch_array($resultu, MYSQLI_ASSOC);
                setcookie('family', $roww['fam_name'], time() + (86400 * 30), "/");
                setcookie('username', $row['member_name'], time() + (86400 * 30), "/");
                setcookie('userid', $row['member_id'], time() + (86400 * 30), "/");
                setcookie('auth', 'True', time() + (86400 * 30), "/");
                echo "<script>alert('Successfully logged in, click OK to continue!')</script>";
                echo "<script>window.location.href = './dashboard/abanyamuryango.php';</script>";  
            }  
            else{  
                echo "<script> alert('Login failed. Invalid username or password.')</script>";  
            }

            $con->close();
        }
        
    ?>

    <div class="modal" id="umuryango-mushya">
        <form class="modal-box flex items-center flex-col gap-4" method="POST">
            <h3 class="font-bold text-lg">Ongera Umuryango mushya!</h3>
            <input type="text" name="fam_name" placeholder="Izina ry'umuryango" class="input input-bordered w-full" required/>
            <select class="select select-bordered w-full" name="fam_sector">
                <?php
                    $a = "SELECT * FROM sectors";
                    $result = $conn->query($a);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()) {
                ?>
                            <option value="<?php $row['sector_id']; ?>"><?php echo $row['sector_name']; ?></option>
                <?php
                        }
                    }
                    
                ?>
            </select>
            <div class="modal-action">
                <a href="#" class="px-4 py-2 bg-secondary rounded hover:bg-primary text-white">Funga</a>
                <input type="submit" name="addfam" id="addfam" class="px-4 py-2 bg-primary rounded hover:bg-secondary text-white" value="Emeza"/>
            </div>
        </form>
        <?php
            if(isset($_POST['addfam'])){
                $fam_name = $_POST['fam_name'];
                $fam_sector = $_POST['fam_sector'];
                $today = date('Y-m-d H:i:s');

                $b = "INSERT INTO family (`fam_name`, `fam_sector`, `created_at`) VALUES ('$fam_name','$fam_sector','$today')";
                
                if($conn->query($b) === TRUE){  
                    setcookie('family', $fam_name ? $fam_name : "No Id found", time() + (86400 * 30), "/");
                    echo "<script>alert('Umuryango wongeweho neza! Kanda OK wongeremo abanyamuryango, ubundi mutangire muhige.')</script>"; 
                    echo "<script>window.location.href = './dashboard/abanyamuryango.php'</script>";
                } else {
                    echo "<script>alert('Kongeraho umuryango byanze! Mwongere mugerageze!');</script>";
                }
            }

            $conn->close();

        ?>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./js/tailwind.js"></script>
</body>
</html>