<?php
	include "header.php";
	include "../user/connection.php";
	$id=$_GET["id"];

	$firstname="";
	$lastname="";
	$email="";
	$password="";
	$role="";
	$status="";

	$res=mysqli_query($link,"SELECT * from user_registration where id=$id");
	while($row=mysqli_fetch_array($res))
	{
		$firstname=$row["firstname"];
		$lastname=$row["lastname"];
		$email=$row["email"];
		$password=$row["password"];
		$status=$row["status"];
		$role=$row["role"];
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
												<h5>Edit User</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
												<li class="breadcrumb-item"><a href="#!">Edit User</a></li>
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
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" readonly value="<?php echo $email; ?>">
                                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                        </div>
                                                    	<div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php echo $firstname; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $lastname; ?>">
                                                        </div>
                                                        
                                                        
                                                        <button type="submit" class="btn btn-primary" name="submit1">Update</button>


                                                        	<div class="alert alert-success" id="success" style="display: none;">
                                                        		Record Updated Successfully!
                                                        	</div>
                                                        
                                                   
                                                </div>
                                                <div class="col-md-6">
                                                                
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Password</label>
                                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo $password; ?>">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Select Role</label>
                                                            <select class="form-control" id="exampleFormControlSelect1" name="role">
                                                                <option <?php if($role=="user") {echo "selected";} ?> >User</option>
                                                                <option <?php if($role=="admin") {echo "selected";} ?> >Admin</option> 
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Select Status</label>
                                                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                                                                <option <?php if($status=="active") {echo "selected";} ?> >Active</option>
                                                                <option <?php if($status=="inactive") {echo "selected";} ?> >Inactive</option> 
                                                            </select>
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
	mysqli_query($link,"UPDATE user_registration SET firstname='$_POST[firstname]',lastname='$_POST[lastname]',password='$_POST[password]',role='$_POST[role]',status='$_POST[status]' where id=$id") or die(mysqli_error($link));
?>	

			<script type="text/javascript">
				document.getElementById("success").style.display="block";
				setTimeout(function(){
					window.location="add_new_user.php";
				},3000);	
			</script>
<?php
}


?>





<?php
	include "footer.php";
?>
