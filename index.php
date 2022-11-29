<?php
// Variables systèmes -------------------------------------------------------------------------------------------
   $strTitreApplication = "Projet 1 : Gestion des appartements";
   $strNomFichierCSS = "index.css";
   $strNomAuteur = "Jacqueline Rogge";

// Variables systèmes -------------------------------------------------------------------------------------------
   $strJSONAppartements = require_once "donnees/appartements.json";
   $strJSONImmeubles = require_once "donnees/immeubles.json";

// En tête de l'application -------------------------------------------------------------------------------------
   require_once "en-tete.php";

/* Récupération de l'identifiant sélectionné */ 
function parametre($strIDParam) {
   return filter_input(INPUT_GET, $strIDParam, FILTER_SANITIZE_SPECIAL_CHARS) .
          filter_input(INPUT_POST, $strIDParam, FILTER_SANITIZE_SPECIAL_CHARS);
}
$strIdentifiantSelectionne = parametre("ddlChoix");
?>

<!--Contenu de l'application ----------------------------------------------------------------------------------->
<div id="divMenu">
   <p class="sTitreSection">
      Que désirez-vous faire...
   </p>
   <select id="ddlChoix" name="ddlChoix" onchange="document.getElementById('frmChoisie').submit();">
      
      <option value="L">Afficher la liste des locataires</option>
      <option value="A">Afficher la liste des appartements</option>
      <option value="I" selected>Afficher la liste des immeubles</option>
      <option value="">Sélectionnez</option>
   </select>
</div>

<?php
// Pied de page de l'application ---------------------------------------------------------------------------------
   require_once "pied-page.php"; 
?>
<!--Récupération du paramètre à partir de la barre d'adresse du navigateur -------------------------------------->
<script type="text/javascript">
document.getElementById('ddlChoix').value = '<?php echo $strChoixSelectionne; ?>';
</script>
</body>
</html>