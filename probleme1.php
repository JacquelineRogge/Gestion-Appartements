<?php
// Variables systèmes -------------------------------------------------------------------------------------------
   $strTitreApplication = "Projet 1 : Gestion des appartements";
   $strNomFichierCSS = "style.css";
   $strNomAuteur = "Jacqueline Rogge";

// En tête de l'application -------------------------------------------------------------------------------------
   require_once "en-tete.php";

//Récupération du paramètre à partir de la barre d'adresse du navigateur-----------------------------------------
   $strValueRecherche = isset($_GET["ddlChoix"]) ? $_GET["ddlChoix"] : "Tous";
?>

<!--Contenu de l'application ----------------------------------------------------------------------------------->
<div id="divMenu">
   <p class="sTitreSection">
      Que désirez-vous faire...
   </p>
   <select id="ddlChoix" name="ddlChoix" onchange="document.getElementById('frmSaisie').submit();">
      <option value="" selected>Sélectionnez</option>
      <option value="L">Afficher la liste des locataires</option>
      <option value="A">Afficher la liste des appartements</option>
      <option value="I">Afficher la liste des immeubles</option>
   </select>
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