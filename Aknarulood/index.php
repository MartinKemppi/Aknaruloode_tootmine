<?php
// võtame ühendus serveriga skript
require_once("conf.php");
session_start();
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

        function avaModalReg() {
            document.getElementById("modal_reg").style.display = "flex";
        }

        function suleModalLog() {
            document.getElementById("modal_log").style.display = "none";
        }

        function suleModalReg() {
            document.getElementById("modal_reg").style.display = "none";
        }

        window.onclick = function (event) {
            var modalLog = document.getElementById("modal_log");
            if (event.target == modalLog) {
                suleModalLog();
            }

            var modalReg = document.getElementById("modal_reg");
            if (event.target == modalReg) {
                suleModalReg();
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
<div id="modal_reg">
    <div class="modal__window">
        <a class="modal__close" href="#">X</a>
        <?php
        require 'register.php';
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
<?php
if(isset($_SESSION['kasutaja'])){
    ?>
    <!--
    <div class="open">
        <a href="#modal_reg" onclick="avaModalReg()">Registreeri</a>
    </div>
    -->
    <?php
} else {
    ?>
    <div class="open">
        <a id="regimind" href="#modal_reg" onclick="avaModalReg()">Registreeri</a>
    </div>
    <?php
}
?>
<div id="reklaamtekst">
    Tellige meilt rulood oma nägevusega!
</div>
<div id="reklaamklienditele">
    Mõned kliendid juba tellisid endale rulood ja nad näevad suurepäraselt!
</div>
<section id="section2">
    <p>
        <img src="ruloo1.jpg" alt="ilus pilt" id="pilt1">
        <img src="ruloo2.jpg" alt="ilus pilt" id="pilt2">
        <img src="ruloo3.JPG" alt="ilus pilt" id="pilt3">
    </p>
</section>
</body>
</html>