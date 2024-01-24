<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #000;
        }
        .div {
            column-count: 2;
        }
        .pokemon {
            padding: 15px;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            border-radius: 10px;
            background-color:green;
            font-family: monospace;
            text-transform: capitalize;
        }
    </style>
</head>
<body>
<div class="div">
        <?php

        function selectColor($pokemonId) {
            $ternaria = ($pokemonId % 2 == 0) ? 'lightblue' : 'lightpink';
            return $ternaria;
        }

        // Esta es mi primer solución y la que según lo que se funciona
        // Puse 151 porque no se podia quedar mew :)
        // $api = 'https://pokeapi.co/api/v2/pokemon?limit=151/';
        // $result = file_get_contents($api);
        // $data = json_decode($result, true);
        // foreach ($data['results'] as $elem => $value){
            //     echo $value['name'].'<br>';
            // }
            
            // Aqui busque en internet como ver le indice ya que en JS es diferente
            // de esta manera se ve el número del pokemon al lado XD hahahaha
            // lo de la URL ya si como comprendi como ver los elementos en php lo hice solo
            $api = 'https://pokeapi.co/api/v2/pokemon?limit=151/';
            $result = file_get_contents($api);
            $data = json_decode($result, true);
            $detalles = '';
            foreach ($data['results'] as $index => $elem){
                global $detalles;
                $color = selectColor($index);
                echo "<p class='pokemon' style=background-color:$color>" . 
                ($index + 1) . ' - ' . $elem['name'] . ' - ' . '<a href=' .                 
                $elem['url'] . ' target=newblank>' . $elem['url'] . ' </a>' . "</p>";
            }
            
            // Esto de abajo es demasiado lento
            // for($i = 1; $i <= 151; $i++){
                //     $api = "https://pokeapi.co/api/v2/pokemon?limit=$i/";
                //     $result = file_get_contents($api);
                //     $data = json_decode($result, true);
                //     echo "$i- ".$data['results'][$i - 1]['name'].'<br>';
                // }
        ?>
    </div>
</body>
</html>