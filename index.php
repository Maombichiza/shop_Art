
  <?php 
  $active='Accueil';
  include("includes/header.php");
   ?>
   <div class="container" id="slider"><!-- container Begin -->
       <div class="col-md-12"><!-- col-md-12 Begin -->
           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->   
               <ol class="carousel-indicators">                
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>                   
               </ol>     

               <div class="carousel-inner"><!-- carousel-inner Begin -->                 
                   <?php
                   $get_slides = "SELECT * FROM slider  LIMIT 0,1" ;
                   $run_slider = mysqli_query($con,$get_slides);
                   while ($row_slides=mysqli_fetch_array($run_slider)) {  
                         $slide_name = $row_slides['nom_slide'];
                         $slide_image = $row_slides['image_slide'];
                   }
                   echo "
                         <div class='item active'>
                         <img src='admin_area/slides_images/$slide_image'>
                         </div>
                       ";
                    $get_slides = "SELECT * FROM slider  LIMIT 1,3" ;
                   $run_slider = mysqli_query($con,$get_slides);
                   while ($row_slides=mysqli_fetch_array($run_slider)) {
                         $slide_name = $row_slides['nom_slide'];
                         $slide_image = $row_slides['image_slide'];
                         echo "
                         <div class='item'>
                         <img src='admin_area/slides_images/$slide_image'>
                         </div>
                         ";
                   }
                    ?>
               </div><!-- carousel-inner Finish -->
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev">                 
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Precedent</span>
               </a>
               <a href="#myCarousel" class="right carousel-control" data-slide="next">
                   <span class="sr-only">Suivant</span>
               </a>
           </div><!-- carousel slide Finish -->        
       </div><!-- col-md-12 Finish -->
   </div><!-- container Finish -->

    <div id="advantages"><!-- #advantages Begin -->
      <div class="container"><!-- container Begin -->
        <div class="same-height-row"><!-- same-height-row begin -->
          <?php 
          $get_boxes = "SELECT * FROM t_box";
          $run_boxes = mysqli_query($con,$get_boxes);
          while ($run_boxes_section=mysqli_fetch_array($run_boxes)) {
            $box_id = $run_boxes_section['id_box'];
            $box_titre = $run_boxes_section['titre_box'];
            $box_desc = $run_boxes_section['desc_box'];
           ?>
          <div class="col-sm-4"><!-- col-sm-4 begin-->
            <div class="box same-height"><!--box same-height begin -->
              <div class="icon"><!--icon begin -->
                <i class="fa fa-heart"></i>
              </div><!--icon end -->
              <h3><a href="#"><?php echo $box_titre; ?> </a></h3>
                <p><?php echo $box_desc; ?></p>
            </div><!--box same-height finish -->
          </div><!-- col-sm-4 finish-->
           <?php } ?>
           </div><!-- same-height-row finish--> 
         </div>
       
    <div id="hot">
        <div class="box">
          <div class="container">
            <div class="col-md-9">
              <h2>
                La liste de nos Produits
              </h2>
            </div>
          </div>
        </div>
      </div> 
  <div id="content" class="container"><!-- container 2 Begin -->
    <div class="row"><!-- row Begin -->  
     <?php 
     getArt();
      ?>
    </div>
    </div>
 <?php 
include("includes/footer.php");
 ?>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>
