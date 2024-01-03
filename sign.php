<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up | PHP</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body>

  <div class="flex justify-center items-center h-screen bg-gray-200">
    <div class="bg-white p-16 rounded shadow-2xl w-2/3">
      <h2 class="text-3xl font-bold mb-10 text-gray-800">Sign Up</h2>
      <form action="sign.php" method="POST">
        <div>
          <input type="text" name="username" placeholder="Username"
            class="w-full border-2 border-gray-400 p-4 rounded-lg mb-2" />
        </div>
        <div>
          <input type="password" name="password" placeholder="Password"
            class="w-full border-2 border-gray-400 p-4 rounded-lg mb-2" />
        </div>
        <div>
          <input type="submit" name="submit" value="Sign Up"
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

  // Check if there is any already existing user with the same username
  $sql_user_check = 'SELECT * FROM registration WHERE username = "' . $username . '"';
  $result_user_check = mysqli_query($conn, $sql_user_check);

  if (mysqli_num_rows($result_user_check) != 0) {
    echo '<script>alert("User already exists")</script>';
    exit();
  }

  // Insert the user into the database
  $sql = 'INSERT INTO registration (username, password) VALUES ("' . $username . '", "' . $password . '")';
  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Redirect to the login page
    echo '
      <script>
        window.location.href = "login.php";
      </script>
    ';
  } else {
    echo '<script>alert("User not created")</script>';
  }
}
?>