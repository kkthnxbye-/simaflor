<?php

/*
 * By Camilo Cifuentes    (  http://cc-easysolutions.netne.net/  )
 */

function ValidaMail($pMail) {
   	if (ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@+([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$", $pMail ) ) {
      	 return true;
   	} else {
      	 return false;
   	}
}

?>
