<?php require_once 'connect_DB.php'; ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Changed the bootstrap link to a newer version as the bottom one didn't have some options I used.
  I think (didn't check though) this new one is backwards compatible. However if you notice some strange styling issues this might be the culprit -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/mdb.min.css" />
  <link rel="stylesheet" href="admin/css/styles.css">
  <link rel="stylesheet" href="css/custom.css">

  <!--mystylesheet-->
  <title>Mash</title>

  <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>

</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Page Links
          </button>
          <div class="dropdown-menu dropdown-menu-start">
            <a class="dropdown-item" href="user_content.php">User Content</a>
            <a class="dropdown-item" href="artwork.php">Artwork</a>
            <a class="dropdown-item" href="document_editor.php">Documents</a>
            <a class="dropdown-item" href="file_upload.php">Upload</a>
            <a class="dropdown-item" href="chat_test.php">Chat</a>
            <a class="dropdown-item" href="faq.php">FAQ</a>
            <a class="dropdown-item" href="contact_support.php">Support</a>
          </div>
      </ul>
    </div>
    <div class="mx-auto order-0">
      <a class="navbar-brand" href="index.php"><img class="logo" style="max-height: 60px; max-width: 150px;" src="img/WhiteLogo.png" alt="Mash"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".dual-collapse2">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <?php if ($_SESSION['accountID']) echo "<button type=\"button\" class=\"btn \" data-bs-toggle=\"modal\" data-bs-target=\"#createArt\">"
            . "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"25\" height=\"25\" fill=\"white\" class=\"bi bi-plus-lg\" viewBox=\"0 0 16 16\">"
            . "<path fill-rule=\"evenodd\" d=\"M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z\" /></svg>
            </button>"
          ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="userDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false" aria-controls="userDropdown">
            <div class="sb-nav-link-icon"><em class="fas fa-user fa-fw"></em><em class="fas fa-angle-down"></em></div>
          </a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="user.php">Account</a>
            <?php
            if ($_SESSION['account_type'] == "2") {
            ?>
              <a class="dropdown-item" href="/admin/admin.php">Admin</a>
            <?php
            }
            ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="includes/logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Modal -->
  <div class="modal fade" id="createArt" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createArtLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createArtLabel">Create New Art</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form" action="includes/createNew.php" method="POST">
            <div class="mb-3">
              <label for="artTitle" class="form-label">Title</label>
              <input type="text" class="form-control" id="artTitle" name="title">
            </div>
            <div class="mb-3">
              <label for="artDescription" class="form-label">Description</label>
              <textarea class="form-control" id="artDescription" rows="3" name="description"> </textarea>
            </div>
            <select class="form-select mb-3" aria-label="Art type" name="type">
              <option selected value="Text">Document</option>
              <option value="Picture">Image</option>
              <option value="animation">Animation</option>
            </select>
            <select class="form-select mb-3" aria-label="group" name="group">
              <option selected value="new">New group</option>
              <?php if ($_SESSION['accountID']) {
                $query = "SELECT groupdetails.artGroupID, groupName FROM artgroups as groupdetails INNER JOIN noofmemgroup as groupmembers ON groupdetails.artGroupID = groupmembers.artGroupID WHERE groupmembers.accountID = ?;";
                $preparedStmt = mysqli_stmt_init($link);

                if (!mysqli_stmt_prepare($preparedStmt, $query)) {
                  header("location: ../index.php?error=inputerror");
                  mysqli_stmt_close($preparedStmt);
                  exit();
                }
                mysqli_stmt_bind_param($preparedStmt, "i", $_SESSION['accountID']);
                mysqli_stmt_execute($preparedStmt);
                $results = mysqli_stmt_get_result($preparedStmt);
                while ($row = mysqli_fetch_array($results)) {
                  echo "<option selected value=\"" . $row['artGroupID'] . "\"> " . $row['groupName'] . "</option>";
                }
              }
              ?>
            </select>
            <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input" id="private" name="private">
              <label for="private" class="form-check-label">Private</label>
            </div>
        </div>
        <div class="modal-footer mb-0 pb-0">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="submit">Create</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>