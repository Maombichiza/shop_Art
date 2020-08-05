
<?php 
session_start();

if (!isset($_SESSION['client_email'])) {

  echo "<script>window.open(../checkout.php)</script>";

}else{

include("includes/dbconn.php");
include("functions/fonctions.php");

if (isset($_GET['order_id'])) {

  $order_id = $_GET['order_id'];
  
}

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>P-Shop-Art</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body> 
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">

               <?php 

               if (!isset($_SESSION['client_email'])) {

                echo "Bienvenue : Utilisateur";

               }else{

                echo "Bienvenue: ". $_SESSION['client_email'] . "";
               }

                ?>

                </a>

               <a href="checkout.php"><?php articles(); ?> article dans votre panier | Prix Total: <?php prix_totals(); ?> </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="../enregistrement.php">Enregistrement</a>
                   </li>
                   <li>
                       <a href="customer/mon_compte.php">Mon Compte</a>
                   </li>
                   <li>
                       <a href="../panier.php">Aller au Panier</a>
                   </li>
                   <li>
                       <a href="../checkout.php">
                <?php 

               if(!isset($_SESSION['client_email'])) {

                     echo "<a href='checkout.php'> Se Connecter </a>";

               }else{

                    echo "<a href='checkout.php'> Se Deconnecter </a>";
               }

                ?>
                       </a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->     
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                   <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li class="<?php if($active=='Accueil') echo"active"; ?>">
                           <a href="../index.php">Accueil</a>
                       </li>
                       <li class="<?php if($active=='Boutique') echo"active"; ?>">
                           <a href="../shop.php">Boutique</a>
                       </li>
                      <li class="<?php if($active=='Mon compte') echo"active"; ?>">
                           
                           <?php 

                           if(!isset($_SESSION['client_email'])){
                             
                             echo "<a href='../checkout.php'>Mon compte</a>";

                           }else{

                              echo "<a href='customer/mon_compte.php?my_orders'>Mon compte</a>";


                           }


                            ?>

                       </li>
                      <li class="<?php if($active=='Panier') echo"active"; ?>">
                           <a href="../panier.php">Panier</a>
                       </li>
                       <li class="<?php if($active=='Contact-nous') echo"active"; ?>">
                           <a href="../contact.php">Contact-nous</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="../panier.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php articles(); ?> article dans votre Panier</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Rechercher</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->     
   </div><!-- navbar navbar-default Finish -->
   <div id="content"><!-- content begin -->
      <div class="container"><!-- container begin -->
        <div class="col-md-12"><!-- col-md-12 begin -->
          <ul class="breadcrumb "><!-- breadcrumb begin -->
            <li>
            <a href="index.php">Accueil</a>
            </li>
            <li>Boutique</li>
          </ul><!-- breadcrumb finish -->
          
        </div> <!-- col-md-12 Finish -->

  <div class="col-md-3"><!-- col-md-3 begin -->

<?php 
include("includes/sidebar.php");
 ?>

 </div><!-- col-md-3 finish -->
<div class="col-md-9 "><!-- col-md-9 begin -->

  <div class="box"><!-- cbox finish -->
    
<h1 align="center">Svp Confirmer ton Paiement</h1>

<form action="Confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data" >
  <div class="form-group">
    <label>
      No Facture
    </label>
    <input type="text" class="form-control" name="numero_factur" required>
  </div>
   <div class="form-group">
    <label>
      Montant envoyer
    </label>
    <input type="text" class="form-control" name="montants" required>
  </div>
   <div class="form-group">
    <label>
      Selectionne le mode de paiement
    </label>
 <select  name="mode_paiee" class="form-control">
  <option>Selectionne le Mode de Paiement</option>  
  <option>Paypal</option>
 </select>
  </div>
  <div class="form-group">
    <label>
      Transaction /Refference Code :
    </label>
    <input type="text" class="form-control" name="refe_no" required>
  </div>
  <div class="form-group">
    <label>
      Code Secret 
    </label>
    <input type="text" class="form-control" name="codee" required>
  </div>
    <label>
      Date de Paiement
    </label>
    <input type="text" class="form-control" name="paiem_datee" required>
  </div>

<div class="text-center">

  <button class="btn btn-primary btn-lg" name="confirm_paiement">

    <i class="fa fa-user-md"></i>Confirmer votre Paiement svp!
  </button>

</div>
</form>

<?php 

if (isset($_POST['confirm_paiement'])) {

  $update_id = $_GET['update_id'];

  $invoice_no = $_POST['numero_factur'];

  $montant = $_POST['montants'];

  $paie_mode = $_POST['mode_paiee'];

  $ref_no = $_POST['refe_no'];

  $code = $_POST['codee'];

  $paie_date = $_POST['paiem_datee'];

  $complete = "Deja Payer";

  $insert_paiement = "insert into t_paiement (invoice_no,montant,mode_paie,ref_no,code,paie_date) values ('$invoice_no','$montant','$paie_mode','$ref_no','$code','$paie_date')";

  $run_paiemenet = mysqli_query($con,$insert_paiement);

  $update_client_order = "update t_client_orders set order_stutus='$complete' where order_id='$update_id'";

  $run_client_order = mysqli_query($con,$update_client_order);

  $update_pending_order = "update t_pending_orders set order_stutus='$complete' where order_id='$update_id'";

  $run_pending_order = mysqli_query($con,$update_pending_order);

  if ($run_pending_order) {

    echo "<script>alert('Merci davoir Acheter, ta permiession sera completer dans 24 heurs')</script>";

    echo "<script>window.open('mon_compte.php?my_orders','_self')</script>";
   
  }
}
 ?>
  </div><!-- box finish -->
  
</div> <!-- col-md-9 finish -->

 </div><!-- container Finish -->
</div><!-- content Finish -->
   <?php 
include("includes/footer.php");
 ?>
   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>
</body>
</html>

<?php } ?>