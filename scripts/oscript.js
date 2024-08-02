function showNextSection() {
    var nameField = document.getElementById("name");
    var dobField = document.getElementById("dob");
    var emailField = document.getElementById("email");
    var genderFields = document.querySelectorAll("#personal-information input[name='gender']");
    var passwordField = document.getElementById("password");
    var confirmPasswordField = document.getElementById("con-password");
    var ownercontactfield = document.getElementById("ownercontact");

    // Check if all fields in the personal information section are filled
    if (nameField.value.trim() === '') {
        alert("Please enter your name.");
        return;
    }
    if (dobField.value.trim() === '') {
        alert("Please enter your date of birth.");
        return;
    }
    if (emailField.value.trim() === '') {
        alert("Please enter your email.");
        return;
    }
    if (ownercontactfield.value.trim() === '') {
        alert("Please enter your Contact Number.");
        return;
    }
    if (!Array.from(genderFields).some(field => field.checked)) {
        alert("Please select your gender.");
        return;
    }
    if (passwordField.value.trim() === '') {
        alert("Please enter a password.");
        return;
    }
    if (confirmPasswordField.value.trim() === '') {
        alert("Please confirm your password.");
        return;
    }
    if (passwordField.value !== confirmPasswordField.value) {
        alert("Passwords do not match. Please try again.");
        return;
    }

    // If all fields are filled, proceed to the next section
    document.getElementById("resort-information").style.display = "block";
    document.getElementById("personal-information").style.display = "none";
} 

function validatepart2() {
    var resortNameField = document.getElementById("resort-name");
    var resortTypeField = document.getElementById("resort-type");
    var accommodationTypeField = document.getElementById("accommodation-type");
    var resortAddressField = document.getElementById("resort-address");
    var resortContactField = document.getElementById("resort-contact");
    var licenseField = document.getElementById("license");
    var termsCheckbox = document.getElementById("terms");

    // Check if all fields in the resort information section are filled
    if (resortNameField.value.trim() === '') {
        alert("Please enter the resort name.");
        return;
    }
    if (resortTypeField.value === '') {
        alert("Please select the resort type.");
        return;
    }
    if (accommodationTypeField.value === '') {
        alert("Please select the accommodation type.");
        return;
    }
    if (resortAddressField.value.trim() === '') {
        alert("Please enter the resort address.");
        return;
    }
    if (resortContactField.value.trim() === '') {
        alert("Please enter the resort contact information.");
        return;
    }
    if (licenseField.value.trim() === '') {
        alert("Please upload the license.");
        return;
    }
    if (!termsCheckbox.checked) {
        alert("Please agree to the terms and conditions.");
        return;
    }
    
    var submitButton = document.getElementById("submit-button");
        submitButton.name = "submit";
    //after nested ifs, submission na dito sa dulong part. Create submission logic.
}


/* Release sa comment if need mag debug then wrap the validations para mas madali mag debug
function showNextSection() {
    document.getElementById("resort-information").style.display = "block";
    document.getElementById("personal-information").style.display = "none";
}*/
function backSection() {
    document.getElementById("resort-information").style.display = "none";
    document.getElementById("personal-information").style.display = "block";
}



// File Upload sheesh.
function checkFileSize(input) {
    const maxFileSize = 5 * 1024 * 1024;
    const files = input.files;
    
    if (files.length > 0) {
      const fileSize = files[0].size;
      
      if (fileSize > maxFileSize) {
        alert('The uploaded file is too large. Please select a file that is smaller than 5MB in size.');
        input.value = '';
      }
    }
  }


// Get the current date
var currentDate = new Date();

// Format the date as "YYYY-MM-DD"
var formattedDate = currentDate.getFullYear() + "-" + padNumber(currentDate.getMonth() + 1) + "-" + padNumber(currentDate.getDate());

// Set the value of the date input
document.getElementById("myDateInput").value = formattedDate;

// Function to pad single digits with leading zeros
function padNumber(num) {
  return num < 10 ? "0" + num : num;
}

