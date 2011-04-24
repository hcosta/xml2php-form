<?php
	include 'xml_form.php';
?>
<html>
<head></head>
<body>
<?php 
	$xml = new xml_form("AnimeList.xml","Titulo");	
	$xml->form();
	
	$xml2 = new xml_form("personas.xml","Nombre");	
	$xml2->form();
?>
</body>
</html>