<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anket</title>
</head>
<body>
    <h2>Hangi levuk favoriniz?</h2>
    <form action="oy_ver.php" method="POST">
        <input type="radio" name="levuk" value="Yoda"> Yoda<br>
        <input type="radio" name="levuk" value="Levi"> Levi<br>
        <input type="radio" name="levuk" value="Michelin lastik adam"> Michelin lastik adam<br>
        <input type="submit" value="Oy Ver">
    </form>

    <h2>Oy Dağılımı:</h2>
    <?php
        include("baglanti.php");

        session_start();

        // Oyların toplam sayısını al
        $oy_sorgu = "SELECT SUM(oy_sayisi) AS toplam_oy FROM anket";
        $oy_sonuc = $conn->query($oy_sorgu);
        $toplam_oy = $oy_sonuc->fetch_assoc()['toplam_oy'];

        // Oyların ayrıntılarını al
        $ayrinti_sorgu = "SELECT levuk, oy_sayisi FROM anket";
        $ayrinti_sonuc = $conn->query($ayrinti_sorgu);

        if ($ayrinti_sonuc->num_rows > 0) {
            while ($row = $ayrinti_sonuc->fetch_assoc()) {
                $levuk = $row['levuk'];
                $oy_sayisi = $row['oy_sayisi'];
                $yuzde = ($oy_sayisi / $toplam_oy) * 100;
                echo "$levuk: $oy_sayisi oy (%$yuzde)<br>";
            }
        }

        $conn->close();
    ?>
</body>
</html>
