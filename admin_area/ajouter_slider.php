<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard /Ajouter slide
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Ajouter slide
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group"><!-- form-group begin -->
                        <label for="" class="control-label col-md-3">                        
                           Nom slide                
                        </label>                
                        <div class="col-md-6">
                            <input name="slide_name" type="text" class="form-control">
                        </div>
                    </div><

                    <div class="form-group">
                        <label for="" class="control-label col-md-3">
                              Image Slide
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="slide_image" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>  
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php  
    if(isset($_POST['submit'])){   
        $slide_name = $_POST['slide_name'];        
        $slide_image = $_FILES['slide_image']['name'];        
        $temp_name = $_FILES['slide_image']['tmp_name'];        
        $view_slides = "select * from slider";        
        $view_run_slide = mysqli_query($con,$view_slides);       
        $count = mysqli_num_rows($view_run_slide);        
        if($count<4){            
            move_uploaded_file($temp_name,"slides_images/$slide_image");           
            $insert_slide = "insert into slider (nom_slide,image_slide) values ('$slide_name','$slide_image')";           
            $run_slide = mysqli_query($con,$insert_slide);           
            echo "<script>alert('Le slide est ajouter avec succes ')</script>";           
            echo "<script>window.open('index.php?voir_slide','_self')</script>";           
        }else{           
           echo "<script>alert('le slide n'est pas ajouter')</script>";            
        }       
    }
?>

<?php } ?>