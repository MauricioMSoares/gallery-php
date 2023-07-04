<?php require "includes/header.php"; ?>
<?php require "config.php"; ?>

<?php 
  if (isset($_POST['submit'])) {
    if ($_POST['username'] == '' OR $_POST['email'] == '' OR $_POST['password'] == '') {   
      echo("<div class='alert alert-danger bg-red text-black text-center'>There are empty fields. Please, fill in all the inputs.</div>");
    } else {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      $insert = $conn->prepare("
      INSERT INTO users (username, email, pass)
      VALUES (:username, :email, :pass)
      ");

      $insert->execute([
        ':username' => $username,
        ':email' => $email,
        ':pass' => password_hash($password, PASSWORD_DEFAULT),
      ]);

      header("location: login.php");
    }
  }
?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="register.php">
   
    <h1 class="h3 mt-5 fw-normal text-center mb-4">Create your account</h1>

    <div class="form-floating mb-4">
      <label for="floatingInput">Username</label>
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Example">
    </div>

    <div class="form-floating mb-4">
      <label for="floatingInput">E-mail</label>
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
    </div>

    <div class="form-floating mb-4">
      <label for="floatingPassword">Password</label>
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="********">
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
    <h6 class="mt-3 mb-5">Already have an account? <a href="login.php">Login</a></h6>

  </form>
</main>
<?php require "includes/footer.php"; ?>
