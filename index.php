<?
include 'db/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- ICONS8 -->
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />

  <!-- STYLE CSS -->
  <link rel="stylesheet" href="css/style.css" />

  <link rel="shortcut icon" href="assets/img/ICON.png">
  <title>TMS | Dashboard</title>
</head>

<body>
  <input type="checkbox" name="" id="menu-toggle" />
  <div class="overlay">
    <label for="menu-toggle"> </label>
  </div>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="sidebar-container">
      <div class="brand">
        <h2>
          <span class="las la-hashtag"></span>
          DASHBOARD
        </h2>
      </div>

      <div class="sidebar-avatar">
        <div>
          <img src="assets/img/person.png" alt="" />
        </div>
        <div class="avatar-info">
          <div class="avatar-text">
            <h4>Admin</h4>
            <small>Checking Record</small>
          </div>
          <span class="las la-angle-double-down"></span>
        </div>
      </div>

      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="" class="active">
              <span class="las la-campground"></span>
              <span>Home</span>
            </a>
          </li>

          <li>
            <a href="table.php">
              <span class="las la-list"></span>
              <span>Table</span>
            </a>
          </li>

          <li>
            <a href="">
              <span class="las la-chart-bar"></span>
              <span>Charts</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="las la-sign-out-alt"></span>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- END SIDEBAR -->

  <!-- MAIN CONTENT -->
  <div class="main-content">
    <header>
      <div class="header-title-wrapper">
        <label for="menu-toggle">
          <span class="las la-bars"></span>
        </label>
        <div class="header-title">
          <h1>Tooling Management System</h1>
          <p>Checking Record <span class="las la-chart-line"></span></p>
        </div>
      </div>
    </header>

    <main>
      <?php
      include 'db/koneksi.php';
      $get1 = mysqli_query($conn, "SELECT * from tms");
      $count1 = mysqli_num_rows($get1);

      //Data Going to Expire
      $get2 = mysqli_query($conn, "SELECT * from tms WHERE status='Going to Expire'");
      $count2 = mysqli_num_rows($get2);

      //Data Expired
      $get3 = mysqli_query($conn, "SELECT * from tms WHERE status='Expired'");
      $count3 = mysqli_num_rows($get3);

      //Data Verified
      $get4 = mysqli_query($conn, "SELECT * from tms WHERE status='Verified'");
      $count4 = mysqli_num_rows($get4);
      ?>
      <section>
        <h3 class="section-head"></h3>
        <div class="analytics">
          <div class="analytic">
            <div class="analytic-icon">
              <a href="table.php"> <span class="las la-archive"></span></a>
            </div>
            <div class="analytic-info">
              <h4>Total Tooling</h4>
              <h1>
                <?= $count1; ?>
              </h1>
            </div>
          </div>

          <div class="analytic">
            <div class="analytic-icon">
              <a href="verified.php">
                <span class="las la-check-double"></span></a>
            </div>
            <div class="analytic-info">
              <h4>Verified</h4>
              <h1><?= $count4; ?></h1>
            </div>
          </div>

          <div class="analytic">
            <div class="analytic-icon">
              <a href="goingtoexpire.php">
                <span class="las la-bell"></span></a>
            </div>
            <div class="analytic-info">
              <h4>Going to Expire</h4>
              <h1><?= $count2; ?></h1>
            </div>
          </div>

          <div class="analytic">
            <div class="analytic-icon">
              <a href="expired.php">
                <span class="las la-exclamation-triangle"></span></a>
            </div>
            <div class="analytic-info">
              <h4>Expired</h4>
              <h1><?= $count3; ?></h1>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="block-grid">
          <div class="graph-card">
            <h3 class="section-head">Graphic</h3>
            <div class="graph-content">
              <div class="graph-board">
                <canvas id="revenueChart" width="100%" height="5px"></canvas>
                <?php
                include 'grafik.php';
                ?>
              </div>
            </div>
          </div>

          <div class="revenue-card">
            <h3 class="section-head">Customer</h3>
            <div class="rev-content">
              <img src="assets/img/person.png" alt="" />
              <div class="rev-info">
                <h3>Initial Customer</h3>
                <h1>LIFE FITNESS <small>(LFF)</small></h1>
              </div>
              <div class="rev-sum">
                <h4>Total Verified</h4>
                <h2><?= $count4; ?></h2>
              </div>
            </div>
          </div>

        </div>
      </section>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>