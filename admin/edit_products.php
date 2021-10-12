<?php
	include "header.php";
	include "../user/connection.php";
	$id=$_GET["id"];

	$company_name="";
	$product_name="";
	$unit="";
	$packing_size="";

	$res=mysqli_query($link,"SELECT * from products where id=$id");
	while($row=mysqli_fetch_array($res))
	{
		$company_name=$row["company_name"];
		$product_name=$row["product_name"];
		$unit=$row["unit"];
		$packing_size=$row["packing_size"];
	}
?>


	<!-- [ Main Content ] start -->
	<div class="pcoded-main-container">
		<div class="pcoded-wrapper">
			<div class="pcoded-content">
				<div class="pcoded-inner-content">
					<div class="main-body">
						<div class="page-wrapper">
							<!-- [ breadcrumb ] start -->
							<div class="page-header">
								<div class="page-block">
									<div class="row align-items-center">
										<div class="col-md-12">
											<div class="page-header-title">
												<h5>Edit Products</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-user"></i></a></li>
												<li class="breadcrumb-item"><a href="#!">Edit Products</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- [ breadcrumb ] end -->
							<!-- [ Form Content ] start -->
							
							<div class="row">
                                <!-- [ form-element ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                       <!--  <div class="card-header">
                                            <h5>Add New User</h5>
                                        </div> -->
                                        <div class="card-body">
                                            <!-- <h5>Add New User</h5> -->
                                            <hr>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <form action="" method="post" name="form1">

                                                    	<div class="form-group">
                                                            <label>Select Company:</label>
                                                            <select class="form-control" name="company_name">
                                                            	<?php
                                                            	$res=mysqli_query($link,"SELECT * from company_name");
                                                            	while($row=mysqli_fetch_array($res))
                                                            	{
                                                            		?>
                                                            		<option <?php if($row["company_name"]==$company_name) {echo "selected";} ?>>
                                                            		<?php
                                                            		echo $row["company_name"];
                                                            		echo "</option>";
                                                            	}

                                                            	?>
                                                            </select>
                                                        </div>
                                                    	
                                                    	

                                                        <div class="form-group">
                                                            <label>Enter Product Name</label>
                                                            <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" value="<?php echo $product_name; ?>">
                                                        </div>
  
                                                        
                                                        <button type="submit" class="btn btn-primary" name="submit1">Submit</button>

                                                        	<div class="alert alert-danger" id="error" style="display: none;">
                                                        		This Product is Already Exist! Please Try Another.
                                                        	</div>

                                                        	<div class="alert alert-success" id="success" style="display: none;">
                                                        		Record Updated Successfully!
                                                        	</div>
                                                        
                                                   
                                                </div>

                                                <div class="col-md-6">
                                                	<div class="form-group">
                                                            <label>Select Unit:</label>
                                                            <select name="unit" id="" class="form-control" name="unit">
                                                            	<?php
                                                            	$res=mysqli_query($link,"SELECT * from units");
                                                            	while($row=mysqli_fetch_array($res))
                                                            	{
                                                            		?>
                                                            		<option <?php if($row["unit"]==$unit) {echo "selected";} ?>>
                                                            		<?php
                                                            		echo $row["unit"];
                                                            		echo "</option>";
                                                            	}

                                                            	?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Enter Packing Size</label>
                                                            <input type="text" name="packing_size" class="form-control" placeholder="Enter Packing Size" value="<?php echo $packing_size; ?>">
                                                        </div>
                                                </div>
                                                
                                                    </form>

                                                </div>

                                                 <!-- [ Contextual-table ] start -->
                           
                                <!-- [ Contextual-table ] end -->

                                            </div>
                                         </div>
                                       </div>
                                   </div>

							<!-- [ Form Content ] end -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- [ Main Content ] end -->

<?php

	if(isset($_POST["submit1"]))
	{
		
		$count=0;
		$res=mysqli_query($link,"SELECT * from products where company_name='$_POST[company_name]' && product_name='$_POST[product_name]' && unit='$_POST[unit]' && packing_size='$_POST[packing_size]'") or die(mysqli_error($link));
		$count=mysqli_num_rows($res);

		if($count>0)
		{
			?>
			<script type="text/javascript">
				document.getElementById("success").style.display="none";
				document.getElementById("error").style.display="block";
			</script>
			<?php
		}
		else{
			//mysqli_query($link,"INSERT into products values(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]')") or die(mysqli_error($link));
			mysqli_query($link,"UPDATE products set company_name='$_POST[company_name]',product_name='$_POST[product_name]',unit='$_POST[unit]',packing_size='$_POST[packing_size]' where id=$id") or die(mysqli_error($link));

			?>
			<script type="text/javascript">
				document.getElementById("error").style.display="none";
				document.getElementById("success").style.display="block";
				setTimeout(function(){
					window.location="add_products.php";
				},1000);	
			</script>
			<?php
		}

	}

?>	

	

<?php
	include "footer.php";
?>
