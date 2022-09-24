function myFunction() {
  var x = document.getElementById("form3Example4c");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
