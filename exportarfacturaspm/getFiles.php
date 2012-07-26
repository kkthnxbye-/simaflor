<?php
$filename = 'test.txt';
$somecontent = "Add this to the file\n";


// Let's make sure the file exists and is writable first.
//if (!is_writable($filename)) {
 if (!file_exists($filename)) {
   $filename = fopen($filename, "w+");
   chmod($filename, 777);
   echo 'No existe';
   exit;
}
//}
   


if (!$handle = fopen($filename, 'a')) {
         echo "Cannot open file ($filename)";
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
    }

    echo "Success, wrote ($somecontent) to file ($filename)";

    fclose($handle);


?>