<?php
require_once __DIR__ . '/../../config/connection.php';

// Query ambil data mitra/kerjasama
$qcooperation = "SELECT * FROM cooperations";
$resultcooperation = mysqli_query($connect, $qcooperation) or die(mysqli_error($connect));
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra Kami</title>
    <!-- Font Awesome buat ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        section#cooperation {
            background: linear-gradient(135deg, rgb(10, 70, 134), #00C6FF);
            padding: 60px 20px;
            color: white;
        }

        .title-wrap h3 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .slider {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .slide {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            width: 180px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .slide:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(17, 56, 139, 0.25);
        }

        .slide .icon {
            font-size: 28px;
            color: rgb(8, 63, 122);
            margin-bottom: 10px;
        }

        .slide img {
            height: 80px;
            max-width: 120px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .slide p {
            font-size: 14px;
            margin: 0;
            color: #333;
            font-weight: bold;
        }

        .slide a {
            display: inline-block;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <section id="cooperation" class="py-5">
        <div class="container p-0">
            <div class="text-center title-wrap">
                <h3><i class="fa-solid fa-handshake"></i>  DAFTAR KERJASAMA</h3>
            </div>
            <div class="slider">
                <?php
                if ($resultcooperation && $resultcooperation->num_rows > 0) {
                    while ($item = $resultcooperation->fetch_object()) {
                        echo '<div class="slide">';
                        if (!empty($item->link)) {
                            echo '<a href="' . htmlspecialchars($item->link) . '" target="_blank">';
                            echo '<img src="../storages/cooperations/' . htmlspecialchars($item->image) . '" alt="' . htmlspecialchars($item->name ?? "Mitra") . '">';
                            echo '</a>';
                        } else {
                            echo '<img src="../storages/cooperations/' . htmlspecialchars($item->image) . '" alt="' . htmlspecialchars($item->name ?? "Mitra") . '">';
                        }
                        echo '<p>' . htmlspecialchars($item->name ?? "") . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>Tidak ada data kerjasama.</p>";
                }
                ?>
            </div>
        </div>
    </section>

</body>

</html>