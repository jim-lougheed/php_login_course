$(document)
  .on("submit", "form.js-register", function (e) {
    e.preventDefault();

    var form = $(this);
    var _error = $(".js-error", form);

    let dataObj = {
      email: $("input[type='email']", form).val(),
      password: $("input[type='password']", form).val(),
    };

    if (dataObj.email.length < 6) {
      _error.text("Please enter a valid email address").show();
      return false;
    } else if (dataObj.password.length < 8) {
      _error.text("Please enter a password of at least 8 characters").show();
      return false;
    }

    // Assuming the code gets this far, we can start the ajax process
    _error.hide();

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
        } else if (data.error !== undefined) {
          _error.text(data.error).show();
        }
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
  })
  .on("submit", "form.js-login", function (e) {
    e.preventDefault();

    var form = $(this);
    var _error = $(".js-error", form);

    let dataObj = {
      email: $("input[type='email']", form).val(),
      password: $("input[type='password']", form).val(),
    };

    if (dataObj.email.length < 6) {
      _error.text("Please enter a valid email address").show();
      return false;
    } else if (dataObj.password.length < 8) {
      _error.text("Please enter a password of at least 8 characters").show();
      return false;
    }

    // Assuming the code gets this far, we can start the ajax process
    _error.hide();

    $.ajax({
      type: "POST",
      url: "/php_login_course/ajax/login.php",
      data: dataObj,
      dataType: "json",
      async: true,
    })
      .done(function ajaxDone(data) {
        // Whatever data is
        console.log(data);
        if (data.redirect !== undefined) {
          window.location = data.redirect;
        } else if (data.error !== undefined) {
          _error.html(data.error).show();
        }
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
