<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> TableauBord/ Voir Paiement
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Voir Paiement
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th>No: </th>
                                <th> No Invoice: </th>
                                <th> Montant payé:  </th>
                                <th> Methode: </th>
                                <th> Refference No: </th>
                                <th> Code Paiement: </th>
                                <th> Date Paiement: </th>
                                <th> Supprimer Paiement: </th>
                                
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_paiement = "select * from t_paiement";
                                
                                $run_paie = mysqli_query($con,$get_paiement);
          
                                while($row_paie=mysqli_fetch_array($run_paie)){
                                    
                                    $paie_id = $row_paie['paie_id'];
                                    
                                    $invoice_no = $row_paie['invoice_no'];
                                    
                                    $montant = $row_paie['montant'];
                                    
                                    $mode_paie = $row_paie['mode_paie'];
                                    
                                    $ref_no = $row_paie['ref_no'];
                                    
                                    $code = $row_paie['code'];

                                    $paie_date = $row_paie['paie_date'];
                                    
                                    $i++;
                            
                            ?>

                            <tr>
                                <td><?php echo $paie_id; ?></td>
                                <td><?php echo $invoice_no ; ?></td>
                                <td><?php echo $montant; ?>$</td>
                                <td><?php echo $mode_paie; ?></td>
                                <td><?php echo $ref_no; ?></td>
                                <td><?php echo $code; ?></td>
                                <td><?php echo $paie_date; ?></td>
                                
                                <td>
                                    <a href="index.php?supprimer_paiement=<?php echo $paie_id; ?>">
                                     <i class="fa fa-trash-o"></i>
                                    Supprimer</a> 
                                </td>

                            </tr>

                        <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>