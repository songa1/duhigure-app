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
                    <button class="bg-primary text-white px-4 py-1 rounded hover:bg-secondary">Injira</button>
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

    <div class="modal" id="umuryango-mushya">
        <form class="modal-box flex items-center flex-col gap-4">
            <h3 class="font-bold text-lg">Ongera Umuryango mushya!</h3>
            <input type="text" placeholder="Izina ry'umuryango" class="input input-bordered w-full" />
            <select class="select select-bordered w-full">
                <option disabled selected>Hitamo umurenge</option>
                <option>Han Solo</option>
                <option>Greedo</option>
            </select>
            <div class="modal-action">
            <a href="#" class="btn">Emeza!</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./js/tailwind.js"></script>
</body>
</html>