<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php 
    
    include_once "./services/koneksi.php";
    $data_gambar = $db->query("SELECT * FROM card_gambar");

    ?>
    <nav>
    <h1 style="display: flex; justify-content:center;">GALERI KENANGAN</h1>
    </nav>
    <a href="form_upload.php">Tambah gambar</a>
    <?php foreach ($data_gambar as $item): ?>
        <div class="card" style="width: 18rem;">
  <img src="img/<?= $item['gambar'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text"><?= $item['deskripsi'] ?></p>
  </div>
  <div class="card-body">
    <a href="form_update.php?id=<?php echo $item['id'] ?>" class="card-link">Update</a>
    <a href="handler_galeri.php?delete_id=<?php echo $item['id'] ?>" class="card-link">Delete</a>
  </div>
</div>
<br>
    <?php endforeach; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>