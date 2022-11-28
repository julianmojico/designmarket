<?php 

function updateSessionData($row){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $row["id_usuario"];
    $_SESSION["nombre_usuario"] = $row["nombre_usuario"];
    $_SESSION["avatar"] = $row["avatar"];
    $_SESSION["bio"] = $row["bio"];
    $_SESSION["nombre"] = $row["nombre"];
    $_SESSION["apellido"] = $row["apellido"];
    $_SESSION["correo"] = $row["correo"];
}

function relativeTime($time) {
    $d[0] = array(1,"segundo");
    $d[1] = array(60,"minuto");
    $d[2] = array(3600,"hora");
    $d[3] = array(86400,"día");
    $d[4] = array(604800,"semana");
    $d[5] = array(2592000,"mese");
    $d[6] = array(31104000,"año");

    $w = array();

    $return = "Hace ";
    $now = time();
    $diff = ($now-$time);
    $secondsLeft = $diff;

    if ($secondsLeft < 5){
        return 'Ahora';
    }

    for($i=6;$i>-1;$i--)
    {
         $w[$i] = intval($secondsLeft/$d[$i][0]);
         $secondsLeft -= ($w[$i]*$d[$i][0]);
         if($w[$i]!=0)
         {
            $return.= abs($w[$i]) . " " . $d[$i][1] . (($w[$i]>1)?'s':'') ." ";
         }

    }
    $array = explode(" ", $return, -3);
    return implode(" ", $array);
}

?>