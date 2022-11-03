let userType = document.getElementById("user_type");

userType.value = 'patient';

displayFields();

userType.onchange = displayFields;

function displayFields() {
  if (userType.value == "admin") {
    hidePatientFields();
    hideCommonFields();
  } else if (userType.value == "patient") {
    showCommonFields();
    showPatientFields();
  } else if (userType.value == "specialist") {
    hidePatientFields();
    showCommonFields();
  } else if (userType.value == "") {
    hideCommonFields();
    hidePatientFields();
  }
}

function hidePatientFields() {
  let patientFields = document.getElementById("patient_fields");
  let dob = document.getElementById("dob");

  patientFields.classList.add("d-none");
  dob.required = false;
  dob.disabled = true;
}

function hideCommonFields() {
  let commonFields = document.getElementById("common_fields");
  let location = document.getElementById("location");

  commonFields.classList.add("d-none");
  location.required = false;
  location.disabled = true;
}

function showPatientFields() {
  let patientFields = document.getElementById("patient_fields");
  let dob = document.getElementById("dob");

  patientFields.classList.remove("d-none");
  dob.required = true;
  dob.disabled = false;
}

function showCommonFields() {
  let commonFields = document.getElementById("common_fields");
  let location = document.getElementById("location");

  commonFields.classList.remove("d-none");
  location.required = true;
  location.disabled = false;
}

// Password Verification
let password = document.getElementById("password");
let confirmPassword = document.getElementById("confirm_password");

password.onchange = validatePassword;
confirmPassword.onkeyup = validatePassword;

function validatePassword() {
  if (password.value != confirmPassword.value) {
    confirmPassword.setCustomValidity("Passwords Don't Match");
  } else {
    confirmPassword.setCustomValidity("");
  }
}
