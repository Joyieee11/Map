$(document).ready(function () {
    // Function to update the table with new account data
    function updateAccountTable(data) {

        var newRowAccount =
            '<tr>' +
            '<td>' + data.account_number + '</td>' +
            '<td>' + data.full_name + '</td>' +
            '<td>' + data.position + '</td>' +
            '<td>' + data.gender + '</td>' +
            '<td>' + data.address + '</td>' +
            '<td>' + data.birthday + '</td>' +
            '<td class="action-buttons"><button class="btn btn-info btn-sm update-info" data-toggle="modal" data-target="#updateAccountModal" data-user-id="' 
            + data.user_id + 
            '">Update</button><button class="btn btn-info btn-sm archive-btn">Archive</button></td>' +
            '</tr>';

        // Append the new row to the table body
        $('#userInformation tbody').append(newRowAccount);

    }

    // Function to load data into the table on page load
    function loadData() {
        $.ajax({
            type: 'GET', // Use GET method to retrieve data
            url: '/get-users', // Replace with the actual server endpoint to fetch data
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    if (Array.isArray(response.data)) {
                        // Loop through the data and update the table
                        response.data.forEach(function (data) {
                            updateAccountTable(data);
                        });
                    } else {
                        // Update the table or perform other actions as needed
                        updateAccountTable(response.data);
                    }
                } else {
                    console.log('Error fetching data: ' + response.message);
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
    loadData();

    // Submit form using Ajax
    $('#createAccount').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/create-account', 
            data: $(this).serialize(),
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    // Update the table with the new account data
                    updateTable(response.data);

                    // Reset the form fields
                    $('#createAccount')[0].reset();

                    // Optionally, close the modal
                    $('#createAccountModal').modal('hide');
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
