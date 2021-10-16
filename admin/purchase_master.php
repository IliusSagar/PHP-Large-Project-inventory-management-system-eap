<?php
	include "header.php";
	include "../user/connection.php";
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
												<h5>Add New Purchase</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-user"></i></a></li>
												<li class="breadcrumb-item"><a href="#!">New User Purchase</a></li>
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
                                            <div class="row d-flex justify-content-center">

                                                <div class="col-md-8 ">
                                                    <form action="" method="post" name="form1">

                                                    	<div class="form-group">
                                                            <label>Select Company:</label>
                                                            <select class="form-control" name="company_name" id="company_name" onchange="select_company(this.value)">
                                                            	<option>Select</option>
                                                            	<?php
                                                            	$res=mysqli_query($link,"SELECT * from company_name");
                                                            	while($row=mysqli_fetch_array($res))
                                                            	{
                                                            		echo "<option>";
                                                            		echo $row["company_name"];
                                                            		echo "</option>";
                                                            	}

                                                            	?>
                                                            </select>
                                                        </div>
                                                    	
                                                    	

                                                        <div class="form-group" >
                                                            <label>Select Product Name</label>
                                                            <!-- <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name"> -->
                                                            <div id="product_name_div">
                                                            	<select class="form-control"  >
                                                            		<option>Select</option>
                                                            	</select>
                                                            </div>
                                                        </div>

														<div class="form-group">
                                                            <label>Select Unit:</label>
                                                            <div id="unit_div">
															<select class="form-control" >
                                                            	<option>Select</option>
                                                            </select>
															</div>
                                                        </div>

														<div class="form-group">
                                                            <label>Enter Packing Size</label>
                                                            <div id="packing_size_div">
															<select class="form-control">
                                                            	<option>Select</option>
                                                            </select>
															</div>
                                                        </div>
  
                                                        
                                                        
                                                        
                                                   
                                                <!-- </div> -->

                                                <!-- <div class="col-md-6"> -->
                                                	

                                                        <div class="form-group">
                                                            <label>Enter Qty</label>  
                                                            	<input type="text" name="qty" class="form-control" value="0">   
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Enter Price</label>  
                                                            	<input class="form-control" value="0">   
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Select Party Name</label>
                                                            <select class="form-control" name="party_name">
                                                            	<?php
																$res=mysqli_query($link,"SELECT * from party_info");
																while($row=mysqli_fetch_array($res))
																{
																	echo "<option>";
																	echo $row["businessname"];
																	echo "</option>";
																}
																?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Select Purchase Type</label>
                                                            <select class="form-control" name="purchase_type">
                                                            	<option>Cash</option>
                                                            	<option>Debit</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Expiry Date</label>  
                                                            	<input type="text" name="expiry_date" class="form-control" placeholder="YYYY-MM-DD" required pattern="\d{4}-\d{2}-\d{2}">   

                                                        </div>
														
														<button type="submit" class="btn btn-primary" name="submit1">Purchase Now</button>

                                                        	

                                                        <div class="alert alert-success" id="success" style="display: none;">
                                                        	Purchase Inserted Successfully!
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


	<script type="text/javascript">

		function select_company(company_name)
		{
			var xmlhttp = new XMLHttpRequest ();
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("product_name_div").innerHTML=xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "forajax/load_product_using_company.php?company_name="+company_name, true);
			xmlhttp.send();


		}

		function select_product(product_name,company_name)
		{
			var xmlhttp = new XMLHttpRequest ();
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("unit_div").innerHTML=xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "forajax/load_unit_using_products.php?product_name="+product_name+"&company_name="+company_name, true);
			xmlhttp.send();
			
			
		}

		function select_unit(unit,product_name,company_name)
		{
			var xmlhttp = new XMLHttpRequest ();
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("packing_size_div").innerHTML=xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "forajax/load_packingsize_using_unit.php?unit="+unit+"&product_name="+product_name+"&company_name="+company_name, true);
			xmlhttp.send();
		}

	</script>

<?php

	if(isset($_POST["submit1"]))
	{
		mysqli_query($link,"INSERT into purchase_master values(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]','$_POST[qty]','$_POST[price]','$_POST[party_name]','$_POST[purchase_type]','$_POST[expiry_date]')") or die(mysqli_error($link));

		$count=0;
		$res=mysqli_query($link,"SELECT * from stock_master where product_company='$_POST[company_name]' && product_name='$_POST[product_name]' && product_unit='$_POST[unit]'");
		$count=mysqli_num_rows($res);

		if($count==0)
		{
			mysqli_query($link,"INSERT into stock_master values(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[qty]','0')") or die(mysqli_error($link));
		}
		else{
			mysqli_query($link,"UPDATE stock_master set product_qty=product_qty+$_POST[qty] where product_company='$_POST[company_name]' && product_name='$_POST[product_name]' && product_unit='$_POST[unit]'") or die(mysqli_error($link));
		}
		?>

		<script type="text/javascript">
			document.getElementById("success").style.display="block";
		</script>

		<?php

	}

?>	

	

<?php
	include "footer.php";
?>
