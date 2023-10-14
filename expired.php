<?php
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
  <title>TMS | Expired</title>
</head>

<body>
  <input type="checkbox" name="" id="menu-toggle" />
  <div class="overlay">
    <label for="menu-toggle">
      <span class="las la-cancel"></span>
    </label>
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
            <a href="index.php">
              <span class="las la-campground"></span>
              <span>Home</span>
            </a>
          </li>

          <li>
            <a href="" class="active">
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
      <div class="header-action">
        <button class="btn btn-main">
          <span class="las la-upload"></span>
          Add Item
        </button>
      </div>
    </header>

    <main>
      <section>
        <div class="block-grid-tabel">
          <div class="revenue-card">
            <div class="rev-content">
              <div class="isearch">
                <input class="search" type="search" id="searchInput" placeholder="Search..." />
              </div>
              <table border="1" id="myTable">
                <thead>
                  <tr>
                    <th>Customer</th>
                    <th>Model</th>
                    <th>Item S/N</th>
                    <th>Item Classification</th>
                    <th>Type</th>
                    <th>Item Description</th>
                    <th>Date Commissioned</th>
                    <th>Last Check</th>
                    <th>Duration</th>
                    <th>Next Check</th>
                    <th>Deadline</th>
                    <th>Check Item</th>
                    <th>Status Item</th>
                    <th>History Check</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $sql = "SELECT * FROM tms WHERE status = 'Expired'";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row["customer"] . "</td>";
                      echo "<td>" . $row["model"] . "</td>";
                      echo "<td>" . $row["sn"] . "</td>";
                      echo "<td>" . $row["itemclassi"] . "</td>";
                      echo "<td>" . $row["type"] . "</td>";
                      echo "<td class='desc'>" . $row["itemdesc"] . "</td>";
                      echo "<td>" . $row["dcommiss"] . "</td>";
                      echo "<td>" . $row["lc"] . "</td>";
                      echo "<td>" . $row["durasi"] . "</td>";
                      echo "<td>" . $row["nc"] . "</td>";
                      $status_class = '';
                      switch ($row['status']) {
                        case 'Verified':
                          $status_class = 'status-verified';
                          break;
                        case 'Going to Expire':
                          $status_class = 'status-going-to-expire';
                          break;
                        case 'Expired':
                          $status_class = 'status-expired';
                          break;
                      }
                      echo "<td class='$status_class'>" . $row['status'] . "</td>";
                      echo "<td><a href='check.php?item_id=" . $row["id"] . "'>Check</a></td>";
                      echo "<td>" . $row["status_item"] . "</td>";
                      echo "<td><a href='riwayat.php?item_id=" . $row["id"] . "'>Check</a></td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='11'>Tidak ada item yang ditemukan</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>


  <script>
    function filterTable() {
      var input, filter, table, tr, td, i, j, txtValue;
      input = document.getElementById('searchInput');
      filter = input.value.toUpperCase();
      table = document.getElementById('myTable');
      tr = table.getElementsByTagName('tr');

      for (i = 0; i < tr.length; i++) {
        tr[i].style.display = 'none'; // Sembunyikan semua baris terlebih dahulu
        td = tr[i].getElementsByTagName('td');

        for (j = 0; j < td.length; j++) {
          if (td[j]) {
            txtValue = td[j].textContent || td[j]
              .innerText;
            if (txtValue.toUpperCase().indexOf(filter) >
              -1) {
              tr[i].style.display =
                ''; // Tampilkan baris jika ada kecocokan
              break; // Hentikan pencarian pada kolom ini jika sudah ditemukan
            }
          }
        }
      }
    }

    // Tambahkan event listener untuk pemanggilan fungsi filter saat input berubah
    document.getElementById('searchInput').addEventListener('input', filterTable);
  </script>
</body>

</html>