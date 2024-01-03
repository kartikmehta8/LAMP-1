<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In | PHP</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body>

  <div class="flex justify-center items-center h-screen bg-gray-200">
    <div class="bg-white p-16 rounded shadow-2xl w-2/3">
      <h2 class="text-3xl font-bold mb-10 text-gray-800">Log In</h2>
      <form action="login.php" method="POST">
        <div>
          <input type="text" name="username" placeholder="Username"
            class="w-full border-2 border-gray-400 p-4 rounded-lg mb-2" />
        </div>
        <div>
          <input type="password" name="password" placeholder="Password"
            class="w-full border-2 border-gray-400 p-4 rounded-lg mb-2" />
        </div>
        <div>
          <input type="submit" name="submit" value="Log In"
            class="w-full bg-blue-500 text-white px-4 py-3 rounded-lg font-semibold text-lg" />
        </div>
      </form>
    </div>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'connect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Match the username and password with the database entries
  $sql = 'SELECT * FROM registration WHERE username = "' . $username . '" AND password = "' . $password . '"';
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    session_start();
    $_SESSION['username'] = $username;
    header('location: home.php');
  } else {
    echo '<script>alert("Invalid credentials")</script>';
  }
}
?>