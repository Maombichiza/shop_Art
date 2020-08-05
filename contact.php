<?php 

 $active='Contact-nous';
  include("includes/header.php");

   ?>

   <div id="content"><!-- content begin -->
     	<div class="container"><!-- container begin -->
     		<div class="col-md-12"><!-- col-md-12 begin -->
     			<ul class="breadcrumb "><!-- breadcrumb begin -->
     				<li>
     				<a href="index.php">Accueil</a>
     				</li>
     				<li>Contactez-nous
            </li>
     			</ul><!-- breadcrumb finish -->
     			
     		</div> <!-- col-md-12 Finish -->

     		<div class="col-md-3"><!-- col-md-3 begin -->

  <?php 
include("includes/sidebar.php");
 ?>
     		</div><!-- col-md-3 finish -->

<div class="col-md-6"><!-- col-md-6 begin -->

            <div class="boxcontact"><!-- box begin -->
              <div class="box-header"><!-- box-header  begin-->
                <center><!-- center  begin-->
                  <h2> Passer  Contact Gratuit</h2>
                  <p class="text-muted">
                    Si tu a n'importe quel suggestion, Contact-nous gratuitrment, Notre Saervice client travail <strong>24/24</strong> 
                    
                  </p>
                   </center><!-- center  end-->
                  <form action="contact.php" method="post"><!-- form  begin-->
                    <div class="form-group"><!-- form-group  begin-->
                      <label>Nom</label>
                      <input type="text" class="form-control" name="name" required></input>
                    </div><!-- form-group  finish-->
                    <div class="form-group"><!-- form-group  begin-->
                      <label>Email</label>
                      <input type="text" class="form-control" name="email" required></input>
                    </div><!-- form-group  finish-->
                    <div class="form-group"><!-- form-group  begin-->
                      <label>Suggestion</label>
                      <input type="text" class="form-control" name="suggestion" required></input>
                    </div><!-- form-group  finish-->
                    <div class="form-group"><!-- form-group  begin-->
                      <label>Message</label>
                      <textarea name="message" class="form-control"></textarea>
                    </div><!-- form-group  finish-->

                    <div class="text-center" ><!-- text-center  begin-->
                      <button  type="submit" name="submit" class="btn btn-primary"><i class="fa fa-user-md">  Envoyer  le message</i> </button>

                    </div><!-- text-center  finish-->
                  </form><!-- form  end-->

                  <?php
                  if (isset($_POST['submit'])) {
                    
                  /// Admnin receive message with ///

                  $sender_name = $_POST['name'];

                  $sender_email = $_POST['email'];

                  $sender_suggestion = $_POST['suggestion'];

                  $sender_message = $_POST['message'];

                 $receive_email = "chizampenzi01@gmail.com";

                 mail($receive_email,$sender_name,$sender_suggestion,$sender_message,$sender_email);

                 /// auto reply to sender with this///

                 $email = $_POST['email'];

                 $subject = "Bienvenu sur mon Site Web";

                 $msg = "Merci de nous avoir Envoyer ce Message. Nous allons";

                 $from ="chizaisrael@gmail.com";

                 mail($email,$subject,$msg,$from);


                 echo "<h2>ali Votre Message est Envoyer avec Succes</h2>";


                  }

                   ?>
              
                
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