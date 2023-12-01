function toggleSidebar() {
    var sidebar = document.getElementById('infoSidebar');
    var arrowIcon = document.getElementById('arrow');

    if (sidebar.style.left === '-350px') {
        sidebar.style.left = '0';
        arrowIcon.classList.add('arrow-open');
    } else {
        sidebar.style.left = '-350px';
        arrowIcon.classList.remove('arrow-open');
    }
}


$(document).ready(function(){    
    $("#notification-icon").click(function () {
        $("#notification-dropdown").toggle();
    });

    // User dropdown toggle
    $("#user-icon").click(function () {
        $("#user-dropdown-menu").toggle();
    });

    // Close the dropdown if the user clicks outside of it
    $(document).click(function (event) {
        if (!event.target.matches('#notification-icon')) {
            var dropdown = $("#notification-dropdown");
            if (dropdown.is(":visible")) {
                dropdown.hide();
            }
        }

        // Close the user dropdown if the user clicks outside of it
        if (!event.target.matches('#user-icon')) {
            var dropdown = $("#user-dropdown-menu");
            if (dropdown.is(":visible")) {
                dropdown.hide();
            }
        }
    });
});

let notificationCount = 0;
let isMapView = false;

// Function to close the user profile modal.
function closeProfileModal() {
    // Close the modal when the close button is clicked
    const profileModal = document.getElementById('profileModal');
    profileModal.style.display = 'none';
}

function logoutClick() {
    const confirmLogout = confirm("Are you sure you want to logout?");

    if (confirmLogout) {
        // Redirect to the home page after logout
        window.location.href = "{{ url('/logout') }}";
    }
}

function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var eyeIcon = document.querySelector(".toggle-password i");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}

function getUserInfomartion(){
    const profileModal = document.getElementById('profileModal');
    profileModal.style.display = 'block';

    $.ajax({
        url: "/get-users-info", // Assuming you have a route named 'get.user.info' in your Laravel routes
        method: "GET",
        success: function (response) {
            // Update modal with user information
            const data = response.data;
            
            $('#fullName').text(data.full_name);
            $('#position').text(data.position_text);
            $('#gender').text(data.gender);
            $('#address').text(data.address);
            $('#birthday').text(data.birthday);
        },
        error: function (error) {
            console.log(error);
        }
    });
}