var lowercaseLetters = /[a-z]/g;
    var uppercaseLetters = /[A-Z]/g;

    var inputName = document.getElementById("firstname");
    var inputLast = document.getElementById("lastname");

    // inputName.focus();
    inputName.onfocus = function () {
        document.getElementById("firstNameErr").style.display = "block";
    }
    inputName.onblur = function () {
        document.getElementById("firstNameErr").style.display = "none";
    }

    inputName.onkeyup = function () {
        if (inputName.value.match(lowercaseLetters) && inputName.value.match(uppercaseLetters)) {
            document.getElementById("firstNameErrMsg").style.color = "#50d8af";
            document.getElementById("firstNameErrMsg").innerHTML = "Valid";
        } else {
            document.getElementById("firstNameErrMsg").style.color = "red";
            document.getElementById("firstNameErrMsg").innerHTML = "First name should contain only lowercase letters and uppercase letters";
        }
    }

    inputLast.onfocus = function () {
        document.getElementById("lastNameErr").style.display = "block";
    }
    inputLast.onblur = function () {
        document.getElementById("lastNameErr").style.display = "none";
    }

    inputLast.onkeyup = function () {
        if (inputLast.value.match(lowercaseLetters) && inputLast.value.match(uppercaseLetters)) {
            document.getElementById("lastNameErrMsg").style.color = "#50d8af";
            document.getElementById("lastNameErrMsg").innerHTML = "Valid";
        } else {
            document.getElementById("lastNameErrMsg").style.color = "red";
            document.getElementById("lastNameErrMsg").innerHTML = "Last name should contain only lowercase letters and uppercase letters";
        }
    }

    var mobileNum = document.getElementById("mobile");
    mobileNum.onfocus = function () {
        document.getElementById("mobileErr").style.display = "block";
    }
    mobileNum.onblur = function () {
        document.getElementById("mobileErr").style.display = "none";
    }

    mobileNum.onkeyup = function () {
        if (/^\d{10}$/.test(mobileNum.value)) {
            document.getElementById("mobileErrMsg").style.color = "#50d8af";
            document.getElementById("mobileErrMsg").innerHTML = "Valid mobile number";
        } else {
            document.getElementById("mobileErrMsg").style.color = "red";
            document.getElementById("mobileErrMsg").innerHTML = "Invalid mobile number";
        }
    }

    var inputEmail = document.getElementById("email");
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    inputEmail.onfocus = function () {
        document.getElementById("emailErr").style.display = "block";
    }
    inputEmail.onblur = function () {
        document.getElementById("emailErr").style.display = "none";
    }

    inputEmail.onkeyup = function () {
        if (reg.test(inputEmail.value)) {
            document.getElementById("emailErrMsg").style.color = "#50d8af";
            document.getElementById("emailErrMsg").innerHTML = "Valid Email";
        } else {
            document.getElementById("emailErrMsg").style.color = "red";
            document.getElementById("emailErrMsg").innerHTML = "Invalid E-mail | E.g : username@domain.com";
        }
    }



