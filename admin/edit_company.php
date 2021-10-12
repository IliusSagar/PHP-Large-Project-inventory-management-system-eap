<?php
	include "header.php";
	include "../user/connection.php";
	$id=$_GET["id"];
	$company_name="";

	$res=mysqli_query($link,"SELECT * from company_name where id=$id");
	while($row=mysqli_fetch_array($res))
	{
		$company_name=$row["company_name"];
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
												<h5>Edit Company</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-user"></i></a></li>
												<li class="breadcrumb-item"><a href="#!">Edit Company</a></li>
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

                                                <div class="col-md-12">
                                                    <form action="" method="post" name="form1">

                                                    	
                                                    	<div class="form-group">
                                                            <label>Company Name</label>
                                                            <input type="text" class="form-control" placeholder="Company Name" name="companyname" value="<?php echo $company_name; ?>">
                                                        </div>
  
                                                        
                                                        <button type="submit" class="btn btn-primary" name="submit1">Update</button>

                                                        	

                                                        	<div class="alert alert-success" id="success" style="display: none;">
                                                        		Record Updated Successfully!
                                                        	</div>
                                                        
                                                   
                                                </div>
                                                
                                                    </form>

                                                </div>

                                                 <!-- [ Contextual-table ] start -->
                                
                                       
                                    </div>
                                </div>
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
		
		
			mysqli_query($link,"UPDATE company_name set company_name='$_POST[companyname]' where id=$id") or die(mysqli_error($link));

			?>
			<script type="text/javascript">
				
				document.getElementById("success").style.display="block";
				setTimeout(function(){
					window.location="add_company.php";
				},3000);	
			</script>
			<?php
		

	}

?>	

	

<?php
	include "footer.php";
?>
