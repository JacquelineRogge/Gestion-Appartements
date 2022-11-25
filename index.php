<?php
// Variables systèmes -------------------------------------------------------------------------------------------
   $strTitreApplication = "Projet 1 : Gestion des appartements";
   $strNomFichierCSS = "index.css";
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
      <option value="">Sélectionnez</option>
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
    function objb(strID) {
        return document.getElementById(strID);    
        }        
    function select(strID, valueOuText) {
        return valueOuText == undefined ? /* null fait l'affaire également */                 
        objb(strID).options[objb(strID).selectedIndex].text :                 
        objb(strID).options[objb(strID).selectedIndex].value;    
        }        
        if (document.getElementById('lblChoix'))       
        document.getElementById('lblChoix').innerHTML = select('ddlChoix'); 
</script>
</body>
</html>