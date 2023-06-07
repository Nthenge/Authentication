<!DOCTYPE html>
<html>
<head>
  <title>Input Form</title>
  <style>
    /* Internal CSS */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    
    h1 {
      text-align: center;
    }
    
    form {
      max-width: 400px;
      margin: 0 auto;
    }
    
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    .button-container {
      text-align: center;
    }
    
    .button-container button, a{
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-right: 10px;
    }
    
    .button-container button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>Input Form</h1>
  <form action="./register.php" method="post" id="myForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required>
    
    <div class="button-container">
      <button type="submit" name="register">Register</button>
      <a href="./login.php" name="singin" >Sing in</a>
    </div>
  </form>
</body>
</html>
