$(document).ready(function () {

    $(".form-classes").validate({
        rules: {
            phone: {
                required: true
            },
            name: {
                required: true,
                

            },
            email: {
                required: true,
            }

        },
        messages: {
            phone: {
                required: "this field is required"
            },
            name: {
                required: "Enter recipient name",
                minlength: "Name should be at least 3 characters long" // <-- removed underscore
            }
        },
       
    });

});


$(document).ready(function () {
    $("#email").keyup(function () {
        if (validateEmail()) {

            $("#email").css("border", "5px solid green");
            $("#emailms").html("<p></p>");


        }
        else {
            $("#email").css("border", "5px solid red");
            $("#emailms").html("<p>Email must have .dcastalia</p>");

        }

    });




});

function validateEmail() {

    var email = $("#email").val();
    var regex_email = /^([a-z\d\.-]+)\.(dcastalia+)@(gmail+)\.([a-z]{2,8})$/;
    if (regex_email.test(email)) {
       return true;

    } else {
       
        return false;
        
    }


}


$(document).ready(function () {

    $("#phone").keyup(function () {
        if (validatePhone()) {

            $("#phone").css("border", "5px solid green");
            $("#phoneMsg").html("<p></p>");


        }
        else {
            $("#phone").css("border", "5px solid red");
            $("#phonemsg").html("<p>Starts with +88 or 88 . (01) (3-9) then 8 digit number</p>");

        }

    });
});


function validatePhone() {

    var phone = $("#phone").val();
    var regex_phone = /^(?:\+88|88)?(01[3-9]\d{8})$/;
    if (regex_phone.test(phone)) {
       return true;

    } else {
       
        return false;
        
    }


}