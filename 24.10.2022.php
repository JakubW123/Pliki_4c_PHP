<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        Styl życia:<br>
        <input type="radio" name="stylzycia" id="" value="1">1<br>
        <input type="radio" name="stylzycia" id="" value="2">2<br>
        <input type="submit" value="zatwierdź">
    </form>
<h1> Ryby: </h1>
    <table>
        <tr>
            <th>Nazwa</th>
            <th>Występowanie</th>
            <th>Styl życia</th>
        </tr>
    
    <?php
        $polacznie = mysqli_connect("localhost","root","","baza4c");
        $zapytanie = "SELECT `nazwa`, `wystepowanie`, `styl_zycia` FROM `ryby`";
        if(isset($_POST['stylzycia'])){
            $stylzycia = $_POST['stylzycia'];
            $zapytanie = "SELECT `nazwa`, `wystepowanie`, `styl_zycia` FROM `ryby` WHERE `styl_zycia` = $stylzycia";
        }
        $wynik = mysqli_query($polacznie,$zapytanie);
        while($rekord = mysqli_fetch_array($wynik)){
            echo "<tr><td>$rekord[0]</td><td>$rekord[1]</td><td>$rekord[2]</td></tr>";
        }
    ?>
    </table>
</body>
</html>