<?php
// võtame ühendus serveriga skript
require_once("conf2.php");
session_start();

//andmete kustutamine tabelist
if(isset($_REQUEST["kustuta"])){
    global $yhendus;
    $paring = $yhendus->prepare("DELETE FROM tellimus WHERE id=?");
    $paring->bind_param("i", $_REQUEST["kustuta"]);
    $paring->execute();
    header("Location: $_SERVER[PHP_SELF]");
}
?>
<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="stiilid/stiil.css">
    <title>Admin leht</title>
    <script>
        function avaModalLog() {
            document.getElementById("modal_log").style.display = "flex";
        }

        function suleModalLog() {
            document.getElementById("modal_log").style.display = "none";
        }

        window.onclick = function (event) {
            var modalLog = document.getElementById("modal_log");
            if (event.target == modalLog) {
                suleModalLog();
            }
        }
    </script>
</head>
<body>
<header>
    <h1>Fiesta rulood</h1>
</header>
<div id="modal_log">
    <div class="modal__window">
        <a class="modal__close" href="#">X</a>
        <?php
        require 'login.php';
        ?>
    </div>
</div>
<?php
if(isset($_SESSION['kasutaja'])){
    ?>
    <a id="logivalja" href="logout.php">Logi välja</a>
    <?php
} else {
    ?>
    <div class="open">
        <a id="logisisse" href="#modal_log" onclick="avaModalLog()">Logi sisse</a>
    </div>
    <?php
}
?>
<h3>Admin haldus</h3>
<div style="overflow-x: auto;">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Mustrinr</th>
            <th>Riievalmis</th>
            <th>Puuvalmis</th>
            <th>Komplekteerimine</th>
            <th>Kustuta</th>
        </tr>
        <?php
        global $yhendus;
        if (isset($_SESSION['kasutaja']) && $_SESSION['onAdmin'] == 4) {
            $kask = $yhendus->prepare("SELECT tellimus.id, tellimus_nimi, rulood.mustrinr, tellimus.riievalmis, tellimus.puuvalmis, tellimus.pakitud FROM tellimus INNER JOIN rulood ON tellimus.tellimus_nimi = rulood.id");
            $kask->bind_result($id, $tellimus_nimi, $ruloodmustrinr, $ruloodriievalmis, $tellimuspuuvalmis, $tellimuspakitud);
            $kask->execute();
            while ($kask->fetch()) {
                echo "<tr>";
                if($ruloodriievalmis == 1 && $tellimuspuuvalmis == 1){
                    $tellimuspakitud = 1;
                }
                else{
                    $tellimuspakitud = 0;
                }
                $tellimus_nimi = htmlspecialchars($tellimus_nimi);
                echo "<td>" . $id . "</td>";
                echo "<td>" . $ruloodmustrinr . "</td>";
                echo "<td>" . $ruloodriievalmis . "</td>";
                echo "<td>" . $tellimuspuuvalmis . "</td>";
                echo "<td>" . $tellimuspakitud . "</td>";
                echo "<td><a href='?kustuta=$id'>Kustuta</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>
</body>
</html>