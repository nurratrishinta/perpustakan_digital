<?php
// Query ambil data contact
$qContact = "SELECT * FROM contacts";
$resultContact = mysqli_query($connect, $qContact) or die(mysqli_error($connect));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Info</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .info-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .info-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .info-box i {
            font-size: 35px;
            color: #0dcaf0;
            margin-bottom: 15px;
        }

        .info-title {
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 18px;
        }

        .info-text {
            color: #555;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="row g-4 justify-content-center">
            <?php while ($item = $resultContact->fetch_object()) { ?>
                <div class="col-md-4 col-sm-6 d-flex">
                    <div class="info-box w-100 h-100">
                        <!-- Kalau img berisi FontAwesome icon -->
                        <?php if (!empty($item->img) && str_contains($item->img, "fa-")) { ?>
                            <i class="<?php echo $item->img; ?>"></i>
                        <?php } else { ?>
                            <img src="../storages/contact/<?php echo $item->img; ?>" alt="icon" width="150">
                        <?php } ?>

                        <div class="info-title">
                            <?php echo strtoupper($item->contact); ?>
                        </div>

                        <div class="info-text">
                            <a href="<?php echo $item->link_url; ?>" target="_blank"
                                style="color:#007bff; text-decoration:none;">
                                <?php echo $item->link_url; ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>