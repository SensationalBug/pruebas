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
        $input = "-.40"; // Valor dado en el ejericio 2
        //BLOQUE 1
        $c = Array("0","0"); 
        $r=strpos($input,".");
        if($r!==false) {
            $c[0]=substr($input,0,$r);
            $c[1]=substr($input,$r+1);
        }
        else $c[0]=$input;
        if($c[0] === "-") $c[0]="-0";
        print_r($c);

    ?>
    </div>
</body>
</html>