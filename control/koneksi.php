<?php
////$dbconn3 = pg_connect("host=194.59.165.67 port=5432 dbname=masdex_dev user=postgres password=2020@artadb");
//echo ($dbconn3);

   $host        = "host = 194.59.165.67";
   $port        = "port = 5432";
   $dbname      = "dbname = logistic";
   $credentials = "user = postgres password=2020@artadb";

   $conn = pg_connect( "$host $port $dbname $credentials"  );
   if(!$conn) {
      echo "Error : Unable to open database\n";
   } 
?>