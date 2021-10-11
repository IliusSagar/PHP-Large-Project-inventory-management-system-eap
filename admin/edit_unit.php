<?php
	include "header.php";
	include "../user/connection.php";
	$id=$_GET["id"];

	$unit="";
	

	$res=mysqli_query($link,"SELECT * from units where id=$id");
	while($row=mysqli_fetch_array($res))
	{
		$unit=$row["unit"];
		
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
												<h5>Edit Unit</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
												<li class="breadcrumb-item"><a href="#!">Edit Unit</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- [ breadcrumb ] end -->
							<!-- [ Main Content ] start -->
							
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
                                                            <label>Unit Name</label>
                                                            <input type="text" class="form-control" placeholder="Unit Name" name="unitname" value="<?php echo $unit; ?>">
                                                        </div>
                                                        
                                                        
                                                        
                                                        <button type="submit" class="btn btn-primary" name="submit1">Update</button>


                                                        	<div class="alert alert-success" id="success" style="display: none;">
                                                        		Record Updated Successfully!
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
	mysqli_query($link,"UPDATE units SET unit='$_POST[unitname]' where id=$id") or die(mysqli_error($link));
?>	

			<script type="text/javascript">
				document.getElementById("success").style.display="block";
				setTimeout(function(){
					window.location="add_new_unit.php";
				},3000);	
			</script>
<?php
}


?>





<?php
	include "footer.php";
?>
