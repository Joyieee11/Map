$(document).ready(function () {
    // Function to update the table with new account data
    function updateGenerateReportTable(data) {
        console.log(data);
        var newRowReport =
            '<tr>' + 
            '<td>' + data.hydrant_id + '</td>' +
            '<td>' + data.before + '</td>' +
            '<td>' + data.during + '</td>' +
            '<td>' + data.after + '</td>' +
            '<td class="action-buttons"><button class="btn btn-info btn-sm data-toggle="modal">View Hydrant Status</button></tr>';

        // Append the new row to the table body
        $('#generateReport tbody').append(newRowReport);

    }

    // Function to load data into the table on page load
    function loadReport() {
        $.ajax({
            type: 'GET', // Use GET method to retrieve data
            url: '/get-generate-report', // Replace with the actual server endpoint to fetch data
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    if (Array.isArray(response.data)) {
                        // Loop through the data and update the table
                        response.data.forEach(function (data) {
                            updateGenerateReportTable(data);
                        });
                    } else {
                        var spanRow = '<td class="col-span" colspan="5">No data Found</td>';
                        $('#generateReport tbody').append(spanRow);
                    }
                } else {
                    var spanRow = '<td class="col-span" colspan="5">No data Found</td>';
                    $('#generateReport tbody').append(spanRow);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('AJAX Error: ' + textStatus);
                console.log('Error: ' + jqXHR);
                console.log('Error: ' + errorThrown);
            }
        });
    }

    // Load data into the table on page load
    loadReport();

    // Submit form using Ajax
    $('#createReport').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/create-report', 
            data: $(this).serialize(),
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    // Update the table with the new account data
                    updateGenerateReportTable(response.data);

                    // Reset the form fields
                    $('#createReport')[0].reset();

                    // Optionally, close the modal
                    $('#createReportModal').modal('hide');
                } else {
                    alert(response.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('AJAX Error: ' + textStatus);
                console.log('Error Details: ', errorThrown);
                console.log('Error Details: ', jqXHR);
            }
        });
    });

});
