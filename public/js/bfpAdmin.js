$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    $("#sidebar").toggleClass("show");
});

// Added script to toggle the "Exit" button
$(window).resize(function() {
    if (window.innerWidth <= 992) {
        $("#dismiss, #exit-sidebar-btn").show();
    } else {
        $("#dismiss, #exit-sidebar-btn").hide();
    }
});

// Function to close the sidebar
function closeSidebar() {
    $("#wrapper").removeClass("toggled");
    $("#sidebar").removeClass("show");
}



function searchHydrant() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("hydrant-search");
    filter = input.value.toUpperCase();
    table = document.querySelector(".table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Assuming Location is the second column
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function archiveHydrant() {
    // Add logic here to handle the archiving of the hydrant
    // For example, you can remove the row from the table or update its status
    alert("Hydrant archived!");
}

function generateReport() {
    // Get the selected report type
    var reportType = document.getElementById("report-type").value;

    // Add your logic here to generate the report based on the selected type
    alert("Generating " + reportType + " report...");
}

function showContent(contentType) {
    // Hide view-request-details
    $("#view-request-details").hide();

    // Hide all content divs
    $("#dashboard-content, #hydrant-content, #maintenance-content, #report-content").hide();

    // Show the selected content
    $("#" + contentType + "-content").show();

    // Change color for the active link
    $(".nav-link").removeClass("active");
    $("#" + contentType + "-link").addClass("active");
    $(".nav-item-link").removeClass("active");
    $("#" + contentType + "-link-info").addClass("active");
    
}

var hydrantDropdownVisible = false;

function toggleHydrantDropdown() {
    $("#hydrant-dropdown").toggle();
}

function showHydrantInfo() {
    // Logic to display Hydrant Information content
    showContent('hydrant');
    // Additional logic if needed
}

function showHydrantMaintenance() {
    // Logic to display Hydrant Maintenance content
    showContent('maintenance');
    // Additional logic if needed
}

$(document).ready(function () {
    // Hide the hydrant dropdown by default
    $("#hydrant-dropdown").hide();

    // Close the hydrant dropdown if the user clicks outside of it
    $(document).click(function (event) {
        var hydrantDropdown = $("#hydrant-dropdown");

        if (!event.target.matches('#manage-link') && !hydrantDropdown.has(event.target).length) {
            hydrantDropdown.hide();
            hydrantDropdownVisible = false;
        }
    });

    $("#dashboard-content").show();
    $("#hydrant-content").hide();
    $("#maintenance-content").hide();
    $("#report-content").hide();

    $("#dashboard-link").click(function () {
        showContent("dashboard");
    });
  
    $("#hydrant-link-info").click(function () {
        showContent("hydrant");
    });
  
    $("#maintenance-link-info").click(function () {
        showContent("maintenance");
    });

    $("#report-link").click(function () {
        showContent("report");
    });

});

document.addEventListener("DOMContentLoaded", function () {
    // Add event listener to all update buttons with class 'update-btn'
    const updateButtons = document.querySelectorAll('.update-btn');
    
    updateButtons.forEach(button => {
      button.addEventListener('click', function () {
        // Get the row data
        const row = this.closest('tr');
        const accountNumber = row.cells[0].innerText;
        const fullName = row.cells[1].innerText;
        const gender = row.cells[3].innerText;
        const address = row.cells[4].innerText;

        // Populate the modal fields
        document.getElementById('updateFullName').value = fullName;
        document.getElementById('updateGender').value = gender;
        document.getElementById('updateAddress').value = address;

        // Show the modal
        $('#updateAccountModal').modal('show');
      });
    });

    // Add submit event listener to updateForm
    document.getElementById('updateForm').addEventListener('submit', function (event) {
      // Prevent the default form submission
      event.preventDefault();

      // Add your code to handle the form submission (e.g., send an AJAX request to update the data)

      // Close the modal
      $('#updateAccountModal').modal('hide');
    });
  });

  function updateHydrant() {
    // Add your logic to handle the update here
    // You may use JavaScript or AJAX to handle the update process
    // After updating, you can close the modal using: $('#updateModal').modal('hide');
}