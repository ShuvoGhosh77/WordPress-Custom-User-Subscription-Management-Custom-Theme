jQuery(document).ready(function ($) {

  // start select-screening page js 
  var selectedOption = null;
  $('#next-button').hide();

  $('.screening-box').click(function () {
    $('.screening-box').removeClass('selected');
    $(this).addClass('selected');
    selectedOption = $(this).data('page');
    $('#next-button').show();
  });

  $('#next-button').click(function () {
    if (selectedOption) {
      window.location.href = selectedOption;
    }
  });

  // Get the elements
  var $popupToggle = $("#popupToggle");
  var $popupBox = $("#popupBox");
  var $popupClose = $("#popupClose");

  // Add event listener to toggle button
  $popupToggle.on("click", function () {
    // Toggle the display of the popup box
    if ($popupBox.css("display") === "none") {
      $popupBox.fadeIn(100);
    } else {
      $popupBox.fadeOut(100);
    }
  });

  // Add event listener to close button
  $popupClose.on("click", function () {
    // Hide the popup box
    $popupBox.fadeOut(100);
  });

  // end select-screening page js 


  // height rang slider for input 
  $('.input-range').each(function () {
    var value = parseFloat($(this).attr('data-slider-value'));

    $(this).slider({
      formatter: function (value) {
        return formatHeight(value);
      },
      min: parseFloat($(this).attr('data-slider-min')),
      max: parseFloat($(this).attr('data-slider-max')),
      step: parseFloat($(this).attr('data-slider-step')),
      value: value,
      tooltip: customTooltip
    });
  });

  $('#heightForm').submit(function (e) {
    e.preventDefault();
    var height = $('.input-range').slider('getValue');
    var formattedHeight = formatHeight(height);
    console.log('Height submitted:', formattedHeight);
  });

  function formatHeight(height) {
    var feet = Math.floor(height);
    var inches = Math.round((height - feet) * 12);
    if (inches === 12) {
      feet++;
      inches = 0;
    }
    return feet + (inches !== 0 ? "`" + inches : "");
  }

  function customTooltip(sliderValue) {
    return formatHeight(sliderValue);
  }

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

  // Mansory Grid JS
  var $grid = $('.masonry-grid').masonry({
    itemSelector: '.col-lg-4',
    columnWidth: '.col-lg-4',
    horizontalOrder: true
  });

  // DivineCountrySelect using jQuery
  const $DivineCountrySelect = $("#dm-country");

  // Function to fetch the list of countries
  async function fetchLocationCountries() {
    try {
      const response = await fetch("https://restcountries.com/v2/all");
      const countries = await response.json();

      // Check if the country select element exists before trying to add options
      if ($DivineCountrySelect.length > 0) {
        countries.forEach((country) => {
          const option = $("<option></option>").val(country.alpha2Code).text(country.name);
          $DivineCountrySelect.append(option);
        });
      }
    } catch (error) {
      console.error("Error fetching countries for Divine Country Select:", error);
    }
  }

  // Call the function to populate the country list
  fetchLocationCountries();

});



// register popup 
document.addEventListener("DOMContentLoaded", function () {
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



// // contact form Divine Meet page

// // DivineCountrySelect
// const DivineCountrySelect = document.getElementById("dm-country");

// // Function to fetch the list of countries
// async function fetchLocationCountries() {
//   const response = await fetch("https://restcountries.com/v2/all");
//   const countries = await response.json();
//   return countries;
// }

// // Generate options for countries in DivineCountrySelect
// fetchLocationCountries()
//   .then((countries) => {
//     countries.forEach((country) => {
//       const option = new Option(country.name, country.alpha2Code);
//       DivineCountrySelect.add(option);
//     });
//   })
//   .catch((error) => {
//     console.error("Error fetching countries for Divine Country Select:", error);
//   });



/*

// PASSWORD MISMATCH ERROR JS
 var passwordInput = document.getElementById("ResetNewPassword");
 var confirmPasswordInput = document.getElementById("confirmNewPassword");
 var passwordMismatchError = document.getElementById("passwordMismatchError");

 // Add event listener to form submission
 document.querySelector("form").addEventListener("submit", function (event) {
     event.preventDefault(); // Prevent form submission

     // Check if passwords match
     if (passwordInput.value !== confirmPasswordInput.value) {
         // Show password mismatch error message
         passwordMismatchError.style.display = "block";
     } else {
         // Hide password mismatch error message
         passwordMismatchError.style.display = "none";

         // Show success toast
         var passwordToast = document.getElementById("passwordToast");
         var toast = new bootstrap.Toast(passwordToast);
         toast.show();

         // Clear the password fields
         passwordInput.value = "";
         confirmPasswordInput.value = "";
     }
 });

 // Add event listener to confirmPasswordInput for realtime validation
 confirmPasswordInput.addEventListener("input", function () {
     if (passwordInput.value === confirmPasswordInput.value) {
         // Hide password mismatch error message
         passwordMismatchError.style.display = "none";
     }
 });


*/


// UPDATE PASSWORD EYE TOGGLE
function toggleCurrentPassword(currentPassword) {
  const passwordInput = document.getElementById(currentPassword);
  const passwordToggle = document.querySelector('.password-toggle-current');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-hide.png" alt="">';
  } else {
    passwordInput.type = 'password';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-view.png" alt="">';
  }
}
function toggleNewPassword(newPassword) {
  const passwordInput = document.getElementById(newPassword);
  const passwordToggle = document.querySelector('.password-toggle-new');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-hide.png" alt="">';
  } else {
    passwordInput.type = 'password';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-view.png" alt="">';
  }
}



// RESET PASSWORD EYE TOGGLE
function togglePassword(ResetNewPassword) {
  const passwordInput = document.getElementById(ResetNewPassword);
  const passwordToggle = document.querySelector('.new-password-toggle');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-hide.png" alt="">';
  } else {
    passwordInput.type = 'password';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-view.png" alt="">';
  }
}

function togglePasswordTwo(confirmNewPassword) {
  const passwordInput = document.getElementById(confirmNewPassword);
  const passwordToggle = document.querySelector('.confirm-password-toggle');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-hide.png" alt="">';
  } else {
    passwordInput.type = 'password';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-view.png" alt="">';
  }
}


// VERIFY ACCOUNT PASSWORD EYE TOGGLE
function deletetogglePassword(DelPasswordVerify) {
  const passwordInput = document.getElementById(DelPasswordVerify);
  const passwordToggle = document.querySelector('.password-toggle');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-hide.png" alt="">';
  } else {
    passwordInput.type = 'password';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-view.png" alt="">';
  }
}

// VERIFY ACCOUNT PASSWORD EYE TOGGLE
function deletetogglePassword(DelPasswordVerify) {
  const passwordInput = document.getElementById(DelPasswordVerify);
  const passwordToggle = document.querySelector('.password-toggle');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-hide.png" alt="">';
  } else {
    passwordInput.type = 'password';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-view.png" alt="">';
  }
}

// UPDATE EMAIL CONFIRM PASSWORD EYE TOGGLE
function EmaiUpdatePassword(EmaiUpdatePassword) {
  const passwordInput = document.getElementById(EmaiUpdatePassword);
  const passwordToggle = document.querySelector('.UpdateEmail-password-toggle');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-hide.png" alt="">';
  } else {
    passwordInput.type = 'password';
    passwordToggle.innerHTML = '<img src="http://mysight.test/wp-content/uploads/2025/05/eye-view.png" alt="">';
  }
}




/****************************************************
      Add  Question part  for general-screening page
*******************************************************/


document.getElementById('add-question-btn').addEventListener('click', function () {
  const container = document.querySelector('.question-container');
  const addButton = document.getElementById('add-question-btn');

  // Count existing questions
  const currentQuestions = container.querySelectorAll('textarea[name="questions[]"]').length;

  if (currentQuestions >= 7) {
    alert('You can only add a maximum of 7 questions.');
    return;
  }

  // Create a new input group
  const newQuestion = document.createElement('div');
  newQuestion.className = 'input-group';

  newQuestion.innerHTML = `
        <span class="input-group-text p-0 border-0 bg-white">
            <img src="http://mysight.test/wp-content/uploads/2025/05/minus-img.png" alt="Remove Question" class="remove-question">
        </span>
        <textarea name="questions[]" class="form-control ms-2" placeholder="Type your question here..." maxlength="100"></textarea>
    `;

  // Insert the new question before the button
  container.insertBefore(newQuestion, addButton);
});

// Handle removal
document.querySelector('.question-container').addEventListener('click', function (e) {
  if (e.target.classList.contains('remove-question')) {
    e.target.closest('.input-group').remove();
  }
});

/************************************************************
      Add  Question part  for general-screening page end
*************************************************************/

