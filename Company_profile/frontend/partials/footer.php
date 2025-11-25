<!-- Footer Social Icons Only -->
<footer style="background-color: #0d3b66; padding: 20px 0; text-align: center;">

    <?php
    $qSocial_media = "SELECT * FROM social_media LIMIT 4";
    $resultSocial_media = mysqli_query($connect, $qSocial_media) or die(mysqli_error($connect));
    ?>

    <div class="social-icons">
        <?php while ($item = $resultSocial_media->fetch_object()): ?>
            <a href="<?= $item->link_url ?>" target="_blank">
                <img src="../storages/social_media/<?= $item->icon; ?>"
                    alt="<?= $item->icon; ?>"
                    class="social-icon-img">
            </a>
        <?php endwhile; ?>
    </div>
    <div class="text-center mt-3 text-white">
        &copy;<script>
            document.write(new Date().getFullYear());
        </script>
        <a href="https://smkn1sanden.sch.id/index.php/routing/index" style="color:#fff;"> SMKN 1 SANDEN</a>
    </div>

</footer>


<!-- CSS -->
<style>
    .social-icons {
        text-align: center;
        margin-top: 10px;
    }

    .social-icon-img {
        width: 50px;
        height: 50px;
        object-fit: contain;
        /* biar rapi meskipun ukuran asli beda */
        border-radius: 50%;
        margin: 0 10px;
        transition: transform 0.3s, filter 0.3s;
    }

    .social-icon-img:hover {
        transform: scale(1.2);
        filter: brightness(1.3);
    }

    .social-icon-img {
        width: 60px;
        /* samain ukuran */
        height: 60px;
        /* biar bulat penuh */
        object-fit: cover;
        /* potong isi gambar supaya penuh */
        background: white;
        /* kasih background putih biar rapih */
        border-radius: 50%;
        /* bikin bulat */
        margin: 0 11px;
        padding: 8px;
        /* kasih jarak biar icon di tengah */
        transition: transform 0.3s, filter 0.3s;
    }

    .social-icon-img:hover {
        transform: scale(1.2);
        filter: brightness(1.3);
    }
</style>