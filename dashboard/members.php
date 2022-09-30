<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Analytics</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-bg">
    <div class="flex flex-col items-center gap-1 h-1/10 py-0 px-4 h-screen">
        <section class="flex items-center justify-between w-full p-4 shadow h-30">
            <h2 class="m-0 font-bold text-2xl text-primary">AskPublic</h2>
            <div class="flex gap-2">
                <button class="bg-primary text-white px-4 py-1 rounded">Notifications</button>
                <button class="bg-secondary text-white px-4 py-1 rounded">Add New Member</button>
            </div>
        </section>
        <section class="flex h-full w-full pt-2">
            <div class="h-full bg-white w-1/6 shadow-lg rounded">
                <div class="flex itemscenter justify-center p-2 gap-2 bg-primary text-white">
                    <img src="../assets/img/user.jpg" class="w-12 h-1/2 bg-primary rounded-full" alt="Cishahayo Songa Achille">
                    <div class="metadata">
                        <h3 class="font-bold tet-2xl"><?php echo "Username" ?></h3>
                        <p>Administrator</p>
                    </div>
                </div>
                <div class="flex flex-col p-4">
                    <a href="#" class="px-0 py-2 font-bold text-primary">Report</a>
                    <a href="./listing.php" class="px-0 py-2 font-bold text-secondary">Abanyamuryango</a>
                    <a href="#" class="px-0 py-2 font-bold text-primary">Imihigo</a>
                    <a href="#" class="px-0 py-2 font-bold text-primary">Imiterere</a>
                    <button onclick="logout()" class="bg-secondary text-white px-4 py-1 rounded">Gusohoka</button>
                </div>
            </div>
            <div class="py-0 px-4 w-5/6">
                <div class="flex items-center justify-between px-auto py-4">
                    <h2 class="font-bold text-primary text-2xl">Abanyamuryango</h2>
                    <input type="text" placeholder="Search..." class="px-2 py-1 border-0 border-b-2 border-b-primary bg-transparent outline-0 text-primary">
                </div>
                
                <div class="w-full items-center flex flex-col gap-4 h-full scroll px-4 py-auto">
                    
                    <div class="flex items-center p-2 shadow-inner rounded gap-2 w-1/2 hover:shadow">
                        <img src="../assets/img/user.jpg" alt="User" class="w-20 h-20 rounded-full">
                        <div class="mdata">
                            <a href="../i.php?id=<?php echo $row['survey_slug'] ?>" class="font-bold"><?php echo "gggg"; ?></a>
                            <p class="text-xs">Created on <?php echo "12 JJ100"; ?></p>
                            <div class="actions" style="display: flex;align-items: center;">
                                <a style="font-size: xx-small; color: green; padding: 5px;" href="answers.php?question=<?php echo "jdjjd"; ?>">Answers</a>
                                    <a style="font-size: xx-small; color: red; padding: 5px; cursor: pointer;" href="../php/delete.php?id=<?php echo "eeee"; ?>">Delete</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </div>
    <script src="../js/tailwind.js"></script>
</body>
</html>