<?php require_once("includes/config.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>

<?php 

	// Seulement si le point focal de courrier arrivé s'est authentifié
 	if (!isset($_SESSION["id"]) || $_SESSION["id"] == "") {
		$_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Information incomplète";
		//redirect("logout.php");
		//exit;	
			
	}
	
?>
<?php 
	mysql_select_db("cop25",$conbd_sie); // SELECTION DE LA BASE DE DONNEES
	$query = "SELECT * FROM structures WHERE visible='oui'  ORDER BY nomstructure ASC";
	$result = mysql_query($query, $conbd_sie);
	confirmer_requette($result);
	$row_data = mysql_fetch_assoc($result);

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
	<head>
<!--DEBUT :: LES META -->
    <meta charset="utf-8">
    <title>SIE:: Administration : Suivi des activités de la COP25</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
	<meta name="description" content="Description">
	<meta name="keywords" content="Keywords">
    <!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!--FIN :: LES META -->

	<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->  
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    
<!--DEBUT :: Template CSS ET SCRIPT-->    
    <link rel="stylesheet" href="style.css" media="screen">
	<link rel="stylesheet" href="layout.css" media="screen">
    <link rel="stylesheet" href="style.responsive.css" media="all">
    <link rel="stylesheet" href="style2.css" media="screen">
	
	<!--CSS prioritaire sur style.css-->
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>
<!--FIN :: Template CSS ET SCRIPT-->

<!--DEBUT :: BOOTSTRAP CSS et SCRIPT-->  
 
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- SweetAlert  style -->
    <link rel="stylesheet" href="plugins/sweetalert/sweetalert.css">

    <!-- responsive datatables -->
     <link rel="stylesheet" href="plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">

	
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	
</head>
    <body>
        <div id="sie-main">
            <header class="sie-header">
                <div class="sie-shapes">
                </div>
			</header>
        <?php // include("includes/menu_horizontal.php"); ?>
            <div class="sie-sheet clearfix">
                        <div class="sie-layout-wrapper">
                            <div class="sie-content-layout">
                                <div class="sie-content-layout-row">
                                    <?php //include("includes/left_side.php"); ?>
                                    <div class="sie-layout-cell sie-content">
                                    	<article class="sie-post sie-article">                                  
                          					<div class="sie-postcontent sie-postcontent-0 clearfix"><div class="sie-content-layout">
                <div class="sie-content-layout-row">
                <div class="sie-layout-cell layout-item-1" style="width: 100%" >
				<table width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr>
  	<td style="text-align:left"><span style="font-size: 13px; font-weight: bold; text-transform: uppercase;">MODULE: <?php echo $_SESSION["mod_modulename"]; ?></span><span> -- <?php echo $_SESSION['nomprenom']; ?></span><span> -- <?php echo "edit: ".$_SESSION['rr_edit']; ?></span> <span> -- <?php echo "delete: ".$_SESSION['rr_delete']; ?></span><span> -- <?php echo "Add: ".$_SESSION['rr_create']; ?></span></td>
    <td style="text-align:right"> <a  href="http://sie.environnement.gouv.ci/sieapp2/logout.php" role="button"> <span ><i class="fa fa-sign-out"></i> Se déconnecter</span></a> </td>
  </tr>
  
</table>
                    
                </div>
                </div>
            </div>
            <div class="sie-content-layout-br layout-item-0">
            </div></div>
            <?php if (!$ERROR_MSG == "") { ?>
            <hr width="100%" color="blue"> 
					<div class="callout callout-info">
espace<br>
<!--Espace d'affichage info dynamique telle que ERREUR! AVERTISSEMENT! ...etc -->
               
    			<div class="alert alert-<?php echo $ERROR_TYPE ?> alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="fa fa-ban"></i> Alert!</h4>
                    <p><?php echo $ERROR_MSG; ?></p>
                  </div>
                  </div>
				  <hr width="100%" color="blue"> 
				  <?php } ?><!--Fin MSG dynamique-->
                     
			     <div class="box">
			<p>
                 <a class="btn btn-primary" href="admin_cop25.php" role="button">Retour à la page structure </a>
				 
				<?php 
                    if($_SESSION["rr_create"]=='yes'){
                        echo '<button type="submit" class="btn btn-success " id="chrono_actu" name="chrono_actu"><i class="fa fa-plus"></i> Ajout de fichier </button>';
                        echo '<button type="submit" class="btn btn-default " id="btnadd_suiviCop" name="btnadd_suiviCop"><i class="fa fa-plus"></i> Ajouter une activité </button>';
                    }else{
                        echo '<button type="submit" class="btn btn-success " id="chrono_actu" name="chrono_actu" disabled ><i class="fa fa-plus"></i> Ajout de fichier </button>';
                        echo '<button type="submit" class="btn btn-default " id="btnadd_suiviCop" name="btnadd_suiviCop" disabled><i class="fa fa-plus"></i> Ajouter une activité </button>';
                    }
                ?> 
                
					</p>

                <div class="box-body">

                                    
                                      <table id="table_data" class="datatable" >
                  <thead>
                      <tr class="tableheader">	
                        <th >#</th>
                        <th> ****** Structure participant *****</th>
						<th> ******** Type d'activite ********</th>
						<th>***** Désignation de l'activité *****</th>
						<th>Organisateur de l'évènement</th>
						<th>********** Lieu **********</th>
                        <th>***** Nom Responsable activité *****</th>
                        <th> Date début </th>
						<th>Heure début</th>
						<th> Date Fin </th>
                        <th>Heure fin</th>
						<th>********** Observation **********</th> 
						
						<th>Fichier <br/>Rapport / Présentation</th>
						<th>Actions</th>
                      </tr>
                    </thead>
					<tbody>
					</tbody>
                    </table>
  							  
</div> </div> 									
           								</article>
                               		</div>
                                                                         </div>
                            </div>
                        </div>
                       						
						<?php include('modal/modal_suivi_activite_cop25.php'); ?>
              
                        <?php include("includes/footer.php"); ?>

                </div>
            <p class="sie-page-footer">
                <span id="sie-footnote-links">Designed by SIE.</span>
                <span id="sie-licence-links">2014-2019</span>
            </p>
        </div> 
		<script src="web_admin_suivi_activite_cop25.js"></script> 

 <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>


    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- SweetAlert -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Bootstrap-notify -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

	    <!-- Bootstrap-select -->
  <link rel="stylesheet" href="dist/css/bootstrap-select.css">
  <script src="dist/js/bootstrap-select.js"></script>     
    <!-- Select2 -->  
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
	<script src="plugins/select2/select2.full.min.js"></script>
    <!-- extra plugins -->	
	<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js "></script>

	<script src="plugins/editor/dataTables.editor.min.js"></script>	

    <!-- InputMask 
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>-->
	<script src="plugins/input-mask/sie_inputmask.js"></script>
	
      <!--BOUTON DATATTABLE-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
 	<link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
	
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> 

	<!-- Select ROWS AND COLUMNS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">	
	<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>


    <!-- bootstrap time picker 
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>-->
    <!-- Page script -->
	
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".sel_struct").select2();
		$(".select_type").select2();
		$(".select_type_struct").select2();
      });
	          //Timepicker
        // $(".timepicker").timepicker({
			// showInputs: true,
			// timeFormat: 'HH:m:s'
        // });
    </script>
	
    <script>	
		// $(":input").inputmask();
		// $("#inputCC").inputmask('9999 9999 9999 9999', { placeholder: '____ ____ ____ ____' });
		// $("#inputDate").inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
		// $("#inputEmail").inputmask({ alias: "email" });
		// $("#inputIP").inputmask('999.999.999.999', { placeholder: '___.___.___.___' });
		// $("#inputSK").inputmask('****-****-****-****', { placeholder: '____-____-____-____' });
		// $("#inputDollar").inputmask('99,99 $', { placeholder: '__,__ $' });
		
		$("#heure_debut").inputmask('hh:mm', { placeholder: '__:__ _m', alias: 'time24', hourFormat: '24' });	
		$("#heure_fin").inputmask('hh:mm', { placeholder: '__:__ _m', alias: 'time24', hourFormat: '24' });	
    </script>	

	<script>
	  $(function() {
		$('#visible').bootstrapToggle({
		  on: 'Oui',
		  off: 'Non'
		});
	  })
	</script>
	<script>
	  $(function() {
		$('#visible').change(function() {
		})
	  })
	</script>	
	
	<script>
	function showDemandeurs(sel) {
		var structureId = sel.options[sel.selectedIndex].value;
		$("#demandeurs").html("");
		if (structureId.length > 0) {
			// alert(structureId);
			$.ajax({
				type: "POST",
				url: "fetch_cop25_demandeursByStruct.php",
				data: "structureId=" + structureId,
				cache: false,
				beforeSend: function() {
					$('#demandeurs').html('<img src="loader.gif" alt="" width="24" height="24">');
				},
				success: function(html) {
					$("#demandeurs").html(html);
				}
			});
		}
	}

        </script>

    </body>

</html>


    <?php
		mysql_free_result($result);
	?>