 <?php

  $active = 'Mon compte';
  include("includes/header.php");

  ?>
 <div id="content">
     <div class="container">
         <div class="col-md-12">
             <ul class="breadcrumb ">
                 <li>
                     <a href="index.php">Accueil</a>
                 </li>
                 <li>Enregistrement des nouveaux Membres
                 </li>
             </ul>
         </div>
         <div class="col-md-3">
             <?php
        include("includes/sidebar.php");
        ?>
         </div><!-- col-md-3 finish -->

         <div class="col-md-6">
             <!-- col-md-6 begin -->

             <div class="boxcontact">
                 <!-- box begin -->
                 <div class="box-header">
                     <!-- box-header  begin-->
                     <center>
                         <!-- center  begin-->
                         <h2> Enregistrez-vous</h2>
                         <p class="text-muted">
                             Vous pouvez cree votre compte en completant les champs ci-dessous svp

                         </p>
                     </center><!-- center  end-->
                     <form action="enregistrement.php" method="post" enctype="multipart/form-data">
                         <!-- form  begin-->
                         <div class="form-group">
                             <!-- form-group  begin-->
                             <label>Nom</label>
                             <input type="text" class="form-control" name="u_name" required></input>
                         </div><!-- form-group  finish-->
                         <div class="form-group">
                             <!-- form-group  begin-->
                             <label>Adress mail</label>
                             <input type="email" class="form-control" name="u_email" required></input>
                         </div><!-- form-group  finish-->
                         <div class="form-group">
                             <!-- form-group  begin-->
                             <label>Mot de pass</label>
                             <input type="password" class="form-control" name="u_pass" required></input>
                         </div><!-- form-group  finish-->
                         <div class="form-group">
                             <!-- form-group  begin-->
                             <label>Pays</label>
                             <input type="text" class="form-control" name="u_pays" required></input>
                         </div><!-- form-group  finish-->
                         <div class="form-group">
                             <!-- form-group  begin-->
                             <label>Ville</label>
                             <input type="text" class="form-control" name="u_ville" required></input>
                         </div><!-- form-group  finish-->
                         <div class="form-group">
                             <!-- form-group  begin-->
                             <label>Tes contacts</label>
                             <input type="text" class="form-control" name="u_contacts" required></input>
                         </div><!-- form-group  finish-->
                         <div class="form-group">
                             <!-- form-group  begin-->
                             <label>Adress</label>
                             <input type="text" class="form-control" name="u_adress" required></input>
                         </div><!-- form-group  finish-->
                         <div class="form-group">
                             <!-- form-group  begin-->
                             <label>Photo de Profil</label>
                             <input type="file" class="form-control form-height-customer" name="u_image"
                                 required></input>
                         </div><!-- form-group  finish-->

                         <div class="text-center">
                             <!-- text-center  begin-->
                             <button type="submit" name="register" class="btn btn-primary"><i class="fa fa-user-md">
                                     Enregistrer </i> </button>
                         </div><!-- text-center  finish-->

                     </form><!-- form  end-->
                 </div><!-- box-header finish-->
             </div><!-- box  finish-->
         </div><!-- col-md-6 finish -->
     </div><!-- container Finish -->
 </div><!-- content Finish -->
 <?php
  include("includes/footer.php");
  ?>
 <script src="js/jquery-331.min.js"></script>
 <script src="js/bootstrap-337.min.js"></script>
 </body>

 </html>

 <?php
  if (isset($_POST['register'])) {
    $c_nom = $_POST['u_name'];
    $c_email = $_POST['u_email'];
    $c_pass = $_POST['u_pass'];
    $c_pays = $_POST['u_pays'];
    $c_ville = $_POST['u_ville'];
    $c_contact = $_POST['u_contacts'];
    $c_adress = $_POST['u_adress'];
    $c_image = $_FILES['u_image']['name'];
    $c_image_tmp = $_FILES['u_image']['tmp_name'];
    $c_ip = getRealIpUser();
    move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");
    $insert_client = "insert into t_clients
  (client_nom,client_email,client_password,client_pays,client_ville,client_contact,client_adress,client_photo,client_ip) values
  ('$c_nom','$c_email','$c_pass','$c_pays','$c_ville','$c_contacts','$c_adress','$c_image','$c_ip')";
    $run_client = mysqli_query($con, $insert_client);
    $sel_panier = "select * from t_panier where ip_add='$c_ip'";
    $run_panier = mysqli_query($con, $sel_panier);
    $check_panier = mysqli_num_rows($run_panier);
    if ($check_panier > 0) {
      /// si l'enregistrer a des articles dans le panier//
      $_SESSION['client_email'] = $c_email;
      echo "<script>alert('$c_nom, votre Enregistrement Est effectuer avec Succes')</script>";
      echo "<script>window,open('checkout.php','_self')</script>";
    } else {
      /// si l'enregistrer sans des articles dans le panier///
      $_SESSION['client_email'] = $c_email;
      echo "<script>alert('$c_nom, votre Enregistrement Est effectuer avec Succes')</script>";
      echo "<script>window,open('index.php','_self')</script>";
    }
  }
  ?>