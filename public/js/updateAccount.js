$(document).ready(function () {
    // Function to handle update button click
    $(document).on('click', '.update-info', function () {
        var userId = $(this).data('user-id');
        // Perform an AJAX request to get the user data for the selected user ID
        $.ajax({
            type: 'GET',
            url: '/get-user/' + userId, // Use a Laravel route to get user data
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Populate the update modal with the user data
                    $('#updateFullName').val(response.data.full_name);
                    $('#updateGender').val(response.data.gender);
                    $('#updateAddress').val(response.data.address);

                    // Open the update modal
                    $('#updateAccountModal').modal('show');
                } else {
                    console.log('Error fetching user data: ' + response.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('AJAX Error: ' + textStatus);
            }
        });

        // Update form submission
        $('#updateForm').submit(function (e) {
            e.preventDefault();
            // Retrieve the updated data from the form
            var updatedData = {
                userId: userId,
                fullName: $('#updateFullName').val(),
                gender: $('#updateGender').val(),
                address: $('#updateAddress').val(),
                // Add other fields as needed
            };
            // Perform an AJAX request to update the user data
            $.ajax({
                type: 'POST',
                url: '/update-user', // New Laravel route for the update operation
                data: updatedData,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        // Optionally, update the table with the updated data
                        var userId = updatedData.userId;
                        var updatedRow = findTableRow(userId);

                        // Update relevant cells in the table row
                        updatedRow.find('td:eq(1)').text(response.data.full_name);
                        updatedRow.find('td:eq(3)').text(response.data.gender);
                        updatedRow.find('td:eq(4)').text(response.data.address);
                    } else {
                        console.log('Error updating user data: ' + response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('AJAX Error: ' + textStatus);
                    console.log('Full Response:', jqXHR.responseText);
                }
            });
        });
    });

    // Function to find the table row by user ID
    function findTableRow(userId) {
        return $('table tbody tr').filter(function () {
            return $(this).find('td:eq(6) button.update-info').data('user-id') == userId;
        });
    }
});
