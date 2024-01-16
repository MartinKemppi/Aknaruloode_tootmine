<?php
require ('conf.php');
//tabeli Rulood tellimine lisamine
function lisaTellimus($tellimus_nimi){
    global $yhendus;
    $paring=$yhendus->prepare("
INSERT INTO tellimus(tellimus_nimi) VALUES(?)");
    $paring->bind_param("i", $tellimus_nimi);
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
?>