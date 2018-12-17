function validateContact() {
  //validate contact form

  var x = document.forms["contact"]["name"].value;
  if(x == ""){
    alert("Name must be filled out");
    return false;
  }

  var y = document.forms["contact"]["email"].value;
  if(y == ""){
    alert("Email Address must be filled out");
    return false;
  }

  var z = document.forms["contact"]["phoneNumber"].value;
  if(y == ""){
    alert("Phone Number must be filled out");
    return false;
  }
}
