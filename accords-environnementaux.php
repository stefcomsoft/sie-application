<?php 
 require_once('includes/config.php');
?>
<?php 

	/* Seulement si l'utilisateur s'est authentifié
	if (!isset($_SESSION["id"]) || $_SESSION["id"] == "") {
			redirect("login.php");
			exit;
	}*/
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
	<head>
<!--DEBUT :: LES META -->
    	<meta charset="utf-8">
    <title>SIE:: Accords environnementaux</title>
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
    <link rel="stylesheet" href="style2.css" media="screen"><!--CSS prioritaire sur style.css-->
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>
<!--FIN :: Template CSS ET SCRIPT-->

<!--DEBUT :: BOOTSTRAP CSS et SCRIPT-->  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">  
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
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- SweetAlert -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Bootstrap-notify -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    
    <!--FIN :: autres CSS-->

  
</head>
    <body>
        <div id="sie-main">
            <header class="sie-header">
                <div class="sie-shapes">
                </div>
			</header>
        <?php include("includes/menu_horizontal.php"); ?>
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
  	<td style="text-align:left"><span style="font-size: 13px; font-weight: bold; text-transform: uppercase;">SIE:: Accords environnementaux</span></td>
    <td style="text-align:right"><a  href="http://sie.environnement.gouv.ci/sieapp2/sie-login.php" role="button"> <span ><i class="fa fa-lock"></i> Accès coordination</span></a></td>
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
                <div class="box-body">
                 <!-- <button type="submit" class="btn btn-primary " id="btnadd" name="btnadd" disabled><i class="fa fa-plus"></i> Nouvel enregistrement </button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Launch Default Modal</button>
                 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">Launch Info Modal</button>
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">Launch Info Modal</button>-->
                 <br>
                 <br>
                              
                  <table id="table_data" class="datatable" style="max-width:100%" >
                      <thead>
                          <tr>
                            <th style="width:120px">N°</th>
                            <th style="width:150px">Nom de l'Accord environnemantal</th>
                            <th style="width:130px">Type Accord</th>
                            <th style="width:180px">Date de mise <br/>en place</th>          
                            <th style="width:180px">Date entrée <br/>en vigueur</th>
                            <th style="width:150px">Lieu de la Convention</th>
                            <th style="width:380px">Attributions  de l'accord/convention/protocole</th>
                            <th style="width:130px">Statut du Pays</th>
                            <th style="width:180px">Date de ratification</th> 
                            <th style="width:160px">Point focal National</th>          
                            <th style="width:160px">Contact Point focal</th>
                            <th style="width:120px">Fréq Réunion</th>
                            <th style="width:150px">Thématique</th>
                            <th style="width:150px">Site web de l'accord</th>
                            <th style="width:150px">Actions</th>       
                          </tr>
                        </thead>
                        </table>
    							  
</div> </div> 									
           								</article>
                               		</div>
                                                                         </div>
                            </div>
                        </div>
                        <?php include('modal/modal_accords.php'); ?>
                       
        
        <!-- /.modal -->
                        
              
                        <?php include("includes/footer.php"); ?>

                </div>
            <p class="sie-page-footer">
                <span id="sie-footnote-links">Designed by SIE.</span>
                
            </p>
        </div> 
		<script src="webapp_accords.js"></script> 
    </body>
</html>