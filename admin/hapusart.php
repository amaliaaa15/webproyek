<?php
include "fungsi.php";



$idart = $_GET["idart"];

if ( hapusart($idart) > 0 ) {
  header ("location: artikel.php");
} else {
  echo "Error deleting record";
}

?>