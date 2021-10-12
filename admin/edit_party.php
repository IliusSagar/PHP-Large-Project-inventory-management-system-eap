<?php
	include "header.php";
	include "../user/connection.php";
    $id=$_GET["id"];
    $firstname="";
    $lastname="";
    $businessname="";
    $contact="";
    $address="";
    $city="";

    $res=mysqli_query($link,"SELECT * from party_info where id=$id");
    while($row=mysqli_fetch_array($res))
    {
        $firstname=$row["firstname"];
        $lastname=$row["lastname"];
        $businessname=$row["businessname"];
        $contact=$row["contact"];
        $address=$row["address"];
        $city=$row["city"];
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
												<h5>Edit Party Info</h5>
											</div>
											<ul class="breadcrumb">
												<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-user"></i></a></li>
												<li class="breadcrumb-item"><a href="#!">Edit Party Info</a></li>
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
                                                            <label>Business Name</label>
                                                            <input type="text" class="form-control" placeholder="Business Name" name="businessname" value="<?php echo $businessname; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Contact</label>
                                                            <input type="text" class="form-control" placeholder="Enter Contact No" name="contact" value="<?php echo $contact; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                           <!--  <input type="text" class="form-control" placeholder="Enter Contact No" name="contact"> -->
                                                           <textarea name="address" id="" cols="30" rows="10" class="form-control" ><?php echo $address; ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" placeholder="Enter City" name="city" value="<?php echo $city; ?>">
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
		
		
			mysqli_query($link,"UPDATE party_info SET firstname='$_POST[firstname]',lastname='$_POST[lastname]',businessname='$_POST[businessname]',contact='$_POST[contact]',address='$_POST[address]',city='$_POST[city]' where id=$id") or die(mysqli_error($link));

			?>
			<script type="text/javascript">
				
				document.getElementById("success").style.display="block";
				setTimeout(function(){
					window.location="add_new_party.php";
				},3000);	
			</script>
			<?php
		

	}

?>	

	

<?php
	include "footer.php";
?>
