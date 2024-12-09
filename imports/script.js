function showSuccess(input) {
    const small = document.querySelector('small');
    small.innerText = '';
}

function showError(input, message) {
    const small = document.querySelector('small');
    small.innerText = message;
}

function addHyphens(input) {
    const cleanedValue = input.value.replace(/[^A-Za-z0-9]/g, '');
    let formattedValue = '';
    for (let i = 0; i < cleanedValue.length; i++) {
        if (i === 2 || i === 4 || i === 6) {
            formattedValue += '-';
        }
        formattedValue += cleanedValue[i];
    }

    input.value = formattedValue.toUpperCase();
}

function validateEmail(input) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (regex.test(input.value)) {
        showSuccess(input);
    } else {
        showError(input, 'Email is not valid');
    }
}

function confirmEmail(input, emailInput) {
    if (input.value === emailInput.value) {
        showSuccess(input);
    } else {
        showError(input, 'Emails do not match');
    }
}

function validatePassword(input) {
    const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
    if (regex.test(input.value)) {
        showSuccess(input);
    } else {
        showError(input, 'Password is not valid');
    }
}

function confirmPassword(input, passwordInput) {
    if (input.value === passwordInput.value) {
        showSuccess(input);
    } else {
        showError(input, 'Passwords do not match');
    }
}

function validatePhone(input) {
    const regex = /^\d{10}$/;
    if (regex.test(input.value)) {
        showSuccess(input);
    } else {
        showError(input, 'Phone number is not valid');
    }
}

function validateUsername(input) {
    const regex = /^[a-zA-Z0-9]{3,}$/;
    if (regex.test(input.value)) {
        showSuccess(input);
    } else {
        showError(input, 'Username is not valid');
    }
}

function validateName(input) {
    const regex = /^[a-zA-Z]{3,}$/;
    if (regex.test(input.value)) {
        showSuccess(input);
    } else {
        showError(input, 'Name is not valid');
    }
}

function onlyNumbers (input) {
    //remove letter and special characters
    const regex = /^[0-9]{6}$/;
    const newInput = input.value.replace(/[^0-9]/g, '');

    input.value = newInput;
}