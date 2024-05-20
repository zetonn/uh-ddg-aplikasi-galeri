<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="handler_galeri.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="upload" value="1">

        <div>
            <label for="">masukan foto:</label>
            <br>
            <br>
            <input type="file" name="gambar">
        </div>
        <br>
        <div>
            <label for="">deskripsi</label>
            <input type="text" name="deskripsi">
        </div>
        <br>
        <button type="submit">upload</button>
    </form>
</body>
</html>