<div class="d-none d-lg-block footer">
  <footer class="footer mr-auto navbar-dark">
    <div class="row">
      <div class="col-12 col-md">
        <a class="logo" href="index.php"><img class="logo" style="height: 25px; width: 80px;" src="img/WhiteLogo.png" alt="Mash"></a>
        <small class="d-block mb-3 text-muted">© 2022</small>
      </div>
      <div class="col-6 col-md text-white">
        <h5>Navigation</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="bookings.php">Link</a></li>
          <li><a class="text-muted" href="news.php">News</a></li>
        </ul>
      </div>
      <div class="col-6 col-md text-white">
        <h5>Account</h5>
        <ul class="list-unstyled text-small">
          <?php if (isset($_SESSION['user_id'])) : ?>
            <li><a class="text-muted" href="user_login.php">My Account</a></li>
          <?php else : ?>
            <li><a class="text-muted" href="/login.php">My Account</a></li>
          <?php endif ?>
        </ul>
      </div>
  </footer>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
<script src="admin/js/datatables.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

<script>
  function goBack() {
    window.history.back();
  }
</script>

</body>

</html>