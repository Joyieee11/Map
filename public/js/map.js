$(document).ready(function () {
    // Initialize the Leaflet map here using coordinates
    map = L.map('map').setView([14.247142, 121.136673], 13.5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    var customIcon = L.icon({
        iconUrl: 'image/hydrant.webp',
        iconSize: [36, 36],
        iconAnchor: [18, 36],
        popupAnchor: [0, -36]
    });

    map.on('contextmenu', function (e) {
        L.DomEvent.preventDefault(e); // Prevent the default context menu
         
        // Check for nearby hydrants
        const isNearHydrant = checkNearbyHydrants(e.latlng, 0.1); // You can adjust the threshold (0.1 is a sample value)
        
        if (isNearHydrant) {
            alert('Cannot add hydrant there because there are nearby hydrants.');
        } else {
            // Create a button for the recommend hydrant popup
            const recommendButton = document.createElement('button');
            recommendButton.id = 'recommendButton';
            recommendButton.textContent = 'Recommend Adding Hydrant';
            recommendButton.style.border = 'none';
            recommendButton.style.backgroundColor = 'transparent';
            recommendButton.style.color = '#0077ff';
            recommendButton.style.cursor = 'pointer';

            recommendButton.addEventListener('mouseenter', () => {
                recommendButton.style.textDecoration = 'underline';
            });

            recommendButton.addEventListener('mouseleave', () => {
                recommendButton.style.textDecoration = 'none';
            });

            // Pass the event object to popupButtonClick
            recommendButton.addEventListener('click', () => popupRecommendButtonClick(e));


            // Create and open the popup with the button
            popup = L.popup({
                closeButton: false,
                className: 'custom-popup',
            })
                .setLatLng(e.latlng || [0, 0])
                .setContent(recommendButton)
                .openOn(map);
        }


    });

    // Handle the button click
    function popupReportButtonClick(event, coordinate) {
        // Hide the popup when the button is clicked
        map.closePopup();

        // Show the report modal
        $('#reportModal').modal('show');

        // Store the coordinates in hidden inputs in the form
        $('#reportForm').find('input[name="latitude"]').val(coordinate.latitude);
        $('#reportForm').find('input[name="longitude"]').val(coordinate.longitude);

        // Fetch hydrant information from the server
        if (coordinate.coordinates_id !== undefined) {
            $.ajax({
                type: 'GET',
                url: `/map/${coordinate.coordinates_id}`,
                success: function (response) {
                    displayHydrantInformation(response);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while fetching hydrant information. Check the console for details.');
                }
            });
        } else {
            // No hydrant selected
            displayNoHydrantSelected();
        }
    }


    // Handle the button click
    function popupRecommendButtonClick(event) {
        // Hide the popup when the button is clicked
        map.closePopup();

        // Show the confirmation modal when the button is clicked
        $('#addHydrantModal').modal('show');

        // Store the coordinates in a hidden input field in the form
        $('#hydrantForm').find('input[name="latitude"]').val(event.latlng.lat);
        $('#hydrantForm').find('input[name="longitude"]').val(event.latlng.lng);

        // Submit the form when the modal is closed
        $('#addHydrantModal').on('hidden.bs.modal', function () {
            // Hide the popupButton when the modal is closed
            $('.custom-popup').hide();
        });
    }

    // Function to check nearby hydrants within a certain radius
    function checkNearbyHydrants(selectedLocation, radius) {
        // Loop through coordinates array and check distance
        for (const coordinate of coordinates) {
            const distance = calculateDistance(selectedLocation, { latitude: coordinate.latitude, longitude: coordinate.longitude });
            if (distance <= radius) {
                return true; // Nearby hydrant found
            }
        }
        return false; // No nearby hydrant found
    }

    // Function to calculate distance using Haversine formula
    function calculateDistance(coord1, coord2) {
        const R = 6371; // Radius of the Earth in kilometers
        const dLat = (coord2.latitude - coord1.lat) * (Math.PI / 180);
        const dLon = (coord2.longitude - coord1.lng) * (Math.PI / 180);
        const a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(coord1.lat * (Math.PI / 180)) * Math.cos(coord2.latitude * (Math.PI / 180)) * Math.sin(dLon / 2) * Math.sin(dLon / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        const distance = R * c;
        return distance; // Distance in kilometers
    }

    // Handle the form submission
    $('#hydrantForm').submit(function (e) {
        e.preventDefault();

        // Send an AJAX request to the server to store the data
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (response) {
                $('#addHydrantModal').modal('hide');
                alert('Hydrant information added successfully!');
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Log the response text to the console
                alert('An error occurred while submitting the form. Check the console for details.');
            }
        });
        
    });

    // Handle the form submission
    $('#reportForm').submit(function (e) {
        e.preventDefault();

        // Get the selected report reason
        const selectedReason = $('input[name="reportReason"]:checked').val();

        // Get latitude and longitude from hidden inputs
        const latitude = $('#reportForm input[name="latitude"]').val();
        const longitude = $('#reportForm input[name="longitude"]').val();

        // Get the value of "Others" input
        const othersReason = $('#othersInput input[name="othersReason"]').val();

        // Send an AJAX request to the server to store the report
        $.ajax({
            type: 'POST',
            url: '/report', // Update with your actual route for storing reports
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                latitude: latitude,
                longitude: longitude,
                reason: selectedReason,
                othersReason: othersReason, // Add this line to include the "Others" value
            },
            dataType: 'json', // Specify the expected data type
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8', // Specify the content type
            success: function (response) {
                // Clear form fields
                $('#reportForm input[name="latitude"]').val('');
                $('#reportForm input[name="longitude"]').val('');
                $('input[name="reportReason"]').prop('checked', false);
                $('#othersInput input[name="othersReason"]').val('');

                // Close the report modal
                $('#reportModal').modal('hide');
                alert('Report submitted successfully!');
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while submitting the report. Check the console for details.');
            }
        });
    });


    function displayHydrantInformation(hydrantData) {
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

    map.on('click', function () {
        // Clicked outside any hydrant
        displayNoHydrantSelected();
    });

    $('#othersLabel').on('click', function () {
        $('#othersInput').toggle($(this).find('input').prop('checked'));
    });

    
    // Add event listener to hide others input when a specific reason is selected
    $('input[name="reportReason"]').on('click', function () {
        const selectedReason = $(this).val();

        if (selectedReason === 'others') {
            // "Others" selected, show the input
            $('#othersInput').show();
        } else {
            // Any other reason selected, hide the input
            $('#othersInput').hide();
        }
    });

    // Additional logic to show "Others" input when Leak, Damage, or Obstruction is selected
    $('input[name="reportReason"]').on('change', function () {
        const selectedReason = $(this).val();

        if (selectedReason === 'leak' || selectedReason === 'damage' || selectedReason === 'obstruction') {
            $('#othersInput').show();
        } else {
            $('#othersInput').hide();
        }
    });

    coordinates.forEach(function (coordinate) {
        const marker = L.marker([coordinate.latitude, coordinate.longitude], { icon: customIcon })
            .addTo(map)

        // Handle click event on marker
        marker.on('click', function () {
            // Fetch hydrant information from the server
            if (coordinate.coordinates_id !== undefined) {
                // Fetch hydrant information from the server
                $.ajax({
                    type: 'GET',
                    url: `/map/${coordinate.coordinates_id}`,
                    success: function (response) {
                        displayHydrantInformation(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred while fetching hydrant information. Check the console for details.');
                    }
                });
            } else {
                // No hydrant selected
                displayNoHydrantSelected();
            }
        });

        marker.on('contextmenu', function (e) {
            // Prevent the default context menu
            L.DomEvent.preventDefault(e);
    
            // Create a button for the report issue popup
            const reportButton = document.createElement('button');
            reportButton.textContent = 'Report Issue';
            reportButton.style.border = 'none';
            reportButton.style.backgroundColor = 'transparent';
            reportButton.style.color = '#0077ff';
            reportButton.style.cursor = 'pointer';
    
            reportButton.addEventListener('mouseenter', () => {
                reportButton.style.textDecoration = 'underline';
            });
    
            reportButton.addEventListener('mouseleave', () => {
                reportButton.style.textDecoration = 'none';
            });
    
            // Pass the event object to popupReportButtonClick
            reportButton.addEventListener('click', () => popupReportButtonClick(e, coordinate));
    
            // Create and open the popup with the button
            popup = L.popup({
                closeButton: false,
                className: 'custom-popup',
            })
                .setLatLng(e.latlng || [0, 0])
                .setContent(reportButton)
                .openOn(map);
        });
    });

        
    // Function to display 'No hydrant selected'
    function displayNoHydrantSelected() {
        const informationDiv = $('.info-content');
        informationDiv.html('No hydrant is selected.');
    }

});
