  <?php

        $edit=$_GET['editStockist'];
  ?>
 <div class="card-body p-0">
    <div id="product" class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-10">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Edit a Stockist</h1>
                  </div>
                  <form action="include/saveStockist.php" method="post" enctype='multipart/form-data' class="user">
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName" value="<?php echo getStockistInfo($edit,'name'); ?>">
                      </div>
                      <div class="col-sm-6">
                        <input type="text" name="address" class="form-control form-control-user" id="exampleLastName"  value="<?php echo getStockistInfo($edit,'address'); ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="amount" class="form-control form-control-user" id="exampleFirstName"  value="<?php echo getStockistInfo($edit,'amount'); ?>">
                      </div>
                       <div class="col-sm-6">
                        <input type="text" name="phone" class="form-control form-control-user" id="exampleLastName"  value="<?php echo getStockistInfo($edit,'phone'); ?>">
                      </div>
                    </div>
                     <div class="form-group">
                      <textarea type="text" cols="4" name="detail" class="form-control form-control-user" id="exampleInputEmail">
                        <?php echo getStockistInfo($edit,'info'); ?>
                      </textarea>
                    </div>
                    <input type="hidden" name="id"  class="form-control form-control-user" id="exampleLastName"  value="<?php echo $edit; ?>">
                    <button type="submit" name="edit" class="btn btn-primary btn-user btn-block">
                      Submit
                    </button>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>