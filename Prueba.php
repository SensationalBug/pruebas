<?php
function convertir($input,$formato="") {
// global($main_system); // Los parentesis no deberian estar ahi
global $main_system; // Asi es que debe ir
$res=$input;
if($input !== "") {
if($formato === ""&&isset($main_system['formato'])) $formato=$main_system['formato'];
if($formato !== "") {
$form=explode("|",$formato);
for($i=0;$i<count($form);$i++) $form[$i]=trim($form[$i]);
switch($form.len()) {
case 1:
$form[1]=".";
case 2:
$form[2]="";
case 3:
// BLOQUE 1
// $c=new Array("0","0"); // No es necesario el new
$c = Array("0","0");
$r=strpos($input,".");
if($r!==false) {
$c[0]=substr($input,0,$r);
$c[1]=substr($input,$r+1);
}
else $c[0]=$input;
if($c[0] === "-") $c[0]="-0";
//FIN BLOQUE 1
// $res={};
// //BLOQUE 2
// if($form[2] = "") $res=$c[0];
// else {
// $l=0;
// if(substr($c[0],0,1) == "-") $l=1;
// for($j=strlen($c[0])-1, $z=0; $j>=$l; $j--, $z++) {
// if($z>0 && $z%3==0) $res=$form[2].$res;
// $res=substr($c[0],$j,1).$res;
// }
// if(substr($c[0],0,1) == "-") $res="-".$res;
// }
// //FIN BLOQUE 2
// //BLOQUE 3
// if($c[1] != "0" and $form[0] != "0") {
// $res.=$form[1];
// for($j=0; $j<$form[0]; $j++) {
// if($j<strlen($c[1])) $res.=$c[1][$j];
// else $res.="0";
// }
// }
// if($res === "-0") $res="0";
// //FIN BLOQUE 3
}
}
}
}
// exit($res);
// }
echo convertir("-.40")
?>