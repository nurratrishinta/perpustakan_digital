<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>CRUD - Galeri</title>
</head>

<body>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-4">
        <h4>Form Tambah Galeri</h4>
        <form action="aksi/tambah.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <lebel for="judulinput" class="form-label">Judul</label>
              <input type="text" class="form-control" name="judul" id="judulinput"
                placeholder="Masukan Judul....">
          </div>

          <div class="mb-3">
            <lebel for="deskripsiinput" class="form-label">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsiinput" class="form-control"
                placeholder="Masukan Dekrepsi..." rows="3"></textarea>
          </div>

          <div class="mb-3">
            <lebel for="gambarinput" class="form-label">Gambar</label>
              <input type="file" class="form-control" name="gambar" id="gambarinput"
                placeholder="Masukan Gambar....">
          </div>

          <button class="btn btn-primary" type=submit>Tambah</button>
        </form>
      </div>

      <div class="col-md-8">
        <h4>Data Galeri</h4>
        <table class="table table-bordered">
          <tr>
            <th>NO</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
          <?php
          //memangil file koneksi
          include  'koneksi.php';

          //query untk menampilkan data
          $query = "SELECT * FROM galeri";

          // memyambungkan query ke database
          $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

          $no = 1;
          while ($item = mysqli_fetch_object($result)) :
          ?>
            <tr>
              <td><?= $no ?></td>
              <td>
                <img src="./images/<?= $item->gambar ?>" width="200" height="100" alt="foto">
              </td>
              <td><?= $item->judul ?></td>
              <td><?= $item->deskripsi ?></td>
              <td>
                <a href="./form_ubah.php?id=<?= $item->id ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="./aksi/hapus.php?id=<?= $item->id ?>" class="btn btn-sm btn-danger">Hapus</a>
              </td>
            </tr>
          <?php
            $no++;
          endwhile;
          ?>
        </table>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>