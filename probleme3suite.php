<!--Tableau de vérification de donées ----------------------------------------------------------------------------------------------------------------------> 

<td colspan="12" class="sVerifications">Sommes de vérification et statistiques</td>
</tr>
<tr>
<td class="sEntete sCentre"></td>
<td class="sEntete sCentre">No App.</td>
<td class="sEntete sCentre">No Civ.</td>
<td class="sEntete sCentre">Occupé par</td>
<td class="sEntete sCentre"></td>
<td class="sEntete sCentre"></td>
<td class="sEntete sCentre">Loyer</td>
<td class="sEntete sCentre">Type</td>
<td class="sEntete sCentre">Nb pièces</td>
<td class="sEntete sCentre">Meublé</td>
<td class="sEntete sCentre">Chauffé</td>
<td class="sEntete sCentre"></td>
</tr>

<tr>
<td>∑ =</td>
<td class="sGras sCentre"><?php 
$tailleArray = count($arrayJSONAppartements);
$sumNoApp = 0;
for ($i = 0; $i < $tailleArray; $i++) {
   $sumNoApp += $arrayJSONAppartements[$i]["no-app"];
}
echo $sumNoApp;
?></td>
<td class="sGras sCentre"><?php 
$tailleArray = count($arrayJSONAppartements);
$sumNoCiv = 0;
for ($i = 0; $i < $tailleArray; $i++) {        
      $tailleArrayI = count($arrayJSONImmeubles);     
      for ($j = 0; $j < $tailleArrayI; $j++) {
         if  ($arrayJSONAppartements[$i]["no-civ"] == $arrayJSONImmeubles[$j]["no-civ"])
         {  
            $sumNoCiv += $arrayJSONImmeubles[$j]["no-civ"];
}}}
echo $sumNoCiv;
?>
</td>
<td class="sGras sCentre"><?php
$tailleArray = count($arrayJSONAppartements);
$sumLocH = 0; $sumLocF = 0; $sumLocV = 0;
for ($i = 0; $i < $tailleArray; $i++) {
   if ($arrayJSONAppartements[$i]["sexe"] == "")
  { $sumLocV ++;}
   else if ($arrayJSONAppartements[$i]["sexe"] == "H")
   {$sumLocH ++;}
   else if ($arrayJSONAppartements[$i]["sexe"] == "F")
  { $sumLocF ++;}
}
echo $sumLocF." femmes"."<br>".$sumLocH." hommes"."<br>".$sumLocV." vacants"."<br>";
?></td>
<td></td>
<td></td>
<td class="sGras"><?php 
$tailleArray = count($arrayJSONAppartements);
$sumLoyer = 0;
for ($i = 0; $i < $tailleArray; $i++) {
   if ($arrayJSONAppartements[$i]["loyer"] != "")
   $sumLoyer += $arrayJSONAppartements[$i]["loyer"];
}
echo $sumLoyer." $";
?>
</td>
<td class="sGras sDroite"><?php
$tailleArray = count($arrayJSONAppartements);
$sumTypeA = 0; $sumTypeM = 0; $sumTypeH = 0; $sumTypeV = 0;
for ($i = 0; $i < $tailleArray; $i++) {
   if ($arrayJSONAppartements[$i]["type"] == "")
  { $sumTypeV ++;}
   else if ($arrayJSONAppartements[$i]["type"] == "H")
   {$sumTypeH ++;}
   else if ($arrayJSONAppartements[$i]["type"] == "A")
  { $sumTypeA ++;}
  else if ($arrayJSONAppartements[$i]["type"] == "M")
  { $sumTypeM ++;}
}
echo $sumTypeA." (A)"."<br>".$sumTypeM." (M)"."<br>".$sumTypeH." (H)"."<br>".$sumTypeV." (V)"."<br>";
?></td>
<td class="sGras sCentre"><?php
$tailleArray = count($arrayJSONAppartements);
$sumNbPieces = 0;
for ($i = 0; $i < $tailleArray; $i++) {
   if ($arrayJSONAppartements[$i]["nb-pieces"] != "")
   $sumNbPieces += $arrayJSONAppartements[$i]["nb-pieces"];
}
echo remplacerFraction($sumNbPieces);
?></td>
<td class="sGras sCentre"><?php
$tailleArray = count($arrayJSONAppartements);
$sumMeuble = 0;
for ($i = 0; $i < $tailleArray; $i++) {
   if ($arrayJSONAppartements[$i]["meuble"] == 1)
  { $sumMeuble ++;}
}
echo $sumMeuble;
?></td>
<td class="sGras sCentre"><?php
$tailleArray = count($arrayJSONAppartements);
$sumChauffe = 0;
for ($i = 0; $i < $tailleArray; $i++) {
   if ($arrayJSONAppartements[$i]["chauffe"] == 1)
  { $sumChauffe ++;}
}
echo $sumChauffe;
?></td>
<td></td>
</tr>