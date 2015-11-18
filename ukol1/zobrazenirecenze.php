	 <?php
	include "./../../mysql_connect.php";
    $cislo=mysql_real_escape_string($_GET["cislo"]);
	if ($sql=mysql_query("select cesta_foto from recenze_foto where id_recenze='$cislo'")){
	while ($radek=mysql_fetch_array($sql)){
		echo "<a href=\"".substr($radek['cesta_foto'],15)."\"><img src='".substr($radek['cesta_foto'],15,40)."min_".substr($radek['cesta_foto'],55)."'></a>";		
	}
	}
	
	
	
	
	
	
    ?>    