	 <?php
    $obrazky=opendir('./images/') ;
    while (false!==($soubor=readdir($obrazky))){
    if (substr($soubor,0,4)=="min_") {
    echo "<div class='photo'><a href='./images/".substr($soubor,4)."' rel='lightbox[galerie]'><img src='./images/".$soubor."'></a></div>";
    }
    }
    
    
    ?>    