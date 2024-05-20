<?php 
include_once "./services/koneksi.php";

if(isset($_POST['upload'])){
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $desk = $_POST['deskripsi'];

    $insert = $db->query("INSERT INTO card_gambar (gambar,deskripsi) VALUES ('$gambar','$desk')");

    if($insert) {
        header('Location:index.php');
    }else {
        echo "data gagal dimasukan";
    }
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if($error === 4){
       
        echo "<script>
        alert('isi foto terlebih dahulu')
        </script>";
        return false;
    }

    // cek apakah yang di upload gambar?
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
       
        echo "<script>
        alert('yang anda upload bukan gambar')
        </script>";
        return false;
    }

    //cek jika size gambar terlalu besar
    if($ukuranFile > 1000000){
        echo "<script>
        alert('ukuran gambar terlalu besar')
        </script>";
        return false;
    }

    // lolos pengecekan
    // generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName,'img/' . $namaFileBaru);
    return $namaFileBaru;

}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $gambar = $_POST['gambar'];
    // $gambarLama = $_POST['gambarLama'];
    $desk = $_POST['deskripsi'];

    // cek user ubah gambar atau tidak
    // if($_FILES['gambar']['error']===4){
    //     $gambar = $gambarLama;
    // } else {
    //     $gambar = upload();
    // }

    $insert = $db->query(
        "UPDATE card_gambar set gambar = '$gambar', deskripsi = '$desk' WHERE id = $id"
    );

    if($insert) {
        header('Location:index.php');
    }else {
        echo "data gagal dimasukan";
    }
}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $delete = $db->query("DELETE FROM card_gambar WHERE id = $id");
    
    if($delete){
        header('Location:index.php');
    }else {
        echo "data gagal di hapus";
    }
}