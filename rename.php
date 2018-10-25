<?php

define("to_PHP_7", false);

function renommerFichier($repertoire, $nomFichier, $maj) {
    if($nomFichier != 'index.html'){
        $nomFichier = ($maj ? ucfirst($nomFichier) : lcfirst($nomFichier));
    	rename($repertoire . $nomFichier, $repertoire . $nomFichier);
        echo $nomFichier . '<br>';
    }
}

function parcourirArborescence($repertoire, $maj = true) {
    if ($dh = opendir($repertoire)) {
        while (($fichier = readdir($dh)) != FALSE) {
            if ($fichier == '.') {
                continue;
            }
            if ($fichier == '..') {
                continue;
            }
            if (is_dir($repertoire . $fichier)) {
                parcourirArborescence($repertoire . $fichier. '\\', $maj);
            } else {
				renommerFichier($repertoire, $fichier, $maj);
            }
        }
        closedir($dh);
    }
}

parcourirArborescence("C:\Users\jeremy.emo\SOURCES - DEV\application\controllers\\", to_PHP_7);
parcourirArborescence("C:\Users\jeremy.emo\SOURCES - DEV\application\models\\", to_PHP_7);

if(to_PHP_7){
    renommerFichier("C:\Users\jeremy.emo\SOURCES - DEV\application\libraries\\", "html2pdf.php", to_PHP_7);
} else {
    renommerFichier("C:\Users\jeremy.emo\SOURCES - DEV\application\libraries\\", "Html2pdf.php", to_PHP_7);
}

?>
