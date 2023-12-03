<?php
    include("baglanti.php");

    session_start();

    if (isset($_POST['levuk'])) {
        $levuk = $_POST['levuk'];

        if (!isset($_SESSION['oy_kullandi'])) {
            $_SESSION['oy_kullandi'] = true;

            $oy_artir_sorgu = "UPDATE anket SET oy_sayisi = oy_sayisi + 1 WHERE levuk = '$levuk'";
            $conn->query($oy_artir_sorgu);
        }

        $conn->close();
    }

    echo "<script>alert('Seçtiğiniz levuk: $levuk ');window.location.href = 'index.php';</script>";

?>
