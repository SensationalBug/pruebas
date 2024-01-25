<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Algunos estilos en el mismo doc para que se vea bien XD -->
    <style>
        .div {
            user-select: none;
        }
        .pokemon {
            padding: 15px;
            font-size: 20px;
            font-weight: 600;
            border-radius: 10px;
            font-family: monospace;
            text-transform: capitalize;
        }
        .detalles {
            color: blue;
            cursor: pointer;
            text-decoration: underline;
        }
        .pokemonDetail {
            margin: 10px 0px;
        }
    </style>
</head>
<body>
<div class="div">
        <?php

        // Esta funcion me sirve para poner el color de manera dinamica a los elementos
        function selectColor($pokemonId) {
            $ternaria = ($pokemonId % 2 == 0) ? 'lightblue' : 'lightpink';
            return $ternaria;
        }
            
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
            echo "<p class=pokemon style=background-color:$color>" . 
            ($index + 1) . ' - ' . $elem['name'] . ' - ' . 
            '<b onclick="detalle(' . $index . ');" class=detalles>Detalles</b>' . 
            "<b class=pokemonDetail id=pokemonDetail$index></b>" . '</p>';
        }

        // Esta es mi primer solución y la que según lo que se funciona
        // Puse 151 porque no se podia quedar mew :)
        // $api = 'https://pokeapi.co/api/v2/pokemon?limit=151/';
        // $result = file_get_contents($api);
        // $data = json_decode($result, true);
        // foreach ($data['results'] as $elem => $value){
            //     echo $value['name'].'<br>';
            // }
        
        // Esto de abajo es demasiado lento
        // for($i = 1; $i <= 151; $i++){
            //     $api = "https://pokeapi.co/api/v2/pokemon?limit=$i/";
            //     $result = file_get_contents($api);
            //     $data = json_decode($result, true);
            //     echo "$i- ".$data['results'][$i - 1]['name'].'<br>';
            // }
        ?>
    </div>
    <script lang='text/javascript'>
        //  Esta funcion en JS la tuve que hacer para poder trabajar con los datos 
        //  en el lado del front ya que segun estuve investigando no se hace desde PHP
        function detalle(index) {
            const pokemonDetail = document.getElementById(`pokemonDetail${index}`);
            const detailURL = `https://pokeapi.co/api/v2/pokemon/${index + 1}/`

            // Con esta ternaria muetro u oculto los detalles que hago click
            pokemonDetail.style.display === "block" ? 
            pokemonDetail.style.display = "none" :
            pokemonDetail.style.display = "block"

            // Con esta funcion retorno los detalles y se los paso al elemento con el id correspondiente
            const res = fetch(detailURL)
            .then((data)=> data.json()
            .then(result => {
                const abilities = result.abilities.map(ability => ability.ability.name);
                const moves = result.moves.map(move => move.move.name).slice(0,4);
                const stats = result.stats.map(stat => `${stat.stat.name}: ${stat.base_stat}`)
                pokemonDetail.innerHTML = `
                Moves:  ${moves.join(', ')} <br>
                Abilities: ${abilities.join(', ')} <br>
                Stats <br> ${stats.join('<br>')}
               `;
            }))
        }
    </script>
</body>
</html>