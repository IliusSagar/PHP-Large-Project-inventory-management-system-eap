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
												<h5>Add New Unit</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-user"></i></a></li>
												<li class="breadcrumb-item"><a href="#!">New User Unit</a></li>
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
                                                            <label>Unit Name</label>
                                                            <input type="text" class="form-control" placeholder="Unit Name" name="unitname">
                                                        </div>
  
                                                        
                                                        <button type="submit" class="btn btn-primary" name="submit1">Submit</button>

                                                        	<div class="alert alert-danger" id="error" style="display: none;">
                                                        		This Unit Already Exist! Please Try Another.
                                                        	</div>

                                                        	<div class="alert alert-success" id="success" style="display: none;">
                                                        		Record Inserted Successfully!
                                                        	</div>
                                                        
                                                   
                                                </div>
                                                
                                                    </form>

                                                </div>

                                                 <!-- [ Contextual-table ] start -->
                                <div class="col-xl-12"><br><br>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Data Display Table</h5>
                                            <!-- <span class="d-block m-t-5">use class <code>table-striped</code> inside table element</span> -->
                                        </div>
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>Unit Name</th>  
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    	<?php 
                                                    	$res=mysqli_query($link,"SELECT * from units");
                                                    	while($row=mysqli_fetch_array($res))
                                                    	{
                                                    		?>
                                                    		<tr class="">
                                                            <td><?php echo $row["id"]; ?></td>
                                                            <td><?php echo $row["unit"]; ?></td>

                                           <td><button class="bg-success"><a href="edit_unit.php?id=<?php echo $row["id"]; ?>" style="color: white;">Edit</a></button></td>
                                           <td><button class="bg-danger"><a href="delete_unit.php?id=<?php echo $row["id"] ?>" style="color: white;">Delete</a></button></td>
                                                        	</tr>
                                                    		<?php
                                                    	}

                                                    	?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
		
		$count=0;
		$res=mysqli_query($link,"SELECT * from units where unit='$_POST[unitname]'");
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
			mysqli_query($link,"INSERT into units values(NULL,'$_POST[unitname]')") or die(mysqli_error($link));

			?>
			<script type="text/javascript">
				document.getElementById("error").style.display="none";
				document.getElementById("success").style.display="block";
				setTimeout(function(){
					window.location.href=window.location.href;
				},3000);	
			</script>
			<?php
		}

	}

?>	

	

<?php
	include "footer.php";
?>
