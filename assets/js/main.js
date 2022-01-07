$(document).on("submit", "form.js-register", function (e) {
  e.preventDefault();

  var form = $(this);
  var error = $(".js-error", form);

  let dataObj = {
    email: $("input[type='email']", form).val(),
    password: $("input[type='password']", form).val(),
  };

  if (dataObj.email.length < 6) {
    error.text("Please enter a valid email address").show();
    return false;
  } else if (dataObj.password.length < 8) {
    error.text("Please enter a password of at least 8 characters").show();
    return false;
  }

  // Assuming the code gets this far, we can start the ajax process
  error.hide();

  $.ajax({
    type: "POST",
    url: "/php_login_course/ajax/register.php",
    data: dataObj,
    dataType: "json",
    async: true,
  })
    .done(function ajaxDone(data) {
      // Whatever data is
      console.log(data);
      if (data.redirect !== undefined) {
        window.location = data.redirect;
      }
      alert(data.name);
    })
    .fail(function ajaxFailed(e) {
      // This failed
      console.log(e);
    })
    .always(function ajaxAlwaysDoThis(data) {
      // Always do
      console.log("Always");
    });

  console.log("something", dataObj);
  alert("Form was submitted");
  return false;
});
