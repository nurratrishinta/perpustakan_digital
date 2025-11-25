<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background-color: rgb(64, 130, 184);
        }

        .header {
            background-color: #cceeff;
            padding: 20px;
            text-align: left;
            font-size: 28px;
            color: #333;
            font-weight: bold;
        }

        .gallery {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 30px;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            border: 5px solid white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            width: 250px;
            text-align: center;
            border-radius: 8px;
        }

        .card img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 5px;
        }

        .card-title {
            margin-top: 10px;
            font-weight: bold;
            color: #333;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <div id="buku" class="header">List Buku</div>

    <div class="gallery">
        <div class="card">
            <img src="templates-user/images/dora.jpg" alt="Buku Dora">
            <div class="card-title">Buku Doraemon</div>
        </div>
        <div class="card">
            <img src="templates-user/images/lisa.jpg" alt="Buku Lisa">
            <div class="card-title">Buku Lisa Jackson</div>
        </div>
        <div class="card">
            <img src="templates-user/images/laskr.jpg" alt="Buku Laskar">
            <div class="card-title">Buku Laskar Pelangi</div>
        </div>
    </div>

</body>

</html>