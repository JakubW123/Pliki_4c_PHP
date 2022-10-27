<?php
    $nrzespolu = $_POST['nrzespolu'];
    $nrdyspo = $_POST['nrdyspo'];
    $adres = $_POST['adres'];
    $polaczenie = mysqli_connect("localhost","root","","ratownictwo");
    $zapytanie = "INSERT INTO `zgloszenia` (`id`, `ratownicy_id`, `dyspozytorzy_id`, `adres`, `pilne`, `czas_zgloszenia`) VALUES (NULL, '$nrzespolu', '$nrdyspo', '$adres', '0', CURRENT_TIME())";
    mysqli_query($polaczenie,$zapytanie);
    mysqli_close($polaczenie);
?>
