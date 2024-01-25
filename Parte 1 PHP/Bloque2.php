<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <?php
        $input = ""; 
        $res = $input;
        $form = array('1','.',','); // Valores dados por el ejercicio
        $c=array("-3000","20"); // Valores dados por el ejercicio

        //BLOQUE 2
        if($form[2] == "") $res=$c[0]; // No se cumple
        else {
            $l=0;
            if(substr($c[0],0,1) == "-") $l=1; // Si se cumple
            // $l=1; Esto es lo que vale luego de esta condicion
            for($j=strlen($c[0])-1 /* Esto es 4 */ , $z=0; $j>=$l; $j--, $z++) {
                if($z>0 && $z%3==0) $res=$form[2].$res;
                $res=substr($c[0],$j,1).$res;
            }
            if(substr($c[0],0,1) == "-") $res="-".$res;
        }
        echo $res;
    ?>
    </div>
</body>
</html>