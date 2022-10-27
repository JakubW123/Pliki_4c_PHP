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
        Drużyna 1:<select name="druzyna1" id="">
            <?php
                $polaczenie = mysqli_connect("localhost","root","","egzamin");
                $zapytanie = "SELECT `zespol` FROM `liga`";
                $wynik = mysqli_query($polaczenie,$zapytanie);
                while($rekord=mysqli_fetch_array($wynik)){
                    echo "<option>$rekord[0]</option>";
                }
                mysqli_close($polaczenie);
            ?>
        </select>
        Drużyna 2:<select name="druzyna2" id="">
            <?php
                $polaczenie = mysqli_connect("localhost","root","","egzamin");
                $zapytanie = "SELECT `zespol` FROM `liga`";
                $wynik = mysqli_query($polaczenie,$zapytanie);
                while($rekord=mysqli_fetch_array($wynik)){
                    echo "<option>$rekord[0]</option>";
                }
                mysqli_close($polaczenie1);
            ?>
        </select>
        <br>
            <input type="number" name="wynik1" value="0" id="">
            <input type="number" name="wynik2" value="0" id="">
            <input type="submit" value="Dodaj do bazy">
    </form>
            <?php
                if(isset($_POST['druzyna1'])){
                    $d1 = $_POST['druzyna1'];
                    $d2 = $_POST['druzyna2'];
                    $w1 = $_POST['wynik1'];
                    $w2 = $_POST['wynik2'];
                    if($d1 == $d2){
                        echo "Wybierz poprawnie zespół";
                    }
                    else{
                        echo "wstawiamy";
                        if($w1 == $w2){
                            $p1 = 1;
                            $p2 = 1;
                        }
                        else if($w1 > $w2){
                            $p1 = 3;
                            $p2 = 0;
                        }
                        else{
                            $p1 = 0;
                            $p2 = 3;
                        }
                   
                    $polaczenie = mysqli_connect("localhost","root","","egzamin");
                    $zapytanie = "UPDATE `liga` SET `punkty` = punkty + $p1 WHERE `liga`.zespol = '$d1'";
                    mysqli_query($polaczenie,$zapytanie);
                    $zapytanie = "UPDATE `liga` SET `punkty` = punkty + $p2 WHERE `liga`.zespol = '$d2'";
                    mysqli_query($polaczenie,$zapytanie);
                    mysqli_close($polaczenie);
                }
                }
            ?>


    <h3> Tabela ligowa </h3>
    <table>
        <tr>
            <th>Lp</th>
            <th>Nazwa zespołu</th>
            <th>Liczba punktów</th>
        </tr>
        <?php
            $polaczenie = mysqli_connect("localhost","root","","egzamin");
            $zapytanie="SELECT `zespol`, `punkty` FROM `liga` ORDER BY `punkty` DESC";
            $i = 1;
            $wynik=mysqli_query($polaczenie,$zapytanie);
            while($rekord=mysqli_fetch_array($wynik)){
                echo "<tr>
                <td>$i</td>
                <td>$rekord[0]</td>
                <td>$rekord[1]</td>
                </tr>";
                $i++;
            }
            mysqli_close($polaczenie);

        ?>
    </table>
</body>
</html>