<?php
// Connexion avec librairie -------------------------------------------------------------------------------------
   require_once "librairies/librairie-generale.php";

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
$objJSONImmeubles = json_decode($fichierJSONImmeubles);
$objJSONAppartements = json_decode($fichierJSONAppartements);
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


<!--En tête tableau -------------------------------------------------------------------------------------------->

<?php
         if($strValueRecherche == "L"){
            echo "";
         }else if($strValueRecherche == "A"){
            echo "";
         }else if($strValueRecherche == "I"){
            ?>
            <br>
            <span class="sTri" id="sTrier">
         trié en ordre croissant de numéros civiques et croissant de numéros d'appartements      
      </span>     
</p> 
</div>       
         <table>
            <tr>
               <td class="sEntete">No</td>
               <td class="sEntete">Adresse <?php //<a href="index.php?ddlChoix=L&amp;Tri=no-civ&amp;Ordre=ASC">?>
                     <img src="images/hautNonSelectionne.png" onmouseover="this.src = 'images/hautSelectionne.png';" onmouseout="this.src = 'images/hautNonSelectionne.png';">
                  </a>
                  <?php //<a href="index.php?ddlChoix=L&amp;Tri=no-civ&amp;Ordre=DESC">?>
                     <img src="images/basNonSelectionne.png" onmouseover="this.src = 'images/basSelectionne.png';" onmouseout="this.src = 'images/basNonSelectionne.png';">
                  </a>
               <td class="sEntete">Nom du concierge <?php //<a href="index.php?ddlChoix=L&amp;Tri=no-civ&amp;Ordre=ASC">?>
                     <img src="images/hautNonSelectionne.png" onmouseover="this.src = 'images/hautSelectionne.png';" onmouseout="this.src = 'images/hautNonSelectionne.png';">
                  </a>
                  <?php //<a href="index.php?ddlChoix=L&amp;Tri=no-civ&amp;Ordre=DESC">?>
                     <img src="images/basNonSelectionne.png" onmouseover="this.src = 'images/basSelectionne.png';" onmouseout="this.src = 'images/basNonSelectionne.png';">
                  </a>
                </td>
               <td class="sEntete">Téléphone</td>
            </tr>
            <?php
         }
      ?>  
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