jQuery(document).ready(function ($) {
   
});

// register popup 
document.addEventListener("DOMContentLoaded", function() {
    const popup = document.getElementById('register-success-popup');
    if (popup) {
        popup.style.display = 'flex';
    }
});

/****************************************************
       Update Password Account Settings page start
*******************************************************/
function toggleCurrentPassword(currentPassword) {
    const passwordInput = document.getElementById(currentPassword);
    const passwordToggle = document.querySelector('.password-toggle-current');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggle.innerHTML = '<i class="far fa-eye-slash"></i>';
    } else {
        passwordInput.type = 'password';
        passwordToggle.innerHTML = '<i class="far fa-eye"></i>';
    }
  }
  function toggleNewPassword(newPassword) {
    const passwordInput = document.getElementById(newPassword);
    const passwordToggle = document.querySelector('.password-toggle-new');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggle.innerHTML = '<i class="far fa-eye-slash"></i>';
    } else {
        passwordInput.type = 'password';
        passwordToggle.innerHTML = '<i class="far fa-eye"></i>';
    }
  }
  

  // UPDATE EMAIL CONFIRM PASSWORD EYE TOGGLE
function EmaiUpdatePassword(EmaiUpdatePassword) {
    const passwordInput = document.getElementById(EmaiUpdatePassword);
    const passwordToggle = document.querySelector('.UpdateEmail-password-toggle');
  
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggle.innerHTML = '<i class="far fa-eye-slash" aria-hidden="true"></i>';
    } else {
        passwordInput.type = 'password';
        passwordToggle.innerHTML = '<i class="far fa-eye" aria-hidden="true"></i>';
    }
  }
  
  /****************************************************
       Update Password Account Settings page end
*******************************************************/


/****************************************************
       Deletet  Account 
*******************************************************/
// VERIFY ACCOUNT PASSWORD EYE TOGGLE
function deletetogglePassword(DelPasswordVerify) {
    const passwordInput = document.getElementById(DelPasswordVerify);
    const passwordToggle = document.querySelector('.password-toggle');
  
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggle.innerHTML = '<i class="far fa-eye-slash" aria-hidden="true"></i>';
    } else {
        passwordInput.type = 'password';
        passwordToggle.innerHTML = '<i class="far fa-eye" aria-hidden="true"></i>';
    }
  }