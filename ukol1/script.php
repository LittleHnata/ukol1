<?php
include "./../../mysql_connect.php";




function makeimage($sourcepath, $filename, $newfilename, $path, $newwidth, $newheight) {
  $sourc=$sourcepath.$filename;
    //SEARCHES IMAGE NAME STRING TO SELECT EXTENSION (EVERYTHING AFTER . )
    $image_type = strstr($filename,  '.');

    //SWITCHES THE IMAGE CREATE FUNCTION BASED ON FILE EXTENSION
        switch($image_type) {
            case '.jpg':
                $source = imagecreatefromjpeg($sourc);
                break;
            case '.png':
                $source = imagecreatefrompng($sourc);
                break;
            case '.gif':
                $source = imagecreatefromgif($sourc);
                break;
            default:
                echo("Error Invalid Image Type");
                die;
                break;
            }
    
    //CREATES THE NAME OF THE SAVED FILE
    $file = $newfilename . $filename;
    
    //CREATES THE PATH TO THE SAVED FILE
    $fullpath = $sourcepath . $file;

    //FINDS SIZE OF THE OLD FILE
    list($width,  $height) = getimagesize($sourc);

    //CREATES IMAGE WITH NEW SIZES
    $thumb = imagecreatetruecolor($newwidth,  $newheight);
	
    //RESIZES OLD IMAGE TO NEW SIZES
    imagecopyresized($thumb,  $source,  0,  0,  0,  0,  $newwidth,  $newheight,  $width,  $height);

    //SAVES IMAGE AND SETS QUALITY || NUMERICAL komprese 0 nejmensi 9 nejvetsi 
    imagepng($thumb,  $fullpath,  9);

    //CREATING FILENAME TO WRITE TO DATABSE
    $filepath = $fullpath;
    
    //RETURNS FULL FILEPATH OF IMAGE ENDS FUNCTION
    return $filepath;
}

	$cislo=mysql_real_escape_string($_POST['cislo']);
	$cilovy_adresar=$_SERVER['DOCUMENT_ROOT'].
		"/ita12/ita12chladekj/praxe/ukol1/images/";


if ($_FILES['soubor']['size'][0]>0){
	foreach($_FILES['soubor']['name'] as $f=>$name){
		$zkouskanapng=$cilovy_adresar.strstr($_FILES['soubor']['name'][$f],".",true).".png";
		imagepng(imagecreatefromstring(file_get_contents($_FILES['soubor']['tmp_name'][$f])),$zkouskanapng,9 );
		echo $zkouskanapng;
		//$cilovy_soubor=$cilovy_adresar.$_FILES['soubor']['name'][$f];
		//echo $cilovy_soubor;
		$sql="insert into recenze_foto values ('','".$cislo."','".$zkouskanapng."')";
		mysql_query($sql); 
		//move_uploaded_file($_FILES['soubor']['tmp_name'][$f], $cilovy_soubor);
		makeimage($cilovy_adresar,substr($zkouskanapng,55),"min_","","200","200") ;
	}
}else{
	echo "soubor nebyl vybran";
	
}
	header("Refresh: 3;URL=index.php");







?>