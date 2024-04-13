<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $veritabaniserveradi = "localhost";
    $kullaniciadi = "root";
    $sifre = "";
    $veritabaniadi = "crud";

    $baglanti = mysqli_connect($veritabaniserveradi, $kullaniciadi, $sifre, $veritabaniadi);

    if (isset($_GET["confirm"])) {
        // Silme işlemi onaylandı, silme işlemini gerçekleştir
        $sql = "DELETE FROM crud WHERE id=$id";
        $baglanti->query($sql);
        header("Location: index.php");
        exit;
    } else {
        echo '<script>';
        echo 'if(confirm("Bu kaydı silmek istediğinize emin misiniz?")) {';
        echo '  window.location.href = "delete.php?id=' . $id . '&confirm=yes";'; // Silme işlemi onaylandı
        echo '} else {';
        echo '  window.location.href = "index.php";'; // İptal durumunda ana sayfaya yönlendir
        echo '}';
        echo '</script>';
    }
}
?>

</body>
</html>