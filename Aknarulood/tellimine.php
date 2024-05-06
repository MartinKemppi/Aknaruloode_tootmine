<?php
// võtame ühendus serveriga skript
require_once("yekasov-conf.php");
session_start();
function lisaTellimus($tellimus_nimi,$kasutaja){
    global $yhendus;
    $paring=$yhendus->prepare("INSERT INTO tellimus(tellimus_nimi, kasutaja) VALUES(?,?)");
    $paring->bind_param("is", $tellimus_nimi,$kasutaja);
    $paring->execute();
}
// rippLoend tabelist rulood
function selectLoend($paring, $nimi){
    global $yhendus;
    $paring=$yhendus->prepare($paring);
    $paring->bind_result($id, $andmed);
    $paring->execute();
    $tulemus="<select name='$nimi'>";
    while($paring->fetch()){
        $tulemus .="<option value='$id'>$andmed</option>";
    }
    $tulemus .="</select>";
    return $tulemus;
}

//tellimine lisamine
if(isset($_REQUEST["tellimine_lisamine"])){
    //ei luba tühja väli ja tühiku sisestamine
    if(!empty(trim($_REQUEST["tellimus_id"]))){
        $kasutaja = $_SESSION['kasutaja'];
        lisaTellimus($_REQUEST["tellimus_id"], $kasutaja);

        // Redirect to 'naitatellimine.php' instead of the same script
        header("Location: naitatellimine.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aknarulood</title>
    <link rel="stylesheet" type="text/css" href="stiilid/stiil.css">
    <script src="skript/skript.js"></script>
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
<h3>Tellimine</h3>
<button onclick="naitaTellimusteLisamiseVorm()" id="F_lisaI">Lisa tellimus</button>
<form id="TellimusteLisamineVorm" method="post">
    <label for="tellimus_id">Vali ruloo:</label>
    <br>
    <?php echo selectLoend("SELECT id, mustrinr FROM rulood", "tellimus_id"); ?>
    <input type="submit" value="Lisa tellimus" name="tellimine_lisamine" id="lisatellimine" style="background-color: green">
    <input type="button" value="Tühista" onclick="window.location.href='tellimine.php'" id="cancel" style="background-color: red">
</form>
</body>
</html>