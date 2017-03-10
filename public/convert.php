<?php

$file = fopen("skillz/Translations.txt", "r");
$write = fopen("skillz/db/Translations.php", "w");
while(!feof($file)){
    $line = fgets($file);
    fwrite($write, "array[] = ['name' => '" . $line . "'];\n");
}

?>