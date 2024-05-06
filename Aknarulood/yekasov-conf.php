<?php
//AB kasutaja, serverrinimi, salasõna, AB nimi -> ühendame seda andtud väärtusega, lisame tähte koodering
$kasutaja = 'martin';
$serverinimi = 'localhost';
$parool = 'martin';
$andmebaas = 'martinbd';
$yhendus = new mysqli($serverinimi,$kasutaja,$parool,$andmebaas);
$yhendus -> set_charset('UTF8');
?>