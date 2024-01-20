<?php
// võtame ühendus serveriga skript
require_once("conf.php");
require_once("funktsioonid.php");
session_start();
//tellimine lisamine
if(isset($_REQUEST["tellimine_lisamine"])){
    //ei luba tühja väli ja tühiku sisestamine
    if(!empty(trim($_REQUEST["tellimus_id"]))){
        lisaTellimus($_REQUEST["tellimus_id"]);
    }
    header("Location: tellimine.php");
    exit();
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
<h1>Tellimine</h1>
<button onclick="naitaTellimusteLisamiseVorm()" id="F_lisaI">Lisa tellimus</button>
<form id="TellimusteLisamineVorm" method="post">
    <label for="tellimus_id">Vali ruloo:</label>
    <?php echo selectLoend("SELECT id, mustrinr FROM rulood", "tellimus_id"); ?>
    <input type="submit" value="Lisa tellimus" name="tellimine_lisamine" id="lisatellimine">
    <input type="button" value="Tühista" onclick="window.location.href='index.php'" id="cancel">
</form>

</body>
</html>