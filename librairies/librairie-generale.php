<?php 

/* 
|-------------------------------------------------------------------------------------| 
| ajouteZeros (2022-01-27) 
| Scénario : ajouteZeros($numValeur, $intLargeur) 
|-------------------------------------------------------------------------------------| 
*/ 
function ajouteZeros($numValeur, $intLargeur) {
      $strFormat = "%0" . $intLargeur . "d";   
      return sprintf($strFormat, $numValeur); 
    }     
    /*  for ($i=0; $i<=10; $i++) {    
        echo ajouteZeros(1, $i) . "<br />"; 
      } 
        die();*/



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Convertir un sous chaine en entier
function convertitSousChaineEnEntier($strChaine, $intDepart, $intLongueur) {
     $intEntier = intval(substr($strChaine, $intDepart, $intLongueur));
    return $intEntier;
    }


  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//er
 /*
 |-------------------------------------------------------------------------------------|
 | er (2021-01-20)
 | Scénarios : er($intEntier) | er($intEntier, $binExposant)
 |-------------------------------------------------------------------------------------| 
 */
function er($intEntier, $binExposant=true) {
    return $intEntier . ($intEntier == 1 ? ($binExposant ? "<sup>er</sup>" : "er") : ""); 
}

 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//parametre
/*
   |---------------------------------------------------------------------------|
   | parametre (2022-02-10)
   |---------------------------------------------------------------------------|
   */
  function parametre($strIDParam) {
    return filter_input(INPUT_GET, $strIDParam, FILTER_SANITIZE_SPECIAL_CHARS) .
           filter_input(INPUT_POST, $strIDParam, FILTER_SANITIZE_SPECIAL_CHARS);
 }   

?>