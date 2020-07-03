<html>
    <head>
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="css/finalindex.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  background-color: black;
  font-family: cursive;
}

.glow {
  /* font-size: 80px; */
  color: white;
  text-align: center;
  -webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px green, 0 0 20px green, 0 0 30px teal, 0 0 40px green, 0 0 50px green, 0 0 60px white, 0 0 70px blue;
  }
  
  to {
    text-shadow: 2 0 20px green, 0 0 30px tomato, 0 40px royalblue, 0 0 50px blue, 0 0 60px green, 0 0 70px blue, 0 0 80px blue;
  }
}
.zoom,.colu {
  /* font-size: 80px; */
  color: white;
  text-align: center;
  -webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px royalblue, 0 0 20px royalblue, 0 0 30px royalblue, 0 0 40px blue, 0 0 50px blue, 0 0 60px white, 0 0 70px blue;
  }
  
  to {
    text-shadow: 2 0 20px green, 0 0 30px tomato, 0 40px royalblue, 0 0 50px blue, 0 0 60px green, 0 0 70px blue, 0 0 80px blue;
  }
}
</style>
</head>
<body>

<!-- video inserted -->
<video autoplay muted loop id="myVideo">
  <source src="image/exam.mp4" type="video/mp4">
</video>
<div class="content">
    <h1 align="center" style="font-family:cursive;">
    <div class="glow">
        Exam Hall Seating Management System
        </div>
    </h1>
<div class="zoom">
<a href="index.php">Admin</a></div>
<div class="colu">
<a href="loginUser.php">Student</a>
</div>
</div>
</body>
</html>