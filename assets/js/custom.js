jQuery(document).ready(function ($) {
    // Upload Box 1
    var uploadBox = document.getElementById('uploadBox');
    var chooseFileLink = document.getElementById('chooseFileLink');
    var fileList = document.getElementById('fileList');
  
    if (uploadBox) {
      uploadBox.addEventListener('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        uploadBox.classList.add('dragover');
      });
  
      uploadBox.addEventListener('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        uploadBox.classList.remove('dragover');
      });
  
      uploadBox.addEventListener('drop', function (e) {
        e.preventDefault();
        e.stopPropagation();
        uploadBox.classList.remove('dragover');
        var files = e.dataTransfer.files;
        handleFiles1(files);
      });
  
      chooseFileLink.addEventListener('click', function () {
        document.getElementById('photos').click();
      });
  
      document.getElementById('photos').addEventListener('change', function (e) {
        var files = e.target.files;
        handleFiles1(files);
      });
  
      function handleFiles1(files) {
        for (var i = 0; i < files.length; i++) {
          var file = files[i];
          var listItem = document.createElement('li');
          listItem.className = 'upload-file-item';
          listItem.textContent = file.name;
          fileList.appendChild(listItem);
        }
      }
    }
  
    // Upload Box 2
    var uploadBox2 = document.getElementById('uploadBox2');
    var chooseFileLink2 = document.getElementById('chooseFileLink2');
    var fileList2 = document.getElementById('fileList2');
  
    if (uploadBox2) {
      uploadBox2.addEventListener('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        uploadBox2.classList.add('dragover');
      });
  
      uploadBox2.addEventListener('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        uploadBox2.classList.remove('dragover');
      });
  
      uploadBox2.addEventListener('drop', function (e) {
        e.preventDefault();
        e.stopPropagation();
        uploadBox2.classList.remove('dragover');
        var files = e.dataTransfer.files;
        handleFiles2(files);
      });
  
      chooseFileLink2.addEventListener('click', function () {
        document.getElementById('photos2').click();
      });
  
      document.getElementById('photos2').addEventListener('change', function (e) {
        var files = e.target.files;
        handleFiles2(files);
      });
  
      function handleFiles2(files) {
        for (var i = 0; i < files.length; i++) {
          var file = files[i];
          var listItem = document.createElement('li');
          listItem.className = 'upload-file-item';
          listItem.textContent = file.name;
          fileList2.appendChild(listItem);
        }
      }
    }
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


