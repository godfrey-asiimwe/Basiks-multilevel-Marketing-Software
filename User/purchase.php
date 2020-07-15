 
<?php 
$product_id=$_GET['purchase'];
$user_no=$gid;
?>
 <div  style="" class="card col-lg-4 o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-12">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Confirm with the bill number</h1>
          </div>
          <form action="include/buy.php" method="post" enctype='multipart/form-data' class="user">
            <div class="form-group row">
              <div class="col-sm-12 mb-12 mb-sm-0">
                <input type="text" name="billno" class="form-control form-control-user" placeholder="Enter Bill Number" required>
              </div>
               <div class="col-sm-6 mb-3 mb-sm-0" style="display: none;">
                <input type="text" name="productId" value="<?php echo $product_id; ?>"   class="form-control form-control-user" placeholder="Subject">
              </div>
               <div class="col-sm-6 mb-3 mb-sm-0" style="">
                <input type="hidden" name="user_no" value="<?php echo $gid; ?>" class="form-control form-control-user" >
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
              Send
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>