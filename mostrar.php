<?php
//#######################################################################
//############################################################## "ÍNDICE"
//***********************************************************************
//# *********************************************************************
//# Funciones
//## error()
//## esPrimo()
//# Valores
//# Tratar errores y Resultado
//# *********************************************************************

//# Funciones
//# ---------------------------------------------------------------------
//## error()
//# ---------------------------------------------------------------------
function error() {
  echo "Solo se aceptan números.";
}

//## esPrimo()
//# ---------------------------------------------------------------------
function esPrimo($numero) {
  $numDivisores = 0; //Contador para controlar el total de divisores.
                     //Un divisor es un número entero que divide otro sin dejar
                     //un residuo (residuo = 0).

  //Dividiremos el número desde el 1 hasta el propio $numero.
  for ($i = 1; $i <= $numero; $i++) {
    //Si encontramos un divisor incrementamos el contador en uno (++ = +1).
    //$i incrementará hasta alcanzar $numero (1, 2, 3, 4...6, 7,...$numero).
    if($numero % $i == 0) {
      $numDivisores++;
    }
  }

  //Si el número de divisores encontrados es igual a 2, se puede afirmar que el
  //numero es primo. Un primo únicamente tiene dos divisores, 1 y él mismo.
  if($numDivisores == 2) {
    return "true";

  } else {
    return "false";
  }
}


//## listarPrimos()
//# ---------------------------------------------------------------------
function listarPrimosNaN($min, $max) {
  $indice = 0; //Contador para controlar el índice del array en el que vamos
               //a guardar los números primos encontrados.

  for ($i = $min; $i < $max; $i++) {
    //Comprobaremos si el número es primo o no. Para ello utilizamos la función
    //que hemos creado para este mismo propósito. Guardamos el resultado en una
    //variable.
    $esPrimo = esPrimo($i);

    //En el caso de que se trate de un número primo, éste lo guardaremos en un
    //array $listarPrimos[].
    if ($esPrimo == true) {
      $listaPrimos[$indice] = $i;
    }

    //Incrementamos el índice ($indice) del array y el número ($i) que va a ser
    //tratado por la función esPrimo().
    $indice++;
    $i++;
  }

  //Devolvemos el array con todos los números primos encontrados.
  return $listaPrimos;
}


//# Valores
//# ---------------------------------------------------------------------
$numeroMin = 0;

//Obtener los valores introducidos en los campos del formulario.
$numeroMax = $_POST['numero']; //name="numero"


//# Tratar errores y Resultado
//# ---------------------------------------------------------------------
//Comprobaremos si el valor proporcionado es un número.
//Si es un número procederemos a buscar los primos contenidos entre 0 y éste.
//Si es un número enviaremos un mensaje de error.
if (!is_numeric($numeroMax)) {
  echo error();

} else { //Resultado
  echo "<h3>Números primos contenidos entre 0 y " . $numeroMax . ":</h3>";

  //Como se trata de un array, para mostrar cada uno de éstos debemos utilizar
  //un foreach y determinar una variable a utilizar para cada valor del índice.
  foreach (listarPrimosNaN($numeroMin, $numeroMax) as $numPrimo) {
    echo $numPrimo . "; ";
  }
}
?>
