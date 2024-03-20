const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function() {
    document.querySelector("#sidebar").classList.toggle("expand");
});



  // Toggle visibility of password
  function togglePasswordVisibility(inputId, buttonId) {
    const passwordInput = document.getElementById(inputId);
    const toggleButton = document.getElementById(buttonId);

    toggleButton.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        toggleButton.querySelector('i').classList.toggle('fa-eye-slash');
        toggleButton.querySelector('i').classList.toggle('fa-eye');
    });
}

// Toggle visibility of current password
togglePasswordVisibility('currentPassword', 'toggleCurrentPassword');

// Toggle visibility of new password
togglePasswordVisibility('newPassword', 'toggleNewPassword');

// Toggle visibility of confirm password
togglePasswordVisibility('confirmPassword', 'toggleConfirmPassword');