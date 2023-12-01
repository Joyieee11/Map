<!-- bfpAdmin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>BFP Admin</title>

  <meta name="description" content="Manage personnel, hydrant information, and generate reports with BFP Admin. Stay updated on fire service activities, view the mission and vision, and access essential functionalities for effective administration.">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bfpAdmin.css') }}">

</head>
<body>
    <!-- Navy Blue top navigation bar -->
    <div class="top-nav">
        <button class="btn" id="menu-toggle" aria-label="bars button">
            <i class="fas fa-bars"></i>
        </button>
        <p class="brand-text"></p>
        <div class="icons">
            <div class="notification-container">
                <!-- Add an onclick attribute to the notification icon -->
                <i class="fas fa-bell" id="notification-icon" onclick="toggleNotificationDropdown()"></i>
                <div class="notification-dropdown" id="notification-dropdown">
                    <!-- Add your notification content here -->
                    <button onclick="handleNotificationClick('notification 1')">Notification 1</button >
                    <button onclick="handleNotificationClick('New notification 2')">New notification 2</button>
                    <!-- Add more notifications as needed -->
                </div>
            </div>
            <div class="user-dropdown">
                <i class="fas fa-user" id="user-icon"></i>
                <div class="user-dropdown-menu" id="user-dropdown-menu">
                    <a onclick="getUserInfomartion()">My Profile</a>
                    <a href="{{ url('/edit-profile') }}">Edit Profile</a>
                    <a href="{{ url('/logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class=" border-right" id="sidebar">
            <div class="sidebar-heading">
                <img src="image/logo.webp" alt="Logo" class="logo-img">
            </div>
            <a href="#" class="nav-link active" id="dashboard-link" onclick="showContent('dashboard')"><i class="fa-solid fa-qrcode"></i> Dashboard</a>
            <a href="#" class="nav-link" id="report-link" onclick="showContent('report')"><i class="fas fa-file-alt"></i> Generate Report</a>
            <a id="exit-sidebar-btn" onclick="closeSidebar()">
                <i class="fas fa-times"></i>
            </a>
            
            <!-- Dropdown for Hydrant Management -->
            <div class="dropdown">
                <a href="#" id="manage-link" class="nav-link" onclick="toggleHydrantDropdown()">
                    <i class="fas fa-wrench"></i> Manage<i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="hydrant-link" id="hydrant-dropdown">
                    <a class="dropdown-item nav-item-link" id="hydrant-link-info" href="#" onclick="showHydrantInfo()"><i class="fas fa-info-circle"></i> Account</a>
                    <a class="dropdown-item nav-item-link" id="maintenance-link-info" href="#" onclick="showHydrantMaintenance()"><i class="fas fa-wrench"></i> Hydrant Information</a>

                    <!-- Add more dropdown items as needed -->
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Dashboard Content -->
            <div id="dashboard-content" class="mission-vision-container">
              <section class="cover-photo">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <!-- Button to view the map -->
                            <button class="view-map-button"><a href="{{ url('/bfp-map') }}">View Map</a></button>
                        </div>
                    </div>
                </div>
                <div class="container">
                  <div class="row mission-vision-wrapper">
                    <div class="col-md-6 d-flex align-items-center">
                      <div class="mission-vision-box">
                        <section>
                            <h2>Mission</h2>
                            <p>We commit to prevent and suppress destructive fires, investigate its causes; enforce Fire Code and other related laws; respond to man-made and natural disasters and other emergencies.</p>
                        </section>
                      </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                      <div class="mission-vision-box vision-box">
                        <section>
                              <h2>Vision</h2>
                              <p>A modern fire service fully capable of ensuring a fire safe nation by 2034.</p>
                          </section>
                      </div>
                    </div>
                  </div>                    
                </div>
              </section>
            </div>
              

            <!-- Hydrant Content -->
            <div id="hydrant-content" class="hydrant-information">
                <br>
                <!-- Search Bar -->
                <div class="input-group mb-3 custom-search-bar">
                    <input type="text" class="form-control form-control-sm" placeholder="Search..." id="hydrant-search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="#">
                        <i class="fas fa-search"></i> 
                        </button>
                    </div>
                </div>
        
          <!-- Include Personnel Management Table Code -->
          <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h2>Personnel Management</h2>
              <button class="btn btn-primary btn-custom " data-toggle="modal" data-target="#createAccountModal">Create New Account</button>
            </div>

            <div class="table-responsive">
              <table id="userInformation" class="table table-bordered table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th>Account Number</th>
                    <th>Full Name</th>
                    <th>Position</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Birthday</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>  
                </tbody>
              </table>
            </div>
          </div>

          <!-- Update Account Modal -->
          <div class="modal fade" id="updateAccountModal" tabindex="-1" role="dialog" aria-labelledby="updateAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="updateAccountModalLabel">Update Account Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="updateForm">
                    <div class="form-group">
                      <label for="updateFullName">Full Name:</label>
                      <input type="text" class="form-control" id="updateFullName" name="updateFullName" required>
                    </div>
                    <div class="form-group">
                      <label for="updateGender">Gender:</label>
                      <input type="text" class="form-control" id="updateGender" name="updateGender" required>
                    </div>
                    <div class="form-group">
                      <label for="updateAddress">Address:</label>
                      <input type="text" class="form-control" id="updateAddress" name="updateAddress" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Create Account Modal --> 
          <div class="modal fade" id="createAccountModal" tabindex="-1" role="dialog" aria-labelledby="createAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="createAccountModalLabel">Create Account</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" id="createAccount">
                    @csrf
                    <div class="container-fluid">
                      <div class="row main-content bg-success text-center">
                        <div class="col-md-4 text-center company__info">
                          <!-- Logo -->
                          <span class="company__logo">
                            <!-- Font Awesome Android Icon -->
                            <img src="image/logo.webp" alt="Company Logo">
                          </span>
                        </div>
                        <div class="col-md-8 col-xs-12 col-sm-12 create_form">
                          <div class="container-fluid">
                            <div class="row">
                              <h2>Create Account</h2>
                            </div>
                            
                              <div class="row">
                                  <input type="text" id="account_number" class="form__input" name="account_number" placeholder="Account Number" required>
                                
                              </div>
                              <div class="row"> 
                                <div class="col-md-6">
                                    <select id="position" class="form__input" name="position" required>
                                        <option value="" disabled selected>Select User</option>
                                        <option value="BFP-ADMIN">BFP-ADMIN</option>
                                        <option value="RESPONDER">RESPONDER</option>
                                        <option value="CABWAD-ADMIN">CABWAD-ADMIN</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" id="birthday" class="form__input" name="birthday" placeholder="Birthdate" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Register" class="btn form__submit-btn">
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

          <!-- Maintenance Content -->
        <div id="maintenance-content" class="hydrant-information">
          <h2>Manage Hydrant Information</h2>
          <br>
          <!-- Search Bar -->
          <div class="input-group mb-3 custom-search-bar">
              <input type="text" class="form-control form-control-sm" placeholder="Search..." id="maintenance-search">
              <div class="input-group-append">
                  <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchMaintenance()">
                      <i class="fas fa-search"></i>
                  </button>
              </div>
          </div>
          <br>
          <!-- Table -->
          <div class="table-responsive">
              <table id="hydrantRecord" class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Hydrant ID</th>
                          <th>Latitude</th>
                          <th>Longitude</th>
                          <th>Location</th>
                          <th>Updated Pipe Type</th>
                          <th>Updated Color</th>
                          <th>Updated Status</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
          </div>
        </div>

          <!-- Update Modal -->
          <div class="modal fade" id="updateHydrantDetailsModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Pipe Type, Color, and Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Add your form fields for updating information here -->
                        <form id="updateForm">
                          @csrf
                            <div class="form-group">
                                <label for="updatePipeType">Updated Pipe Type:</label>
                                <input type="text" class="form-control" id="updatePipeType" >
                            </div>
                            <div class="form-group">
                                <label for="updateColor">Updated Color:</label>
                                <input type="text" class="form-control" id="updateColor" >
                            </div>
                            <div class="form-group">
                                <label for="updateStatus">Updated Status:</label>
                                <input type="text" class="form-control" id="updateStatus" >
                            </div>
                            <button type="button" class="btn btn-primary btn-custom" onclick="updateHydrant()">Update</button>
                        </form>
                    </div>
                </div>
            </div>
          </div>


            <!-- Report Content -->
            <div id="report-content" class="generate-report">
              
                <br>
                  <!-- Search Bar -->
                  <div class="input-group mb-3 custom-search-bar">
                    <input type="text" class="form-control form-control-sm" placeholder="Search..." id="hydrant-search-report">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchHydrant()">
                        <i class="fas fa-search"></i> 
                        </button>
                    </div>
                </div>

          <br>
           <!-- Generate Report Button -->
           <button class="btn btn-primary btn-create-report" data-toggle="modal" data-target="#createReportModal">
            Create Report
        </button>
        
        <br><br>

        <!-- Modal for Report -->
        <div class="modal fade" id="createReportModal" tabindex="-1" role="dialog" aria-labelledby="createReportModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="createReportModalLabel">Hydrant Status Report</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <form id="createReport" action="" method="POST">
                      @csrf
                      <div class="form-group">
                        <label>Hydrant ID:</label>
                        <input type="text" class="form-control" id="hydrant_id" name="hydrant_id" required>
                      </div>
                      <div class="form-group">
                        <label>Before:</label>
                        <input type="text" class="form-control" id="before" name="before" required>
                      </div>
                      <div class="form-group">
                        <label>During:</label>
                        <input type="text" class="form-control" id="during" name="during" required>
                      </div>
                      <div class="form-group">
                        <label>After:</label>
                        <input type="text" class="form-control" id="after" name="after" required>
                      </div>
                      <button type="submit" class="btn btn-secondary btn btn-custom ">Generate Report</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  

          <!-- Styled Table for Hydrant Status on the left side -->
          <div class="row">
            <div class="col-lg-8">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="generateReport">
                  <thead class="thead-custom">
                    <tr>
                        <th>Hydrant ID</th>
                        <th>Before</th>
                        <th>During</th>
                        <th>After</th>
                        <th>Action</th>
                    </tr>
                </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-lg-4">
              <div id="hydrant-status-container">
                  <h2>HYDRANT DETAILS</h2>
                  <p>This is another container beside the hydrant status table.</p>
                  <button class="btn btn-custom">Download</button>
              </div>
            </div>          
          </div>
        </div>
        </div>
            
        </div>
    </div>
    <div id="profileModal" class="modal">
        <div class="profile-content">
            <!-- Close button for the modal -->
            <span class="close" onclick="closeProfileModal()">&times;</span>
            <h2>My Information</h2>

            <div class="profile-table">
                <table>
                    <tr>
                        <td>Full Name:</td>
                        <td id="fullName"></td>
                    </tr>
                    <tr>
                        <td>Position:</td>
                        <td id="position"></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td id="gender"></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td id="address"></td>
                    </tr>
                    <tr>
                        <td>Birthday:</td>
                        <td id="birthday"></td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
  </div>

  
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="{{ asset('js/adminStyle.js') }}"></script>
<script src="{{ asset('js/style.js') }}"></script>
<script src="{{ asset('js/createAccount.js') }}"></script>
<script src="{{ asset('js/updateAccount.js') }}"></script>
<script src="{{ asset('js/createReport.js') }}"></script>
</body>
</html>