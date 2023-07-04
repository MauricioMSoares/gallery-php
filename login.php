<?php require "includes/header.php"; ?>
<?php require "config.php"; ?>

<?php 
  if(isset($_SESSION['username'])) {
    header("location: index.php");
  }

  if (isset($_POST['submit'])) {
    if ($_POST['email'] == '' OR $_POST['password'] == '') {
      echo("<div class='alert alert-danger bg-red text-black text-center'>There are empty fields. Please, fill in all the inputs.</div>");
    } else {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
      $login->execute();
      $data = $login->fetch(PDO::FETCH_ASSOC);

      if ($login->rowCount() > 0) {
        if (password_verify($password, $data['pass'])) {
          $_SESSION['id'] = $data['id'];
          $_SESSION['username'] = $data['username'];
          $_SESSION['email'] = $data['email'];
          header("location: index.php");
        } else {
          echo "<script>alert('Email or password didn't match our stored data')</script>";
        }
      }
    }
  }
?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="login.php">
    <!-- <img class="mb-4 text-center" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mt-5 fw-normal text-center mb-4">Login to your account</h1>

    <div class="form-floating mb-4">
      <label for="floatingInput">E-mail</label>
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
    </div>

    <div class="form-floating mb-4">
      <label for="floatingPassword">Password</label>
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="********">
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    <h6 class="mt-3 mb-5">Don't have an account?  <a href="register.php">Create your account</a></h6>

  </form>
</main>
<?php require "includes/footer.php"; ?>
