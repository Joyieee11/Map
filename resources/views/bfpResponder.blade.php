<!-- bfpresponder.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Responder Page</title>

    <meta name="description" content="Explore the Responder Page to manage your profile, view a dynamic map, and access essential functionalities. Stay informed about your personal details, such as full name, position, gender, address, and birthday. Efficiently navigate through features designed for responders' convenience.">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responderStyle.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

</head>

<body>
    <!-- Navy Blue top navigation bar -->
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
    
    <!-- Cover photo section with a background image -->
    <section class="cover-photo">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <!-- Button to view the map -->
                    <button id="viewMap" class="view-map-button"><a href="{{ url('/bfp-map') }}">View Map</a></button>
                </div>
            </div>
        </div>
        
    </section>
    <!-- Modal dialog for responder information (initially hidden) -->
    <div id="profileModal" class="modal">
        <div class="profile-content">
            <!-- Close button for the modal -->
            <span class="close" onclick="closeProfileModal()">&times;</span>
            <h2>Responder Information</h2>

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

    
    <script src="{{ asset('js/style.js') }}"></script>

</body>
</html>
