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
												<h5>Add New Party</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-user"></i></a></li>
												<li class="breadcrumb-item"><a href="#!">New User Party</a></li>
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
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control" placeholder="First Name" name="firstname">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" placeholder="Last Name" name="lastname">
                                                        </div>
                                                        
                                                        
                                                        <button type="submit" class="btn btn-primary" name="submit1">Submit</button>

                                                        	

                                                        	<div class="alert alert-success" id="success" style="display: none;">
                                                        		Record Inserted Successfully!
                                                        	</div>
                                                        
                                                   
                                                </div>
                                                <div class="col-md-6">
                                                                
                                                        <div class="form-group">
                                                            <label>Business Name</label>
                                                            <input type="text" class="form-control" placeholder="Business Name" name="businessname">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Contact</label>
                                                            <input type="text" class="form-control" placeholder="Enter Contact No" name="contact">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                           <!--  <input type="text" class="form-control" placeholder="Enter Contact No" name="contact"> -->
                                                           <textarea name="address" id="" cols="30" rows="10" class="form-control" ></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" placeholder="Enter City" name="city">
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
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Business Name</th>
                                                            <th>Contact</th>
                                                            <th>Address</th>
                                                            <th>City</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    	<?php 
                                                    	$res=mysqli_query($link,"SELECT * from party_info");
                                                    	while($row=mysqli_fetch_array($res))
                                                    	{
                                                    		?>
                                                    		<tr class="">
                                                            <td><?php echo $row["firstname"]; ?></td>
                                                            <td><?php echo $row["lastname"]; ?></td>
                                                            <td><?php echo $row["businessname"]; ?></td>
                                                            <td><?php echo $row["contact"]; ?></td>
                                                            <td><?php echo $row["address"]; ?></td>
                                                            <td><?php echo $row["city"]; ?></td>
                                                            <!-- <td><a href="" >Edit</a></td>
                                                            <td><a href="">Delete</a></td> -->
                                                            <td><button class="bg-success"><a href="edit_party.php?id=<?php echo $row["id"]; ?>" style="color: white;">Edit</a></button></td>
                                                            <td><button class="bg-danger"><a href="delete_party.php?id=<?php echo $row["id"] ?>" style="color: white;">Delete</a></button></td>
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
		
		
			mysqli_query($link,"INSERT into party_info values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[businessname]','$_POST[contact]','$_POST[address]','$_POST[city]')") or die(mysqli_error($link));

			?>
			<script type="text/javascript">
				
				document.getElementById("success").style.display="block";
				setTimeout(function(){
					window.location.href=window.location.href;
				},3000);	
			</script>
			<?php
		

	}

?>	

	

<?php
	include "footer.php";
?>
