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
        $input = "20"; // Valores dados por el ejercicio
        $res = $input; 
        $form = array('1','.',','); // Valores dados por el ejercicio
        $c=array("-3000","20"); // Valores dados por el ejercicio

        if ($c[1] != "0" and $form[0] != "0") {
            $res .= $form[1];
            // $res = '20.'
            for ($j = 0; $j < $form[0]; $j++) {
                if ($j < strlen($c[1]))
                    $res .= $c[1][$j];
                else
                    $res .= "0";
            }
        }
        if ($res === "-0")
            $res = "0";

        echo $res;
    ?>
    </div>
</body>
</html>