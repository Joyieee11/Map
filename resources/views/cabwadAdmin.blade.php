<!-- cabwadAdmin.blade.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CABWAD Admin</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cabwad.css') }}">
</head>

<body>
    <!-- Yellow top navigation bar -->
    <div class="top-nav">
        <button class="btn" id="menu-toggle">
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
                <img src="image/cabwad-logo.png" alt="Logo" class="logo-img">
            </div>
            <a href="#" class="nav-link active" id="dashboard-link" onclick="showContent('dashboard')"><i class="fa-solid fa-qrcode"></i> Dashboard</a>
            <a href="#" class="nav-link" id="report-link" onclick="showContent('report')"><i class="fas fa-file-alt"></i> Generate Report</a>
            <a id="exit-sidebar-btn" onclick="closeSidebar()">
                <i class="fas fa-times"></i>
            </a>
            
            <!-- Dropdown for Hydrant Management -->
            <div class="dropdown">
                <a href="#" id="manage-link" class="nav-link" onclick="toggleHydrantDropdown()">
                    <i class="fas fa-wrench"></i> Manage Hydrant <i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="hydrant-link" id="hydrant-dropdown">
                    <a class="dropdown-item nav-item-link" id="hydrant-link-info" href="#" onclick="showHydrantInfo()"><i class="fas fa-info-circle"></i> Information</a>
                    <a class="dropdown-item nav-item-link" id="maintenance-link-info" href="#" onclick="showHydrantMaintenance()"><i class="fas fa-wrench"></i> Maintenance</a>

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
                <div class="mission-vision-box">
                    <section>
                        <h2>Mission</h2>
                        <p>To continuously provide potable water to all consumers within the City of Cabuyao and to protect water resources within the District’s territorial jurisdiction.</p>
                    </section>
                </div>
        
                <!-- Vision Box -->
                <div class="mission-vision-box vision-box">
                    <section>
                        <h2>Vision</h2>
                        <p>To make potable water available to all Cabuyeños by utilizing all possible water sources such as springs, rivers, and groundwater; and to operate and provide modern facilities for the collection, treatment, and disposal of sewerage, waste, and storm water.</p>
                    </section>
                </div>
            </div>
             <!-- Report Content -->
            <div id="report-content" class="generate-report">
                <h2>Generate Report</h2>

                <!-- Table for Hydrant Report -->
                <table class="table table-bordered" id="hydrant-report-table">
                    <thead>
                        <tr>
                            <th>Hydrant ID</th>
                            <th>Before</th>
                            <th>During</th>
                            <th>After</th>
                            <th>Issue</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add your table rows with hydrant report information here -->
                        <!-- Example row, replace with actual data -->
                        <tr>
                            <td>1</td>
                            <td>Before Image</td>
                            <td>During Image</td>
                            <td>After Image</td>
                            <td>Reported Issue</td>
                            <td>
                                <button class="btn btn-feedback" onclick="SendFeedback(1)">Send Feedback</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
            <!-- Hydrant Content -->
            <div id="hydrant-content" class="hydrant-information">
                <h2>Manage Hydrant Information</h2>
            
                <!-- Search Bar -->
                <div class="input-group mb-3 custom-search-bar">
                    <input type="text" class="form-control form-control-sm" placeholder="Search..." id="hydrant-search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchHydrant()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
        
                <!-- Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>LONGITUDE</th>
                            <th>LATITUDE</th>
                            <th>PIPE TYPE</th>
                            <th>CAP</th>
                            <th>HEAD VALVE</th>
                            <th>Water Provider</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add your table rows with hydrant information here -->
                        <tr>
                            <td>1</td>
                            <td>Main Street</td>
                            <td>Active</td>
                            <td>120.9876</td> <!-- Replace with the actual longitude -->
                            <td>14.1234</td> <!-- Replace with the actual latitude -->
                            <td>PVC</td> <!-- Replace with the actual pipe type -->
                            <td>50 gpm</td> <!-- Replace with the actual cap information -->
                            <td>Yes</td> <!-- Replace with the actual head valve information -->
                            <td>CABWAD</td>
                            <td>
                                <button class="btn btn-update">Update</button>
                                <button class="btn btn-archive" onclick="archiveHydrant()">Archive</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
            
            <!-- Maintenance Content -->
            <div id="maintenance-content" class="maintenance-information">
                <div class="container-fluid d-flex justify-content-between">
                    <h2>Manage Hydrant Maintenance</h2>

                    <!-- Request Maintenance Button -->
                    <button class="btn btn-view-request" onclick="showViewRequestForm()">View Request</button>
                </div>

                <!-- Search Bar -->
                <div class="input-group mb-3 custom-search-bar">
                    <input type="text" class="form-control form-control-sm" placeholder="Search..." id="maintenance-search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchMaintenance()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Equipment</th>
                            <th>Location</th>
                            <th>Maintenance Type</th>
                            <th>Date</th>
                            <th>Technician</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add your table rows with maintenance information here -->
                        <!-- Example row, replace with actual data -->
                        <tr>
                            <td>1</td>
                            <td>Pump Station A</td>
                            <td>Main Building</td>
                            <td>Regular Inspection</td>
                            <td>2023-01-15</td>
                            <td>John Doe</td>
                            <td>
                                <button class="btn btn-update">Update</button>
                                <button class="btn btn-archive" onclick="archiveMaintenance()">Archive</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>

            <div id="view-request-details" style="display: none; background-color: #fff; padding: 20px; margin-top: -10px;">
                <a class="back" onclick="goBackToMaintenance()">
                    <i class="fas fa-arrow-left"></i>Manage Maintenance
                </a>
                <h3>Request Details</h3>
                <!-- Add your request details here -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Reason</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add your table rows with request details here -->
                        <!-- Example row, replace with actual data -->
                        <tr>
                            <td>1</td>
                            <td>120.9876</td>
                            <td>14.1234</td>
                            <td>Broken pipe</td>
                            <td>
                                <button class="btn btn-accept">Accept</button>
                                <button class="btn btn-decline">Decline</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>       

   
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="{{ asset('js/adminStyle.js') }}"></script>
    <script src="{{ asset('js/style.js') }}"></script>
</body>
</html>
