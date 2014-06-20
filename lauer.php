<?php
if (isset($argv[1])) {
    $quellenkodierung = file_get_contents($argv[1]);
    preg_match('/(thread-)(.*?)(\.)/i',  $argv[1], $fadennummer);
    preg_match('/(net\/)(.*?)(\/)/i',  $argv[1], $kanal);
    mkdir($kanal[2]."-".$fadennummer[2]);
    chdir($kanal[2]."-".$fadennummer[2]);
       preg_match_all ('/(files\/)(.*?)(\')/i',  $quellenkodierung, $datenfeldzwischenspeicher);
    echo "Werde Bernd ".count($datenfeldzwischenspeicher[2])." Bilder laden\n";
    for ($i=0;$i<count($datenfeldzwischenspeicher[2]);$i++) {
        file_put_contents($datenfeldzwischenspeicher[2][$i],file_get_contents("http://krautchan.net/files/".$datenfeldzwischenspeicher[2][$i]));
        echo "Lade: ".($i+1). " -> ".$datenfeldzwischenspeicher[2][$i]."\n";
    }
}
else {
    echo "Welchen Faden möchte Bernd denn?\n";
    echo "php lauer.php http://krautchan.net/b/thread-42230815.html\n";
}
//Bernd tut gut daran, dieses Script per Kommandozeile aufzurufen

// Alle Rechte vorbehalten, Urheberrecht, schöpferisches Gemeingut blablub liegen bei Bernd
// 2014 Bernd Lauert
?>
