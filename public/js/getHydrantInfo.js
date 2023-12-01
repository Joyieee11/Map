$(document).ready(function () { 
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
    
    $(document).ready(function () {
        coordinates.forEach(function (coordinate) {
            const marker = L.marker([coordinate.latitude, coordinate.longitude], { icon: customIcon })
                .addTo(map)
    
            // Handle click event on marker
            marker.on('click', function () {
                // Fetch hydrant information from the server
                $.ajax({
                    type: 'GET',
                    url: `/bfp-map/${coordinate.coordinates_id}`, // Update with your actual route for fetching hydrant information
                    success: function (response) {
                        displayHydrantInformation(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred while fetching hydrant information. Check the console for details.');
                    }
                });
            });
        });
    });
});
