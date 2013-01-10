<?php
header('Content-type: text/htm
	?>l;charset=utf-8');
$database               = "xxx";
$server                 = "xxx";
$user_nameDB            = "xxx";
$passwordDB             = "xxx";
$strNoConnection      	= "Attenzione: Errore di Connessione. ";
$strNoDatabase        	= "Attenzione: Tabella e/o Data Base non trovato. ";
$strNoAccess         	= "Accesso negato: Nome utente e/o password dell'utente MySql errate. ";

//connettiti al database
$connessioneAttiva = mysql_connect($server, $user_nameDB, $passwordDB) or die ($strNoConnection.mysql_error($connessioneAttiva));
mysql_select_db($database, $connessioneAttiva) or die ($strNoDatabase.mysql_error($connessioneAttiva));

$queryCercaFotoSource= "
	SELECT *
	FROM tabella
";
$queryCercaFoto = mysql($database, $queryCercaFotoSource) or die("ERRORE:". mysql_error());
$i = 0;
//header('Content-Type:image/jpeg');
while($queryCercaFotoRow = mysql_fetch_assoc($queryCercaFoto)){
	$i++;
	$immagine = $queryCercaFotoRow['foto'];
	$newfile = fopen('images/'.$queryCercaFotoRow['foto_n'],'w') or die("impossibile aprire il file");
	fwrite($newfile,$immagine);
}
echo $i;
?>
