<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/mdb.min.css" />
  <link rel="stylesheet" href="admin/css/styles.css">
  <link rel="stylesheet" href="css/custom.css">

  <!--mystylesheet-->
  <title>Mash</title>

  <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
  <script src="dist/bundle.js"></script>

</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link <?php if ($currentPage == 'movie') {
                                echo 'active';
                              } ?>" href="booking.php">Link<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
    <div class="mx-auto order-0">
      <a class="navbar-brand" href="index.php"><img class="logo" style="max-height: 60px; max-width: 150px;" src="img/WhiteLogo.png" alt="Mash"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php if ($currentPage == 'account' || $currentPage == 'login' || $currentPage == 'register' || $currentPage == 'forgot_password') {
                              echo 'active';
                            } ?> ">
          <a class="nav-link" id="userDropdown" href="#" data-toggle="dropdown" aria-expanded="false" aria-controls="userDropdown">
            <div class="sb-nav-link-icon"><em class="fas fa-user fa-fw"></em><em class="fas fa-angle-down"></em></div>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="login.php">Login</a>
            <a class="dropdown-item" href="register.php">Register</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>