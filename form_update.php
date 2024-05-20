<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    include_once './services/koneksi.php';
    $id = $_GET['id'];
    $item = $db->query("SELECT * FROM card_gambar WHERE id = $id ")->fetch_assoc();
    
    ?>
    <form action="handler_galeri.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="update" value="1">
        <!-- <input type="hidden" name="gambarLama" value="<?= $item['gambar']; ?>"> -->
        <input type="hiden" name="id" value="1" style="display: none;">

        <div>
            <label for="">masukan foto:</label>
            <br>
            <img src="img/<?= $item['gambar']; ?>" alt="">
            <br>
            <input type="file" name="gambar" >
        </div>
        <br>
        <div>
            <label for="">deskripsi</label>
            <input type="text" name="deskripsi"  value="<?php echo $item['deskripsi']; ?>"> 
        </div>
        <br>
        <button type="submit">update</button>
    </form>
</body>
</html>