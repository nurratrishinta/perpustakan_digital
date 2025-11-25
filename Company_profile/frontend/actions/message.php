<?php
require_once __DIR__ . '/../../config/connection.php';

// Simpan data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = mysqli_real_escape_string($connect, $_POST['name']);
    $email   = mysqli_real_escape_string($connect, $_POST['email']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $message = mysqli_real_escape_string($connect, $_POST['message']);


    $insert = "INSERT INTO message (name, email, phone, message ) 
               VALUES ('$name', '$email', '$phone', '$message')";
    mysqli_query($connect, $insert);

    // ambil halaman sebelumnya
    $redirect = $_SERVER['HTTP_REFERER'] ?? 'index.php';

    echo "<script>
        alert('Pesan berhasil dikirim');
        window.location.href='$redirect';
    </script>";
}
?>


<div class="row text-center mb-4">
    <div class="col-12">
        <h1>PESAN</h1>
    </div>
</div>

<section id="message" class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label for="name">Nama anda</label>
                        <input type="text" id="name" class="form-control" name="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Telepon</label>
                        <input type="phone" id="phone" class="form-control" name="phone" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="message">Masukan pesan</label>
                        <textarea name="message" id="message" class="form-control" cols="30" rows="6" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Kirim pesan" class="btn btn-primary w-30">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>