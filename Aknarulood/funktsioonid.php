<?php
//tabeli Rulood tellimine lisamine
function lisaTellimus($mustrinr){
    global $yhendus;
    $paring=$yhendus->prepare("
INSERT INTO rulood(mustrinr) VALUES(?)");
    $paring->bind_param("i", $mustrinr);
    $paring->execute();
}
// rippLoend tabelist maakonnad
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