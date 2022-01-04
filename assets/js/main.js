$(document).on("submit", "form.js-register", function (e) {
  e.preventDefault();

  var form = $(this);
  var error = $(".js-error", form);

  let data = {
    email: $("input[type='email']", form).val(),
    password: $("input[type='password']", form).val(),
  };

  if (data.email.length < 6) {
    error.text("Please enter a valid email address").show();
    return false;
  } else if (data.password.length < 8) {
    error.text("Please enter a password of at least 8 characters").show();
    return false;
  }

  console.log("something", data);
  alert("Form was submitted");
  return false;
});
