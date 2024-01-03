<?php
session_start();
if (!isset($_SESSION['username'])) {
  // Redirect to login page if the user is not logged in.
  header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | PHP</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body>
  <div class="flex justify-center items-center h-screen bg-gray-200">
    <div class="bg-white p-16 rounded shadow-2xl w-2/3">
      <h2 class="text-3xl font-bold mb-10 text-gray-800">Hello,
        <?php echo $_SESSION['username']; ?>
      </h2>
      <a href="logout.php" class="w-full bg-blue-500 text-white px-4 py-3 rounded-lg font-semibold text-lg">Log Out</a>
    </div>
</body>

</html>