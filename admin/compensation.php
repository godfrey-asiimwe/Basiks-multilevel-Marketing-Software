<?php include_once 'header.php' ?>
      <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li class=""><a class="nav-link" href="index.php"><i class="fas fa-bars"></i><span>Report Dashboard</span></a></li>
                  <li class="active"><a class="nav-link" href="compensation.php"><i class="fas fa-dollar-sign"></i><span>Default Amounts</span></a></li>
                   <li><a class="nav-link" href="activeusers.php"><i class="fas fa-dollar-sign"></i><span>Active Members</span></a></li>
                </ul>
              </li>
              <li class="menu-header">Products</li>
             
              <li><a class="nav-link" href="product.php"><i class="fas fa-shopping-bag"></i> <span>Products</span></a></li>
              <li><a class="nav-link" href="purchases.php"><i class="fas fa-archive"></i> <span>Purchases</span></a></li>
               <li ><a class="nav-link" href="dailypurchases.php"><i class="fas fa-archive"></i> <span> Daily Purchases</span></a></li>

              
              <li class="menu-header ">Messages</li>
               <li><a class="nav-link" href="sent.php"><i class="fas fa-envelope"></i> <span>Sent Messages</span></a></li>
              <li ><a class="nav-link" href="received.php"><i class="fas fa-envelope"></i> <span>Received Messages</span></a></li>
             
            </ul>

    </aside>
  </div>
   <div class="main-content">
        <section class="section">

          <div class="section-body" style="margin-top: 100px;">
            <h2 class="section-title">Compensation Plan</h2>
            <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>
          </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                    <?php 
          if(isset($_GET['deleteLevel'])){
              include_once 'deleteLevel.php';
          }elseif(isset($_GET['editLevel'])){
              include_once 'editLevel.php';
          }else{
          ?>
                  <h4>List of Compensation Levels</h4>
                  <div class="card-header-action">
                        <button   data-toggle="modal" data-target="#logoutModal" class="dropdown-item has-icon text-danger btn btn-primary" style="color: white !important;" class="btn btn-primary">Add new Plan</button>
                      </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive" style="padding: 40px;">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Level</th>
                              <th>Amount</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php getAllCompensationAmount(); ?>
                          </tbody>
                       </table>
                  </div>
                </div>

            


          <?php
              }
          ?>
              </div>
            </div>
            </div>
          

        </section>
  </div>

     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Compensation Level</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">

                     <form id="comp">
                          <div class="form-group col-md-8 col-lg-8">
                          <label>Select Level</label>
                          <select class="form-control" name="level" id="level">
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                          </select>
                        </div>
                        <div class="form-group col-md-8 col-lg-8">
                          <label>Amount</label>
                          <input type="text" name="amount" id="amount" class="form-control">
                        </div>
                         <button type="button" style="color: white;" id="add_comp"   class="btn btn-primary daterange-btn icon-left btn-icon"><i class="fas fa-calendar"></i> Save
                          </button> 
                    </form>
            </div>
            </div>
          </div>
        </div>

<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div>Basiks </a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="assets3/js/scripts.js"></script>
  <script src="assets3/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets3/js/page/index.js"></script>

   <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <script type = "text/javascript">
  $(document).ready(function(){
     //displayResult();
  /*  ADDING POST */  
    
    $('#add_comp').on('click', function(){

      if($('#amount').val() == ""){
        alert('Please enter amount');
      }else{
        
        $amount =$('#amount').val();
        $level =$('#level').val();

        
        $.ajax({
          type: "POST",
          url: "add_comp.php",
          data: {
            amount:$amount,
            level:$level,
            
          },
          success: function(){

            $("#comp")[0].reset();
            
            //displayResult();
          }
        });
      } 
    });

  /*****  *****/

  });
  
  function displayResult(){

    $.ajax({
      url: 'add_comp.php',
      type: 'POST',
      async: false,
      data:{
        res: 1
      },
      success: function(response){
        $('#result').html(response);
      }
    });

  }
  
</script>

</body>
</html>
