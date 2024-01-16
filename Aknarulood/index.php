<?php
// võtame ühendus serveriga skript
require_once("conf.php");
//tellimine lisamine
if(isset($_REQUEST["tellimine_lisamine"])){
    //ei luba tühja väli ja tühiku sisestamine
    if(!empty(trim($_REQUEST["tellimus_id"]))){
        lisaTellimus($_REQUEST["tellimus_id"]);
    }
    header("Location: index.php");
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
</head>
<body>
<h1>Tellimine</h1>
<button onclick="naitaTellimusteLisamiseVorm()" id="F_lisaI">Lisa tellimus</button>
<form id="TellimusteLisamineVorm">
    <?php echo selectLoend("select id, mustrinr from rulood","tellimus_id"); ?>
    <input type="submit" value="Lisa tellimine" name="tellimine_lisamine" id="lisatellimine">
    <input type="button" value="Cancel" onclick="window.location.href='index.php'" id="cancel">
</form>
</body>
</html>