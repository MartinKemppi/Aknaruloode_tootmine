<?php
require ('conf2.php');
//tabeli Rulood tellimine lisamine
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
?>