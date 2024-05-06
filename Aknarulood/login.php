<?php
require_once("yekasov-conf.php");
global $yhendus;

//kontrollime kas väljad  login vormis on täidetud
if (!empty($_POST['login']) && !empty($_POST['pass'])) {
    //eemaldame kasutaja sisestusest kahtlase pahna
    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['pass']));
    //SIIA UUS KONTROLL
    $cool="superpaev";
    $krypt = crypt($pass, $cool);
    //kontrollime kas andmebaasis on selline kasutaja ja parool
    $kask=$yhendus-> prepare("SELECT kasutaja, onAdmin FROM kasutajad WHERE kasutaja=? AND parool=?");
    $kask->bind_param("ss", $login, $krypt);
    $kask->bind_result($kasutaja,$onAdmin);
    $kask->execute();
    //kui on, siis loome sessiooni ja suuname
    if ($kask->fetch())
    {
        $_SESSION['tuvastamine'] = 'misiganes';
        $_SESSION['kasutaja'] = $login;
        $_SESSION['onAdmin'] = $onAdmin;
        if ($onAdmin == 0) {
            echo '<script>window.location.href = "tellimine.php";</script>';
        }
        else if ($onAdmin == 1) {
            echo '<script>window.location.href = "riideosakond.php";</script>';
        }
        else if ($onAdmin == 2) {
            echo '<script>window.location.href = "puuosakond.php";</script>';
        }
        else if ($onAdmin == 3) {
            echo '<script>window.location.href = "komplekteerijad.php";</script>';
        }
        else if ($onAdmin == 4) {
            echo '<script>window.location.href = "adminLeht.php";</script>';
        }
        $yhendus->close();
        exit();
    }
    else {
        echo "kasutaja $login või parool $krypt on vale";
        $yhendus->close();
    }
}
?>
<h1>Logi sisse</h1>
<form action="" method="post">
    Kasutaja: <input type="text" name="login"><br>
    Salasõna: <input type="password" name="pass"><br>
    <input type="submit" value="Logi sisse">
</form>