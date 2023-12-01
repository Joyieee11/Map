<!-- map.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>View map</title>

    <meta name="description" content="Explore the hydrant locations on the map. Report issues and recommend adding hydrants for better fire protection.">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="top-nav">
        <div class="icons">
            <div class="icons-container">
                <a href="https://www.facebook.com/bfp.cabuyao" aria-label="Visit our Facebook Page" title="Visit our Facebook Page">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>

            <div class="icons-container user-login">
                <a href="{{ url('/login') }}" aria-label="Login" title="Login">
                    <i class="fa-regular fa-circle-user"></i>
                </a>
            </div>
        </div> 
    </div>
    <section class="banner-area">
        <img src="image/banner.webp" alt="Image" class="img-fluid"> 
    </section><br>
    
    <div class="map-section">
        <div class="container-fluid info-container">
            <div class="row">
                <div class="col-6 info-sidebar" id="infoSidebar">
                    <h3>HYDRANT INFORMATION</h3>
                    <div class="info-content">
                        No Hydrant is selected.
                    </div>
                </div>
            </div>
            <div class="close-arrow" id="arrow" onclick="toggleSidebar()">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
        <div id="map">
            <div class="close-map-btn">
                <a href="{{ url('/home') }}" aria-label="Close Map">
                    <button id="close-map" class="btn btn-danger" aria-label="Close Map"><i class="fa-solid fa-angles-left"></i></button>
                </a>
            </div>
        </div>
    </div>
    

    <!-- Modal for adding hydrant information -->
    <div class="modal fade" id="addHydrantModal" tabindex="-1" role="dialog" aria-labelledby="addHydrantModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addHydrantModalLabel">Recommend Adding Hydrant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="hydrantForm" action="{{ route('hydrant.store') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="reason">Reason:</label>
                            <input type="text" class="form-control" name="latitude" hidden>
                            <input type="text" class="form-control" name="longitude" hidden>
                            <input type="text" class="form-control" id="reason" name="reason" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for reporting issue -->
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Report Issue</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reportForm" action="{{ route('store.report.issue') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="latitude" hidden>
                            <input type="text" class="form-control" name="longitude" hidden>
                            <label for="reportReason">Reason:</label><br>

                            <div class="btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="reportReason" id="damage" value="damage hydrant" autocomplete="off" required> Damage hydrant
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="reportReason" id="leak" value="water leak" autocomplete="off" required> Water leak from hydrant
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="reportReason" id="obstruction" value="obstruction" autocomplete="off" required> Obstruction blocking access to hydrant
                                </label>
                                <label class="btn btn-outline-primary" id="othersLabel">
                                    <input type="radio" name="reportReason" id="others" value="others" autocomplete="off" required> Others
                                </label>
                            </div>

                            <div id="othersInput" style="display: none;">
                                <label for="othersReason">Other Reason:</label>
                                <input type="text" class="form-control" id="othersReason" name="othersReason">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        // Pass coordinates from PHP to JavaScript
        var coordinates = @json($coordinates);
    </script>

    <!-- Custom script -->
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{ asset('js/style.js') }}"></script>

</body>
</html>
