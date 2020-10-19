<div class="row mt">
	<div class="col-lg-12">
	<?php
	$del=mysql_real_escape_string(($_GET['deleteuser']));
	if(isset($_GET['c']) && $_GET['c']=='y'){
		mysql_query("DELETE FROM user WHERE user_id='$del'") or die(mysql_error());
		?>
		  <script type="text/javascript">
		   window.location='main.php?Clients';
		  </script>
		<?php
	}
	?>
	<h4>Are you sure you want to delete '<?php echo getUserInfo($del,'firstname'); ?>'?</h4>
	<a href="main.php?deleteuser=<?php echo $del;?>&c=y" class="btn btn-danger" style="margin-bottom:10px;">Yes</a>&nbsp;&nbsp;
	<a href="main.php?Clients" class="btn" style="margin-bottom:10px;">No</a>
	</div>
</div>

<form action="include/saveProduct.php" method="post" enctype='multipart/form-data' class="user">
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName" placeholder="Product Name">
                          </div>
                          <div class="col-sm-6">
                            <input type="text" name="price" class="form-control form-control-user" id="exampleLastName" placeholder="Price">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="category" class="form-control form-control-user" id="exampleFirstName" placeholder="Product category">
                          </div>
                          <div class="col-sm-6">
                            <input type="file" name="image" >
                          </div>
                        </div>
                         <div class="form-group">
                          <textarea type="text" name="detail" class="form-control form-control-user" id="exampleInputEmail" placeholder="Detials"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                          Submit
                        </button>
                        
                      </form>


<div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Send to all</h1>
                      </div>
                      <form action="include/sendToall.php" method="post" enctype='multipart/form-data' class="user">

                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="subject" class="form-control form-control-user" placeholder="Subject">
                          </div>
                        </div>
                         <div class="form-group">
                          <textarea type="text" name="message" class="form-control form-control-user" id="exampleInputEmail" placeholder="Detials"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                          Send
                        </button>
                        
                      </form>

                      