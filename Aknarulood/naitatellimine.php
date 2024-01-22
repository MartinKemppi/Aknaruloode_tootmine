<?php
// võtame ühendus serveriga skript
require_once("conf.php");
require_once("funktsioonid.php");
session_start();
?>
<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="stiilid/stiil.css">
    <title>Tellimised</title>
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
<nav> <!--nav menüü-->
    <ul>
        <li>
            <a href="tellimine.php">Tellimine</a>
        </li>
        <li>
            <a href="naitatellimine.php">Näita minu tellimused</a>
        </li>
    </ul>
</nav>
<h2>Tellitud tooded</h2>
<div style="overflow-x: auto;">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Toode</th>
            <th>Seisukord</th>
        </tr>
        <?php
        global $yhendus;
        if (isset($_SESSION['kasutaja']) && $_SESSION['onAdmin'] == 0) {
            $kasutaja = $_SESSION['kasutaja'];
            $kask = $yhendus->prepare("SELECT tellimus.id, tellimus_nimi, rulood.mustrinr, tellimus.pakitud FROM tellimus INNER JOIN rulood ON tellimus.tellimus_nimi = rulood.id WHERE tellimus.kasutaja = ?");
            $kask->bind_param("s", $kasutaja);
            $kask->execute();
            $kask->bind_result($id, $tellimus_nimi, $mustrinr,$pakitud);
            while ($kask->fetch()) {
                echo "<tr>";
                $tellimus_nimi = htmlspecialchars($tellimus_nimi);
                echo "<td>" . $id . "</td>";
                echo "<td>" . $mustrinr . "</td>";
                echo "<td>" . ($pakitud == 1 ? 'Valmis kättesaadavaks' : 'Toode ei ole valmis') . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>
</body>
</html>