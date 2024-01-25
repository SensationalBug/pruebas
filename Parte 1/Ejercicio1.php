<?php
function convertir($input, $formato = "") {
    // global($main_system); // 1- Los parentesis no deberian estar ahi
    global $main_system; // Asi es que debe ir
    $res = $input;
    if ($input !== "") {
        if ($formato === "" && isset($main_system['formato']))
            $formato = $main_system['formato'];
        if ($formato !== "") {
            $form = explode("|", $formato);
            for ($i = 0; $i < count($form); $i++)
                $form[$i] = trim($form[$i]);
            // switch($form.len()) { // 2- Para obtener la cantidad de caracteres en un string en este caso se usa count()
                switch(count($form)) { // Asi es como se obtiene la cantidad, len es de python 
                    case 1:
                        $form[1] = ".";
                    case 2:
                        $form[2] = "";
                    // case 3:  // 3- El case 3 no tiene un valor
                        // BLOQUE 1 
                    // $c=new Array("0","0"); // 4- No es necesario el new
                    $c = Array("0","0"); // Asi es como va, sin la palabra new
                    $r = strpos($input, ".");
                    if ($r !== false) {
                        $c[0] = substr($input, 0, $r);
                        $c[1] = substr($input, $r + 1);
                    } else
                        $c[0] = $input;
                    if ($c[0] === "-")
                        $c[0] = "-0";
                    //FIN BLOQUE 1 
                    // $res={}; // 4- Esta inicializacion esta mal, para un string vacio deberia ser "" 
                    $res=""; // Asi
                    //BLOQUE 2 
                    // if ($form[2] = "") // 5- Deberia tener 2 iguales para que sea comparacion en vez de asignacion
                    if ($form[2] == "") // Asi es como debe ir
                        $res = $c[0];
                    else {
                        $l = 0;
                        if (substr($c[0], 0, 1) == "-")
                            $l = 1;
                        for ($j = strlen($c[0]) - 1, $z = 0; $j >= $l; $j--, $z++) {
                            if ($z > 0 && $z % 3 == 0)
                                $res = $form[2] . $res;
                            $res = substr($c[0], $j, 1) . $res;
                        }
                        if (substr($c[0], 0, 1) == "-")
                            $res = "-" . $res;
                    }
                    //FIN BLOQUE 2 
                    //BLOQUE 3 
                    if ($c[1] != "0" and $form[0] != "0") {
                        $res .= $form[1];
                        for ($j = 0; $j < $form[0]; $j++) {
                            if ($j < strlen($c[1]))
                                $res .= $c[1][$j];
                            else
                                $res .= "0";
                        }
                    }
                    if ($res === "-0")
                        $res = "0";
                    //FIN BLOQUE 3 
            }
        }
    }
    // } // 6- Este cierre esta de mas
    exit($res);
}
?>