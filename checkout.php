 <?php

  $active = 'Mon compte';
  include("includes/header.php");

  ?>
 <div id="content">
     <!-- content begin -->
     <div class="container">
         <!-- container begin -->
         <div class="col-md-12">
             <!-- col-md-12 begin -->
             <ul class="breadcrumb ">
                 <!-- breadcrumb begin -->
                 <li><a href="index.php">Accueil</a></li>
                 <li>Enregistrement des nouveaux Membres
                 </li>
             </ul><!-- breadcrumb finish -->
         </div> <!-- col-md-12 Finish -->
         <div class="col-md-3">
             <!-- col-md-3 begin -->
             <?php
        //include("includes/sidebar.php");
        ?>
         </div><!-- col-md-3 finish -->
         <div class="col-md-9">
             <?php

        if (!isset($_SESSION['client_email'])) {
          include("customer/client_login.php");
        } else {
          include("option_payement.php");
        }
        ?>
         </div>
     </div><!-- container Finish -->
 </div><!-- content Finish -->
 <?php
  include("includes/footer.php");
  ?>
 <script src="js/jquery-331.min.js"></script>
 <script src="js/bootstrap-337.min.js"></script>
 </body>

 </html>