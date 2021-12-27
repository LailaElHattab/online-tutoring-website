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
        fail += 1;
    }
    if (form.price.value == "") {
        fail += 2;
    }
    if (form.des.value == "") {

    }
    if (form.imageToUpload.value == "") {
        fail += 3;
    }
    if (form.contentToUpload.value == "") {
        fail += 4;
    }
    if (fail == "") {
        return true;
    }
    else {
        alert(fail);
        return false;
    }

}



