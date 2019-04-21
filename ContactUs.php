<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
html, body {
  height: 100%; /*Fixes the height to 100% of the viewport*/
}

.navbar-offset {
    top: 37px; /*Offsets the top navbar 37px from the top of the viewport*/
}
}
</style>
</head>
<body>

<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="navbar">
  <a href="index.php"><i class="fa fa-home"></i> Home Page</a>
  <a onclick="document.getElementById('id02').style.display='block'" style=float:right href="#"><i class="fa fa-id-card-o"></i> Register</a>
  <a onclick="document.getElementById('id01').style.display='block'" style=float:right href="#"><i class="fa fa-sign-in"></i> Sign In</a>
  <a class="active" style=float:right href="ContactUs.php"><i class="fa fa-envelope"></i> Contact Us</a>
  <a style=float:right href="#"><i class="fa fa-info"></i> About Us</a>
</div>

<link rel="stylesheet" type="text/css" href="css/Style.css">

<div class="container">
  <form action="/action_page.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
