// Sample user data (replace with actual data)
const user = {
    username: 'john_doe',
    email: 'john.doe@example.com',
    profileImage: 'profile.jpg',
};

// Function to display user details on the page
function displayUserDetails() {
    const sections = ['dashboard', 'orders', 'update-profile', 'my-address', 'change-password', 'logout'];

    sections.forEach(sectionId => {
        const section = document.getElementById(sectionId);
        if (section) {
            switch (sectionId) {
                case 'dashboard':
                    section.innerHTML = `<h2>Welcome, ${user.username}!</h2><p>Email: ${user.email}</p>`;
                    break;
                // Add additional cases for other sections if needed
            }
        }
    });
}

// Display user details when the page is loaded
window.onload = displayUserDetails;

function handleChangePassword() {
    const currentPassword = document.getElementById('current-password').value;
    const newPassword = document.getElementById('new-password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const errorMessage = document.getElementById('error-message');

    if (currentPassword === '' || newPassword === '' || confirmPassword === '') {
        errorMessage.innerText = 'Please fill in all fields.';
    } else if (newPassword !== confirmPassword) {
        errorMessage.innerText = 'New password and confirm password do not match.';
    } else {
        // TODO: Add logic to handle password change (send request to server, etc.)
        errorMessage.innerText = 'Password changed successfully!';
        // Optionally, clear the form fields after successful change
        ['current-password', 'new-password', 'confirm-password'].forEach(fieldId => {
            document.getElementById(fieldId).value = '';
        });
    }
}

function handleUpdateProfile() {
    const newUsername = document.getElementById('username').value;
    const newEmail = document.getElementById('email').value;
    const newAddress = document.getElementById('address').value;
    const updateProfileMessage = document.getElementById('update-profile-message');

    // TODO: Add logic to send the updated profile information to the server
    // For now, let's just display a message
    updateProfileMessage.innerText = 'Profile updated successfully!';
}
