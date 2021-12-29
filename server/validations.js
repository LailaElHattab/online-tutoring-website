function validateLog(form) {
    var fail = "";
    if (form.email.value == "") {
        fail += "Please Enter your email";
    }
    if (form.password.value == "") {
        fail += "Please Enter your password";
    }
    if (fail == "") {
        return true;
    }
    else {
        alert(fail);
        return false;
    }
}

function validateEdit(form) {
    var fail = "";
    if (form.email.value == "") {
        fail += "Please Enter your email ";
    }
    if (form.security.value == "") {
        fail += "Please Enter your security answer";
    }
    if (fail == "") {
        return true;
    }
    else {
        alert(fail);
        return false;
    }
}
function validateCourse(form) {
    var fail = "";
    if (form.name.value == "") {
        fail += "Please Enter the course name ";
    }
    if (form.price.value == "") {

        fail += "Please Enter a valid course price ";
    }
    if (form.category.value == "") {
        fail += "Please specify the course category ";
    }
    if (form.tutor.value == "") {
        fail += "Please Enter the tutor email ";
    }
    if (form.imageToUpload.value == "") {
        fail += "Please Upload the course image ";
    }
    if (form.desToUpload.value == "") {
        fail += "Please Enter the course description ";
    }
    if (form.contentToUpload.value == "") {
        fail += "Please Upload the course content ";
    }
    if (fail == "") {
        return true;
    }
    else {
        alert(fail);
        return false;
    }

}
function validateSignup(form) {
    var fail = "";
    if (form.fname.value == "") {
        fail += "Please Enter your first ";
    }
    if (form.email.value == "") {
        fail += "Please Enter your email ";
    }
    if (form.password.value == "") {
        fail += "Please Enter your password ";
    }
    if (form.passConf.value == "") {
        fail += "Please confirm your password ";
    }
    if (form.security.value == "") {
        fail += "Please Enter your security answer ";
    }

    if (fail == "") {
        return true;
    }
    else {
        alert(fail);
        return false;
    }
}



