<?php 
require_once (__DIR__."/vendor/autoload.php");
 
$c = new "\"\Jaspersoft"\"\Client"\"\Client(
    "http://localhost:8080/jasperserver-pro",
    "jasperadmin",
    "jasperadmin",
    "organization_1"
  );

    $report = $c->reportService()->runReport('/reports/samples/AllAccounts', 'html');
    echo $report;       
 ?>