    <!-- bfpresponder.blade.php -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Responder Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responderStyle.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responderMap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/map.css') }}">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    </head>

    <body>
        <div class="top-nav">

            <p class="brand-text"></p>
            <div class="icons">
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
        <section class="banner-area">
            <img src="image/banner.webp" alt="Image" class="img-fluid"> 
        </section>

        <!-- Map section --> 
        <div class="map-section">
            <div class="container-fluid info-container">
                <div class="row">
                    <div class="col-6 info-sidebar">
                        <div class="search-bar-container">
                            <button id="get-location-button" class="icon-button">
                                <i class="fa-solid fa-street-view"></i>
                                    Show Location
                            </button>
                            <button id="view-hydrants-button" class="icon-button">
                                <i class="fa-solid fa-eye"></i>
                                    View All Hydrants
                            </button>
                            <div class="search-bar">
                                <input type="text" id="search-input" placeholder="Search..." >
                                    <button id="search-button" class="icon-button" >
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                    <button id="route-button" class="icon-button">
                                        <i class="fa-solid fa-route"></i>
                                    </button>
                            </div>
                            <div id="route-container" class="hidden">
                                <span id="close-route-button">
                                    <i class="fa-solid fa-times"></i>
                                </span> 
                                <input type="text" id="from-input" placeholder="From">
                                <input type="text" id="to-input" placeholder="To">
                                <button id="find-location-button" class="icon-button btn-find-location">
                                    Find Location
                                </button>
                            </div>
                        
                        </div>
                        <h4>HYDRANT INFORMATION</h4>
                        <div class="info-content">
                            No Hydrant is selected.
                        </div>
                    </div>
                </div>
            </div>
            <div id="map">
                <div class="close-map-btn">
                    <a href="{{ url('/close-map') }}">
                        <button id="close-map" class="btn btn-danger"><i class="fa-solid fa-angles-left"></i></button>
                    </a>
                </div>
            </div>
        </div>

    <!-- Modal dialog for responder information (initially hidden) -->
    <div id="profileModal" class="modal">
        <div class="profile-content">
            <!-- Close button for the modal -->
            <span class="close" onclick="closeProfileModal()">&times;</span>
            <h2>Responder Information</h2>
            <!-- Placeholder for user information or other content -->

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
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('js/style.js') }}"></script>
    <script src="{{ asset('js/responderMap.js') }}"></script>
</body>
</html>
