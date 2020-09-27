<?php
include_once 'reports.php';
$result = mysqli_query($conn,"SELECT * FROM tbl_add_mr");

?>

<?php
include_once 'reports.php';
$result2 = mysqli_query($conn,"SELECT * FROM tbl_add_retailer");
?>
<?php
include_once 'reports.php';
$result3 = mysqli_query($conn,"SELECT * FROM tbl_add_gift");
?>
<?php 
include('includes/header.php');

include('includes/navbar.php'); 

?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['email'];?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
             
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

       
               <div class="container">
                  <h3 style="text-align: center; color: #4e73df;">View All Reports</h3>
                   <hr class="sidebar-divider">
                    <center>
                        <select class="btn btn-primary dropdown-toggle" style="outline-color: #4e73df;  color: #fff;" id="getFname">

                          <option>Select Reports</option>
                          <option value="mrwise">MR Wise</option> 
                          <option value="retailerswise">Retailers Wise</option>
                          <option value="stockistwise">Stockist Wise</option>
                          </select>
                    </center>
                   <br> 


                          <div id="mrwise" style="display:none;">
                            <div class="row justify-content-center">
                         <?php require_once 'reports.php'; ?>
                          <?php
                      if (mysqli_num_rows($result) > 0) {
                        ?>
                               <table class="table table-responsive">

                                <thead>
                                  <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Role</th>
                                        <th>Mobile</th>
                                        <th>City</th>
                                        <th>State</th>
                                  </tr>
                                </thead>

                                
                                <?php
                                    $i=0;
                                      while($row = mysqli_fetch_array($result)) {
                                ?>
                                   <tr>

                                    <td><?php echo $row['fullname']; ?></td>
                                     <td><?php echo $row['email']; ?></td>
                                     <td><?php echo $row['address']; ?></td>
                                     <td><?php echo $row['location']; ?></td>
                                     <td><?php echo $row['role']; ?></td>
                                     <td><?php echo $row['phone']; ?></td>
                                     <td><?php echo $row['city']; ?></td>
                                     <td><?php echo $row['state']; ?></td>
                                                   
                                   </tr> 
                                <?php
                                      $i++;
                                      }
                                      ?>
                              </table>

                               <?php
                                      }
                                      else{
                                          echo "No result found";
                                      }
                                      ?>
                             </div>
                          </div>
                           <div id="retailerswise" style="display:none;">
                              <div class="row justify-content-center">
                                 <?php
                                  if (mysqli_num_rows($result2) > 0) {
                                    ?>
                                           <table class="table table-responsive">

                                            <thead>
                                              <tr>
                                              
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Company</th>
                                                <th>Address</th>
                                                <th>Location</th>
                                                <th>Role</th>
                                                <th>Mobile</th>
                                                <th>City</th>
                                                <th>State</th>
                                                </tr>
                                            </thead>
                                
                                <?php
                                    $i=0;
                                      while($row = mysqli_fetch_array($result2)) {
                                ?>
                                   <tr>
                                     <td><?php echo $row['rfullname']; ?></td>
                                     <td><?php echo $row['email']; ?></td>
                                     <td><?php echo $row['brandname']; ?></td>
                                     <td><?php echo $row['address']; ?></td>
                                     <td><?php echo $row['location']; ?></td>
                                     <td><?php echo $row['role']; ?></td>
                                     <td><?php echo $row['phone']; ?></td>
                                     <td><?php echo $row['city']; ?></td>
                                     <td><?php echo $row['state']; ?></td>
                                   </tr> 
                                <?php
                                      $i++;
                                      }
                                      ?>
                              </table>

                               <?php
                                      }
                                      else{
                                          echo "No result found";
                                      }
                               ?>
                             </div>



                          </div>
                           <div id="stockistwise" style="display:none;">
                         
                              <div class="row justify-content-center">
                                <?php
                                if (mysqli_num_rows($result3) > 0) {
                                  ?>
                               <table class="table table-responsive">

                                <thead>
                                  <tr>
                                  
                                    <th>Product Name</th>
                                    <th>Received Stock</th>
                                    <th>Stock In</th>
                                    <th>Cost</th>
                                    <th>Availability</th>
                                    </tr>
                                </thead>

                                
                                <?php
                                    $i=0;
                                      while($row = mysqli_fetch_array($result3)) {
                                     ?>
                                   <tr>

                                     <td><?php echo $row['productname']; ?></td>
                                     <td><?php echo $row['received']; ?></td>
                                     <td><?php echo $row['stockin']; ?></td>
                                     <td><?php echo $row['cost']; ?></td>
                                     <td><?php echo $row['availability']; ?></td>
                                     
                                   </tr> 
                                     <?php
                                      $i++;
                                      }
                                      ?>
                              </table>

                               <?php
                                      }
                                      else{
                                          echo "No result found";
                                      }
                                      ?>
                             </div>

                          </div>
                          
                          
                           
                </div>







                <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script type="text/javascript">
  

    $("#getFname").on("change",function(){"mrwise"===$(this).val()?$("#mrwise").show():$("#mrwise").hide()});
    
    
    $("#getFname").on("change",function(){"retailerswise"===$(this).val()?$("#retailerswise").show():$("#retailerswise").hide()});

    $("#getFname").on("change",function(){"stockistwise"===$(this).val()?$("#stockistwise").show():$("#stockistwise").hide()});
  
</script>