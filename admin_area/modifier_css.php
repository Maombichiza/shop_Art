<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 
  
  $file = "../styles/style.css";
  if (file_exists($file)) {

  	$data = file_get_contents($file);

  }

 ?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> TableauBord/ Modification de CSS
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->
<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-pencil"></i> Modification de CSS
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->

            	<form action="form-horinzotal" method="post">
            		<div class="form-group">

            			<div class="col-lg-12">
            				<textarea name="newdata" id="" cols="30" rows="15" class="form-control">

            					<?php echo $data; ?>
            					
            				</textarea>
            				
            			   </div>

            			  <div > 
            				
            			</div>
            		</div>

            		<div class="form-group">

            			<label class="control-label col-md-3"></label>
            			<div class="col-md-6">
            				<input type="submit" name="update" value="Modifier CSS" class="form-control btn btn-primary">
            			</div>
            		</div>
            		
            	</form>
                
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php

if (isset($_POST['update'])) {

	$newdata = $_POST['newdata'];

	$handle = fopen($file, "w");

	fwrite($handle, $newdata);

	fclose($handle);

	echo "<script>alert('Modification de CSS est effectuer avec Succes!!!')</script>";

	echo "<script>window.open('index.php?modifier_css',_self)</script>";
	
}
 ?>



<?php } ?>

