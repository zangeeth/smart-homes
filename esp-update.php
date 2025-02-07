<?php
    include_once('esp-database.php');

    $nameAppliance = $_REQUEST['name'];
    $type = $_REQUEST['type'];
    $boardID = $_REQUEST['boardID'];
    $gpio = $_REQUEST['gpio'];
    $value = $_REQUEST['value'];
    

    //echo $nameAppliance."-".$type."-".$boardID."-".$gpio."-".$value;
    
    if($_REQUEST['type']=='current'){
        insertCurrent($nameAppliance, $type, $boardID, $gpio, $value);
    }
    
    
    if($_REQUEST['type']=='temperaturehumidity'){
        insertTemperatureHumidity($nameAppliance, $type, $boardID, $gpio, $value);
    }
    
    
    if($_REQUEST['type']=='gas'){
        insertGas($nameAppliance, $type, $boardID, $gpio, $value);
    }
   
    
    if($_REQUEST['type']=='motion'){
        insertMotion($nameAppliance, $type, $boardID, $gpio, $value);
    }  
?>

