class MapHandler {
    constructor() {
        this.map = null;
        this.fireHydrantIcon = null;
    }

    initializeMap() {
        // Set the default view to Cabuyao coordinates
        this.map = L.map('map').setView([14.247142, 121.136673], 13.5);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(this.map);
    }

    createFireHydrantIcon() {
        this.fireHydrantIcon = L.icon({
            iconUrl: '../image/cabwadhydrant.webp',
            iconSize: [50, 50],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32],
        });
    }

    addMarkers(coordinates, mapManager) {
        coordinates.forEach(coordinate => {
            const marker = L.marker([coordinate.latitude, coordinate.longitude], { 
                icon: this.fireHydrantIcon,
                hydrantId: coordinate.coordinates_id
            });
            marker.on('click', (event) => mapManager.handleFireHydrantClick(marker, event));
            marker.addTo(this.map);
        });
    }
}

class MapManager {
    constructor(mapElementId) {
        this.mapHandler = new MapHandler();
        this.mapHandler.initializeMap();
        this.mapHandler.createFireHydrantIcon();
        this.map = this.mapHandler.map;
        this.userMarker = null;
        this.routingControl = null;
        this.searchMarker = null;
        this.hydrantsData = null;
        this.initializeUI();
    }

    getCurrentLocation() {
        if ('geolocation' in navigator) {
            navigator.geolocation.getCurrentPosition((position) => {
                const userLocation = [position.coords.latitude, position.coords.longitude];

                // Remove the search marker if it exists
                if (this.searchMarker) {
                    this.map.removeLayer(this.searchMarker);
                    this.searchMarker = null;
                }

                this.setUserLocation(userLocation);
            });
        }
    }

    loadHydrantsData() {
        $.ajax({
            url: '/fetch-coordinates',
            type: 'GET',
            dataType: 'json',
            success: (data) => {
                this.hydrantsData = data;
                this.mapHandler.addMarkers(data, this);
            },
            error: (error) => {
                console.error('Error fetching data:', error.responseText);
            }
        });

    }

    setUserLocation(userLocation) {
        // Create a marker for the user's current location and store it
        this.userMarker = L.marker(userLocation).addTo(this.map);
        this.map.setView(userLocation, 13.5);

        // Add a contextmenu event listener to the map
        this.map.on('contextmenu', (event) => {
            
            // Iterate through all markers to check if the clicked point is on a fire hydrant marker
            this.map.eachLayer((layer) => {
                if (layer instanceof L.Marker && layer.options.icon === this.mapHandler.fireHydrantIcon) {
                    const markerLatLng = layer.getLatLng();
                    const clickLatLng = event.latlng;

                    // Calculate the distance between the marker and the clicked point
                    const distance = markerLatLng.distanceTo(clickLatLng);

                    // Define a threshold for considering the click on a marker
                    const threshold = 50; // Adjust as needed

                    if (distance < threshold) {
                        // This click is within the threshold of a fire hydrant marker
                        this.handleFireHydrantClick(layer, event);
                    }
                }
            });
        });
    }

    handleSearch() {
        const initialInput = document.getElementById('search-input').value;
        const searchInput = initialInput + ', Cabuyao';
        // Use the Nominatim geocoding service
        this.geocodeLocation(searchInput, (result) => {
            if (result) {   
                const { lat, lon } = result[0]; // Extract the latitude and longitude from the first result
                const location = [lat, lon];
                
                this.map.setView(location, 16); // Set the map view to the searched location
                this.addSearchMarker(location);
                // // Add a 300-meter radius circle around the searched location
                this.addSearchRadius(location, 300);

               
            } else {
                alert('Location not found');
            }
        });
    }


    // Function to add a 300-meter radius circle
    addSearchRadius(location, radius) {
        if (this.searchRadius) {
            this.map.removeLayer(this.searchRadius);
        }

        this.searchRadius = L.circle(location, {
            color: 'lightblue',   // Circle color
            fillColor: 'lightblue', // Fill color
            fillOpacity: 0.7, // Fill opacity
            radius: 300,
        }).addTo(this.map);
    }

    addSearchMarker(location) {
        if (this.searchMarker) {
            this.map.removeLayer(this.searchMarker);
        }

        this.searchMarker = L.marker(location).addTo(this.map);
    }

    initializeUI() {
        // UI Elements
        var hydrantsButton = document.getElementById("view-hydrants-button");
        var routeButton = document.getElementById("route-button");
        var getLocation = document.getElementById("get-location-button");
        var routeContainer = document.getElementById("route-container");
        var closeRouteButton = document.getElementById("close-route-button");
        
        const searchButton = document.getElementById('search-button');
        searchButton.addEventListener('click', this.handleSearch.bind(this));

        const findLocationButton = document.getElementById('find-location-button');

        // Event Listeners
        hydrantsButton.addEventListener("click", function (e) {
            mapManager.loadHydrantsData();
            e.stopPropagation();
        });

        routeButton.addEventListener("click", function (e) {
            const routeContainer = document.getElementById("route-container");
        
            if (routeContainer.style.display === "block") {
                routeContainer.style.display = "none";
            } else {
                routeContainer.style.display = "block";
                document.getElementById('route-container').classList.remove('hidden');
            }
        
            e.stopPropagation();
        });

        getLocation.addEventListener("click", function () {
            mapManager.getCurrentLocation();
        });

        closeRouteButton.addEventListener("click", function () {
            routeContainer.style.display = "none";
        });

        findLocationButton.addEventListener('click', () => {
            // Get the values from the "From" and "To" input fields
            const fromLocation = document.getElementById('from-input').value;
            const toLocation = document.getElementById('to-input').value;

            // Use geocoding to convert the "From" and "To" addresses into coordinates
            this.geocodeLocation(fromLocation, (fromResult) => {
                this.geocodeLocation(toLocation, (toResult) => {
                    if (fromResult && toResult) {
                        const fromLatLng = [fromResult[0].lat, fromResult[0].lon];
                        const toLatLng = [toResult[0].lat, toResult[0].lon];

                        // Display the route on the map
                        this.displayRoute(fromLatLng, toLatLng);
                    } else {
                        alert('One or both locations not found');
                    }
                });
            });
            routeContainer.style.display = "none";
         
        });
    }

    displayRoute(fromLatLng, toLatLng) {
        if (this.routingControl) {
            this.map.removeControl(this.routingControl);
        }

        // Create a routing control and add it to the map
        this.routingControl = L.Routing.control({
            waypoints: [
                L.latLng(fromLatLng),
                L.latLng(toLatLng),
            ],
            routeWhileDragging: true,
        }).addTo(this.map);

        // Close the route container
        document.getElementById('route-container').classList.add('hidden');
    }

    // Use the Nominatim service for geocoding
    geocodeLocation(location, callback) {
        const nominatimUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${location}`;

        fetch(nominatimUrl)
            .then(response => response.json())
            .then(data => {
                callback(data);
            })
            .catch(error => {
                console.error('Error geocoding location:', error);
                callback(null);
            });
    }

    // Function to display 'No hydrant selected'
    displayNoHydrantSelected() {
        const informationDiv = $('.info-content');
        informationDiv.html('No hydrant is selected.');
    }

    displayHydrantInformation(hydrantData) {
        const informationDiv = $('.info-content');
    
        // Create an HTML table to display hydrant information
        const tableHtml = `
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Location</th>
                        <td>${hydrantData.latitude}</td>
                    </tr>
                    <tr>
                        <th scope="row">Location</th>
                        <td>${hydrantData.longitude}</td>
                    </tr>
                    <tr>
                        <th scope="row">Location</th>
                        <td>${hydrantData.location}</td>
                    </tr>
                    <tr>
                        <th scope="row">Pipe Type</th>
                        <td>${hydrantData.pipe_type}</td>
                    </tr>
                    <tr>
                        <th scope="row">Color</th>
                        <td>${hydrantData.color}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>${hydrantData.status}</td>
                    </tr>
                </tbody>
            </table>
        `;
    
        // Replace the content of the informationDiv with the table
        informationDiv.html(tableHtml);
    }

    handleFireHydrantClick(marker, event) {
        
        mapManager.getCurrentLocation();

        const hydrantId = marker.options.hydrantId;
        // Fetch hydrant information from the server
        if (mapManager.getCurrentLocation() !== undefined) {
            $.ajax({
                type: 'GET',
                url: `/bfp-map/${hydrantId}`, // Update with your actual route for fetching hydrant information
                success: (response) => {
                    this.displayHydrantInformation(response);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while fetching hydrant information. Check the console for details.');
                }
            });
        } else {
            // No hydrant selected
            this.displayNoHydrantSelected();
        }
        $.ajax({
            type: 'GET',
            url: `/bfp-map/${hydrantId}`, // Update with your actual route for fetching hydrant information
            success: (response) => {
                this.displayHydrantInformation(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while fetching hydrant information. Check the console for details.');
            }
        });

        // Only initiate routing if the clicked marker is a fire hydrant
        const routingButton = document.createElement('button');
        routingButton.textContent = 'Get Directions';
        routingButton.style.border = 'none';
        routingButton.style.backgroundColor = 'transparent';
        routingButton.style.color = '#0077ff';
        routingButton.style.cursor = 'pointer';

        // Create a popup with the routing button content
        const popup = L.popup({
            closeButton: false,
            className: 'custom-popup',
        })
        .setContent(routingButton);


        // Add the routing control when the button is clicked
        routingButton.addEventListener('click', () => {
            
            if (this.routingControl) {
                this.map.removeControl(this.routingControl);
            }
            
            
            this.routingControl = L.Routing.control({
                waypoints: [
                    
                    L.latLng(marker.getLatLng()), // Use marker's position
                    L.latLng(this.userMarker.getLatLng()), // User's location using the stored marker
                    
                ],
                routeWhileDragging: true,
            }).addTo(this.map);

            // Add a listener to remove the routing control when the popup is closed
            popup.on('remove', () => {
                if (this.routingControl) {
                    this.map.removeControl(this.routingControl);
                    this.routingControl = null;
                }
            });
        });
        

        // Bind the popup to the marker and open it
        marker.bindPopup(popup).openPopup();
    }

}

// Create an instance of the MapManager class
const mapManager = new MapManager('map');
