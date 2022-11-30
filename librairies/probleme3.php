<?php
// Connexion avec librairie -------------------------------------------------------------------------------------
   require_once "librairie-generale.php";

// Variables systèmes -------------------------------------------------------------------------------------------
   $strTitreApplication = "Projet 1 : Gestion des appartements";
   $strNomFichierCSS = "index.css";
   $strNomAuteur = "Jacqueline Rogge";
   $intNbApplications = 0;

// En tête de l'application -------------------------------------------------------------------------------------
require_once "en-tete.php";

//Récupération de l'identifiant séléctionné ---------------------------------------------------------------------
$strValueRecherche = parametre("ddlChoix");

//Récupération du contenu JSON ----------------------------------------------------------------------------------
$strJSONImmeubles = "donnees/immeubles.json";
$strJSONAppartements = "donnees/appartements.json";

$fichierJSONImmeubles = file_get_contents($strJSONImmeubles);
$fichierJSONAppartements = file_get_contents($strJSONAppartements);

//Conversion du flux de données texte JSON en objet JSON 
$arrayJSONImmeubles = (json_decode($fichierJSONImmeubles, true));
$arrayJSONAppartements = json_decode($fichierJSONAppartements, true);
?>

<!--Contenu de l'application ----------------------------------------------------------------------------------->
<!--Menu déroulante -------------------------------------------------------------------------------------------->
<div id="divMenu">
   <p class="sTitreSection">
      Que désirez-vous faire...
   </p>
   <select id="ddlChoix" name="ddlChoix" onchange="document.getElementById('frmSaisie').submit();">
      <option value="">Sélectionnez</option>
      <option value="L">Afficher la liste des locataires</option>
      <option value="A">Afficher la liste des appartements</option>
      <option value="I">Afficher la liste des immeubles</option>
   </select>
</div>

<!--Titre tableau -------------------------------------------------------------------------------------------->
<?php if ($strValueRecherche == "L" || $strValueRecherche == "A" || $strValueRecherche == "I") { ?>

<div id="divObjetJSON">  
   <p  class="sTitreSection">         
      <?php
         if($strValueRecherche == "L"){
            echo "Liste des locataires";
         }else if($strValueRecherche == "A"){
            echo "Liste des appartements";
         }else if($strValueRecherche == "I"){
            echo "Liste des immeubles";
         }
      ?>  

<!--Affichage de tableau selon la liste choisi ----------------------------------------------------------------->
      <?php
         if($strValueRecherche == "L"){ //IF LISTE LOCATAIRES/////////////////////////////////////////////////////
      ?>
            <br>
            <span class="sTri">
      <!--Logique de tri du tableau ----------------------------------------------------------------->
      <?php
            $strTri = parametre("Tri");
            $strOrdre = parametre("Ordre");
               if ($strTri == "no-civ") {
                  if ($strOrdre == "ASC") {
                     sort($arrayJSONImmeubles); 
                     echo "trié en ordre croissante de numéros civiques et croissant de numéros d'appartements";
                  }
                  else if ($strOrdre == "DESC") {
                     rsort($arrayJSONImmeubles);
                     echo "trié en ordre décroissante de numéros civiques et croissant de numéros d'appartements";
                  }
               } else if ($strTri == "nom-prenom") {
                  if ($strOrdre == "ASC") {
                     sort($arrayJSONImmeubles); 
                     echo "trié en ordre alphabétique de noms de locataire";
                  }
                  else if ($strOrdre == "DESC") {
                     rsort($arrayJSONImmeubles); 
                     echo "trié en ordre alphabétique inverse de noms de locataire";
                  }
               }
               ?>    
      </span>     
      </p> 
<!--En tête tableau -------------------------------------------------------------------------------------------->
<table>
   <tr>
      <td class="sEntete sDroite">No</td>
      <td class="sEntete">No App.</td>
      <td class="sEntete sAdresse">Adresse
         <a href="probleme3?ddlChoix=<?php echo $strValueRecherche ?>&Tri=no-civ&Ordre=ASC">
            <img src="images/hautNonSelectionne.png" onmouseover="this.src = 'images/hautSelectionne.png';" onmouseout="this.src = 'images/hautNonSelectionne.png';" />
         </a>
         <a href="probleme3?ddlChoix=<?php echo $strValueRecherche ?>&Tri=no-civ&Ordre=DESC">
            <img src="images/basNonSelectionne.png" onmouseover="this.src = 'images/basSelectionne.png';" onmouseout="this.src = 'images/basNonSelectionne.png';" />
         </a>
      </td>
      <td class="sEntete">Nom du locataire
         <a href="probleme3?ddlChoix=<?php echo $strValueRecherche ?>&Tri=nom-prenom&Ordre=ASC">
            <img src="images/hautNonSelectionne.png" onmouseover="this.src = 'images/hautSelectionne.png';" onmouseout="this.src = 'images/hautNonSelectionne.png';" />
         </a>
         <a href="probleme3?ddlChoix=<?php echo $strValueRecherche ?>&Tri=nom-prenom&Ordre=DESC">
            <img src="images/basNonSelectionne.png" onmouseover="this.src = 'images/basSelectionne.png';" onmouseout="this.src = 'images/basNonSelectionne.png';" />
         </a>
      </td>
      <td class="sEntete sCentre">Téléphone</td>
      <td class="sEntete sCentre">Cellulaire</td>
      <td class="sEntete sDroite">Loyer</td>
      <td class="sEntete sCentre">Type</td>
      <td class="sEntete sCentre">Nb pièces</td>
      <td class="sEntete sCentre">Meublé?</td>
      <td class="sEntete sCentre">Chauffé?</td>
      <td class="sEntete sCentre">Signature</td>
   </tr>

   <?php
$tailleArray = count($arrayJSONAppartements);
for ($i = 0; $i < $tailleArray; $i++) {          
?>
 <tr>
      <td class="sDroite"><?php echo $i+1; ?></td>
      <td class="sDroite"><?php echo $arrayJSONAppartements[$i]["no-app"];?></td> 
      <td><?php /*
      $tailleArrayI = count($arrayJSONImmeubles); 
      for ($j = 0; $j < $tailleArrayI; $j++) { 
         switch ($arrayJSONAppartements[$i]["no-civ"]){
            case $arrayJSONImmeubles[$j]["no-civ"]:
            echo $arrayJSONImmeubles[$i]["no-civ"]." ".$arrayJSONImmeubles[$i]["rue"].", ".$arrayJSONImmeubles[$i]["ville"].", ".$arrayJSONImmeubles[$i]["code-postal"];
         */
      ?> </td> 
      <td><?php
         if ($arrayJSONAppartements[$i]["nom"] != ""){echo $arrayJSONAppartements[$i]["nom"].", ".$arrayJSONAppartements[$i]["prenom"];}  
      
      ?></td>
      <td class="sCentre"><?php if ($arrayJSONAppartements[$i]["telephone"] ==""){echo "";} else if ($arrayJSONAppartements[$i]["telephone"] !="")echo $arrayJSONAppartements[$i]["telephone"]; ?></td> 
      <td class="sCentre"><?php if ($arrayJSONAppartements[$i]["cellulaire"] ==""){echo "";} else if ($arrayJSONAppartements[$i]["cellulaire"] !="")echo $arrayJSONAppartements[$i]["cellulaire"]; ?></td>
      <td class="sDroite"><?php if ($arrayJSONAppartements[$i]["loyer"] == ""){echo "";}else if($arrayJSONAppartements[$i]["loyer"] != ""){echo $arrayJSONAppartements[$i]["loyer"]." $";} ?></td>  
      <td class="sCentre"><?php if ($arrayJSONAppartements[$i]["type"]  == "A"){echo "Annuel";}else if($arrayJSONAppartements[$i]["type"]=="M"){echo "Mensuel";}else if($arrayJSONAppartements[$i]["type"]=="H"){echo "Hebdo";} ?></td> 
      <td class="sDroite"><?php if ($arrayJSONAppartements[$i]["nb-pieces"] == ""){echo "";}else if($arrayJSONAppartements[$i]["nb-pieces"] != ""){echo remplacerFraction($arrayJSONAppartements[$i]["nb-pieces"]);}; ?></td> 
      <td class="sCentre"><?php if ($arrayJSONAppartements[$i]["meuble"] == true){echo "Oui";}else if($arrayJSONAppartements[$i]["meuble"] == false){echo "Non";} ?></td> 
      <td class="sCentre"><?php if ($arrayJSONAppartements[$i]["chauffe"] == true){echo "Oui";}else if($arrayJSONAppartements[$i]["chauffe"] == false){echo "Non";} ?></td> 
      <td class="sCentre sDate"><?php echo $arrayJSONAppartements[$i]["date-signature"]; ?></td>  
   </tr>
   
<?php
} // = ou - de }
?>
   </table>
</div>




  <?php
         }else if($strValueRecherche == "A"){ //IF LISTE APPARTEMENTS///////////////////////////////////////////////////// 
      ?>
 <br>
            <span class="sTri">
      <!--Logique de tri du tableau ----------------------------------------------------------------->
      <?php
            $strTri = parametre("Tri");
            $strOrdre = parametre("Ordre");
               if ($strTri == "no-civ") {
                  if ($strOrdre == "ASC") {
                     sort($arrayJSONImmeubles); 
                     echo "trié en ordre croissante de numéros civiques et croissant de numéros d'appartements";
                  }
                  else if ($strOrdre == "DESC") {
                     rsort($arrayJSONImmeubles);
                     echo "trié en ordre décroissante de numéros civiques et croissant de numéros d'appartements";
                  }
               } else if ($strTri == "nom-prenom") {
                  if ($strOrdre == "ASC") {
                     sort($arrayJSONImmeubles); 
                     echo "trié en ordre alphabétique de noms de locataire";
                  }
                  else if ($strOrdre == "DESC") {
                     rsort($arrayJSONImmeubles); 
                     echo "trié en ordre alphabétique inverse de noms de locataire";
                  }
               }
               ?>    
      </span>     
      </p> 
<!--En tête tableau -------------------------------------------------------------------------------------------->
<table>
   <tr>
      <td class="sEntete sDroite">No</td>
      <td class="sEntete">No App.</td>
      <td class="sEntete sAdresse">Adresse
         <a href="probleme3?ddlChoix=<?php echo $strValueRecherche ?>&Tri=no-civ&Ordre=ASC">
            <img src="images/hautNonSelectionne.png" onmouseover="this.src = 'images/hautSelectionne.png';" onmouseout="this.src = 'images/hautNonSelectionne.png';" />
         </a>
         <a href="probleme3?ddlChoix=<?php echo $strValueRecherche ?>&Tri=no-civ&Ordre=DESC">
            <img src="images/basNonSelectionne.png" onmouseover="this.src = 'images/basSelectionne.png';" onmouseout="this.src = 'images/basNonSelectionne.png';" />
         </a>
      </td>
      <td class="sEntete">Nom du locataire
         <a href="probleme3?ddlChoix=<?php echo $strValueRecherche ?>&Tri=nom-prenom&Ordre=ASC">
            <img src="images/hautNonSelectionne.png" onmouseover="this.src = 'images/hautSelectionne.png';" onmouseout="this.src = 'images/hautNonSelectionne.png';" />
         </a>
         <a href="probleme3?ddlChoix=<?php echo $strValueRecherche ?>&Tri=nom-prenom&Ordre=DESC">
            <img src="images/basNonSelectionne.png" onmouseover="this.src = 'images/basSelectionne.png';" onmouseout="this.src = 'images/basNonSelectionne.png';" />
         </a>
      </td>
      <td class="sEntete sCentre">Téléphone</td>
      <td class="sEntete sCentre">Cellulaire</td>
      <td class="sEntete sDroite">Loyer</td>
      <td class="sEntete sCentre">Type</td>
      <td class="sEntete sCentre">Nb pièces</td>
      <td class="sEntete sCentre">Meublé?</td>
      <td class="sEntete sCentre">Chauffé?</td>
      <td class="sEntete sCentre">Signature</td>
   </tr>

   <?php
$tailleArray = count($arrayJSONAppartements);
for ($i = 0; $i < $tailleArray; $i++) {          
?>
 <tr>
      <td class="sDroite"><?php echo $i+1; ?></td>
      <td class="sDroite"><?php echo $arrayJSONAppartements[$i]["no-app"];?></td> 
      <td><?php /*
      $tailleArrayI = count($arrayJSONImmeubles); 
      for ($j = 0; $j < $tailleArrayI; $j++) { 
         switch ($arrayJSONAppartements[$i]["no-civ"]){
            case $arrayJSONImmeubles[$j]["no-civ"]:
            echo $arrayJSONImmeubles[$i]["no-civ"]." ".$arrayJSONImmeubles[$i]["rue"].", ".$arrayJSONImmeubles[$i]["ville"].", ".$arrayJSONImmeubles[$i]["code-postal"];
         */
      ?> </td> 
      <td><?php
         if ($arrayJSONAppartements[$i]["nom"] != ""){echo $arrayJSONAppartements[$i]["nom"].", ".$arrayJSONAppartements[$i]["prenom"];}  
      
      ?></td>
      <td class="sCentre"><?php if ($arrayJSONAppartements[$i]["telephone"] ==""){echo "";} else if ($arrayJSONAppartements[$i]["telephone"] !="")echo $arrayJSONAppartements[$i]["telephone"]; ?></td> 
      <td class="sCentre"><?php if ($arrayJSONAppartements[$i]["cellulaire"] ==""){echo "";} else if ($arrayJSONAppartements[$i]["cellulaire"] !="")echo $arrayJSONAppartements[$i]["cellulaire"]; ?></td>
      <td class="sDroite"><?php if ($arrayJSONAppartements[$i]["loyer"] == ""){echo "";}else if($arrayJSONAppartements[$i]["loyer"] != ""){echo $arrayJSONAppartements[$i]["loyer"]." $";} ?></td>  
      <td class="sCentre"><?php if ($arrayJSONAppartements[$i]["type"]  == "A"){echo "Annuel";}else if($arrayJSONAppartements[$i]["type"]=="M"){echo "Mensuel";}else if($arrayJSONAppartements[$i]["type"]=="H"){echo "Hebdo";} ?></td> 
      <td class="sDroite"><?php if ($arrayJSONAppartements[$i]["nb-pieces"] == ""){echo "";}else if($arrayJSONAppartements[$i]["nb-pieces"] != ""){echo remplacerFraction($arrayJSONAppartements[$i]["nb-pieces"]);}; ?></td> 
      <td class="sCentre"><?php if ($arrayJSONAppartements[$i]["meuble"] == true){echo "Oui";}else if($arrayJSONAppartements[$i]["meuble"] == false){echo "Non";} ?></td> 
      <td class="sCentre"><?php if ($arrayJSONAppartements[$i]["chauffe"] == true){echo "Oui";}else if($arrayJSONAppartements[$i]["chauffe"] == false){echo "Non";} ?></td> 
      <td class="sCentre sDate"><?php echo $arrayJSONAppartements[$i]["date-signature"]; ?></td>  
   </tr>
   
<?php
} // = ou - de }
?>
   </table>
</div>


 <?php 
         }else if($strValueRecherche == "I"){ //IF LISTE IMMEUBLES///////////////////////////////////////////////////// 
            ?>
            <br>
            <span class="sTri">

<!--Logique de tri du tableau ----------------------------------------------------------------->
            <?php
            $strTri = parametre("Tri");
            $strOrdre = parametre("Ordre");
               if ($strTri == "no-civ") {
                  if ($strOrdre == "ASC") {
                     sort($arrayJSONImmeubles); 
                     echo "trié en ordre croissante de numéros civiques";
                  }
                  else if ($strOrdre == "DESC") {
                     rsort($arrayJSONImmeubles);
                     echo "trié en ordre décroissante de numéros civiques";
                  }
               } else if ($strTri == "nom-prenom") {
                  if ($strOrdre == "ASC") {
                     sort($arrayJSONImmeubles); 
                     echo "trié en ordre alphabétique de noms du concierge";
                  }
                  else if ($strOrdre == "DESC") {
                     rsort($arrayJSONImmeubles); 
                     echo "trié en ordre alphabétique inverse de noms du concierge";
                  }
               }
               ?>    
      </span>     
      </p> 

<!--En tête tableau -------------------------------------------------------------------------------------------->
<table>
<tr>
               <td class="sEntete sDroite">No</td>
               <td class="sEntete sAdresseComplete">Adresse
                  <a href="probleme3?ddlChoix=<?php echo $strValueRecherche ?>&Tri=no-civ&Ordre=ASC">
                     <img src="images/hautNonSelectionne.png" onmouseover="this.src = 'images/hautSelectionne.png';" onmouseout="this.src = 'images/hautNonSelectionne.png';" />
                  </a>
                  <a href="probleme3?ddlChoix=<?php echo $strValueRecherche ?>&Tri=no-civ&Ordre=DESC">
                     <img src="images/basNonSelectionne.png" onmouseover="this.src = 'images/basSelectionne.png';" onmouseout="this.src = 'images/basNonSelectionne.png';" />
                  </a>
               </td>
               <td class="sEntete">Nom du concierge
                  <a href="probleme3?ddlChoix=<?php echo $strValueRecherche ?>&Tri=nom-prenom&Ordre=ASC">
                     <img src="images/hautNonSelectionne.png" onmouseover="this.src = 'images/hautSelectionne.png';" onmouseout="this.src = 'images/hautNonSelectionne.png';" />
                  </a>
                  <a href="probleme3?ddlChoix=<?php echo $strValueRecherche ?>&Tri=nom-prenom&Ordre=DESC">
                     <img src="images/basNonSelectionne.png" onmouseover="this.src = 'images/basSelectionne.png';" onmouseout="this.src = 'images/basNonSelectionne.png';" />
                  </a>
               </td>
               <td class="sEntete">Téléphone</td>
            </tr>
        
   </p> 


   <?php
$tailleArray = count($arrayJSONImmeubles);
for ($i = 0; $i < $tailleArray; $i++) {          
?>
   <tr>
     <td><?php echo $i+1; ?></td>
     <td><?php echo $arrayJSONImmeubles[$i]["no-civ"]." ".$arrayJSONImmeubles[$i]["rue"].", ".$arrayJSONImmeubles[$i]["ville"].", ".$arrayJSONImmeubles[$i]["code-postal"]; ?></td> 
     <td><?php echo $arrayJSONImmeubles[$i]["nom"].", ".$arrayJSONImmeubles[$i]["prenom"]; ?></td> 
     <td><?php echo $arrayJSONImmeubles[$i]["telephone"]; ?></td> 
   </tr>
   
<?php
} }}
?>
   </table>
</div>



<?php
// Pied de page de l'application ---------------------------------------------------------------------------------
   require_once "pied-page.php"; 
?>
<!--Récupération du paramètre à partir de la barre d'adresse du navigateur -------------------------------------->
<script type="text/javascript">
document.getElementById('ddlChoix').value = '<?php echo $strValueRecherche; ?>';
</script>
</body>
</html>