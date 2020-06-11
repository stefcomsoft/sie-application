<?php require_once("includes/config.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>

<?php 

	// Seulement si le point focal de courrier arrivé s'est authentifié
 	if (!isset($_SESSION["id"]) || $_SESSION["id"] == "") {
			 $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Information incomplète";
		redirect("logout.php");
		exit;	
			
	}/*elseif($_SESSION['mod_modulename']!="Administration"){
			// Ce n'est pas le veritable point focal de ce module
		$_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Information incomplète";
			redirect("logout.php");
			exit;			
		}		
*/
?>


<!DOCTYPE html>
<html dir="ltr" lang="en-US">
	<head>
<!--DEBUT :: LES META -->
    <meta charset="utf-8">
    <title>SIE:: Administration COP 24</title>
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

    <!-- SweetAlert  style -->
    <link rel="stylesheet" href="plugins/sweetalert/sweetalert.css">

    <!-- responsive datatables -->
     <link rel="stylesheet" href="plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">

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
  	<td style="text-align:left"><span style="font-size: 13px; font-weight: bold; text-transform: uppercase;">MODULE: <?php echo $_SESSION['mod_modulename']; ?></span><span> -- <?php echo $_SESSION['nomprenom']; ?></span></td>
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
				<!--button type="submit" class="btn btn-succes " id="btnassignation" name="btnassignation"><i class="fa fa-plus"></i> Assignation de modules </button -->
                 <a class="btn btn-primary" href="admin_participants_cop24.php" role="button">Gestion des participants</a>
                <!--a class="btn btn-primary" href="modules.php" role="button">Gestion des modules</a>               				
				<a class="btn btn-primary" href="programmes.php" role="button">Cartographie des programmes</a>
				<a class="btn btn-primary" href="ministere/structures_admin.php" role="button">Gestion des structures</a -->
				<!-- <a class="btn btn-primary" href="http://sie.environnement.gouv.ci/sieapp2/assignation_modules.php" role="button">Assignation de modules</a>-->
				<!--<button type="submit" class="btn btn-primary " id="btnadd_module" name="btnadd_module"><i class="fa fa-plus"></i> Ajout de modules </button>
				<button type="submit" class="btn btn-primary " id="btnadd_droit" name="btnadd_droit"><i class="fa fa-plus"></i> Assignation de modules </button>-->
                 <br>
                 <br>
                <div class="box-body">

                                    
                                      <table id="table_data" class="datatable" >
                  <thead>
                      <tr class="tableheader">
                        <th >#</th>
						<th >statut structure</th> 
                        <th> ****** Nom structure *****</th>    
                        <th>Téléphone structure</th>
                        <th>Email structure</th>
                        <th>Financement</th>
                        <th>Adresse géographique</th>
						<th> ****** Raisons de la participation  *****</th>
						<th> ***** Personne contact *****</th>
						<th >Téléphone contact</th>
						<th >*** Email contact ***</th>
						<th>Date enregister</th> 
						<th>Actions</th>
                      </tr>
                    </thead>
                    </table>
  							  
</div> </div> 									
           								</article>
                               		</div>
                                                                         </div>
                            </div>
                        </div>
                       
						<?php //include('modal/modal_assignation.php'); ?>
                       
        
        <!-- /.modal -->
                        
              
                        <?php include("includes/footer.php"); ?>

                </div>
            <p class="sie-page-footer">
                <span id="sie-footnote-links">Designed by SIE.</span>
                <span id="sie-licence-links">2014-2019</span>
            </p>
        </div> 
		<script src="web_admin_cop24.js"></script> 


    <!-- Page script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

      });
    </script>
	
	<script>
                    function showModule(sel) {
                        var userid = sel.options[sel.selectedIndex].value;
                        $("#output1").html("");
                        $("#output2").html("");
						$("#output3").html("");
                        if (userid.length > 0) {

                            $.ajax({
                                type: "POST",
                                url: "fetch_modules_assignation.php",
                                data: "userid=" + userid,
                                cache: false,
                                beforeSend: function() {
                                    $('#output1').html('<img src="loader.gif" alt="" width="24" height="24">');
                                },
                                success: function(html) {
                                    $("#output1").html(html);
                                }
                            });
                        }
                    }

					
                    function showpassword(sel) {
                        var userid = sel.options[sel.selectedIndex].value;
                        if (userid.length > 0) {
                            $.ajax({
                                type: "POST",
                                url: "fetch_password_assignation.php",
                                data: "userid=" + userid,
                                cache: false,
                                beforeSend: function() {
                                    $('#output2').html('<img src="loader.gif" alt="" width="24" height="24">');
                                },
                                success: function(html) {
                                    $("#output2").html(html);
                                }
                            });
                        } else {
                            $("#output2").html("");
                        }
                    
                    }
        </script>

    </body>

</html>


    <?php
mysql_free_result($rs_user);

mysql_free_result($rs_modules);

mysql_free_result($rs_rr);
?>