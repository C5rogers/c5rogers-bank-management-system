    // this will toogle the input fild type
    var toogle = function(input) {
        var status = 0;
        var type = input.getAttribute("type") === "password" ? "text" : "password";
        if (type == "text") {
            status = 1
        }
        input.setAttribute("type", type);
        return status;
    }



    // this will prevent submission of the form to server
    var form = document.getElementById("form");
    form.addEventListener("submit", function(e) {
        if (e.submitter.classList.contains("eye-button")) {
            e.preventDefault();
        }
    });

    // this will listen the visibility button  for the first password
    var button = document.querySelector(".visiblility1");
    button.addEventListener("click", function() {
        var input = document.querySelector(".password1");
        var status = toogle(input);
        if (status == 1) {
            // there is some bug right here that i don't figure it out now
            var img = document.querySelector(".eye1");
            img.src = "/image/prevent.png";
        } else {
            var img2 = document.querySelector(".eye1");
            img2.src = "/image/visible.png";
        }
    });

    // this will listen the input fild for the second fild
    var button2 = document.querySelector('.visiblility2');
    button2.addEventListener("click", function() {
        var input = document.querySelector(".password2");
        var status = toogle(input);
        if (status == 1) {
            var img = document.querySelector(".eye2");
            img.src = "/image/prevent.png";
        } else {
            var img2 = document.querySelector(".eye2");
            img2.src = "/image/visible.png";
        }
    });