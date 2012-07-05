<?php
$host_inst     = 'mssql0818.wc2';
$username     = '533638_simaflor';
$password     = 'Simaflor123';
$dbconnect = mssql_connect($host_inst, $username, $password);

if ( $dbconnect ) {
    echo '<b><font color="green">OK!</font></b>';
} else {
    echo '<b><font color="red">FAILED</font></b>';
}

?>
