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
 <title>Document</title>
 <style>
  .pertanyaan {
   text-align: left;
  }
 </style>
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
     Submit
    </button>
   </div>
  </header>

  <main>
   <section>
    <div class="block-grid-tabel">
     <div class="revenue-card">
      <h3 class="section-head">Detail Item</h3>
      <div class="rev-content">
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
          <th>Last Checking</th>
          <th>Duration</th>
          <th>Item used for RoHS Process?</th>
         </tr>
        </thead>
        <tbody>
         <?php
         $item_id = $_GET["item_id"];
         $sql = "SELECT * FROM tms WHERE id = $item_id";
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
          }
         } else {
          echo "<tr><td colspan='11'>Tidak ada item yang ditemukan</td></tr>";
         }
         ?>
         <form method="post" action="simpan.php" enctype="multipart/form-data">
          <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
          <td for="jawaban16"><select name="jawaban_16">

            <option value="YES">Yes</option>
            <option value="NO">No</option>
           </select></td>
          </tr>
        </tbody>
       </table>
      </div>
     </div>
    </div>



    <div class="block-grid-tabel">
     <div class="revenue-card">
      <h3 class="section-head">Functionality</h3>
      <div class="rev-content">
       <table border="1">
        <thead>
         <tr>
          <th>NO.</th>
          <th>CHECK ITEMS</th>
          <th>CHECK</th>
         </tr>
        </thead>
        <tbody>
         <tr>

          <td>1</td>
          <td class="pertanyaan">Check kelengkapan spring, pusher, look pada jig</td>
          <td><select name="jawaban_1">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>2</td>
          <td class="pertanyaan">Check apakah jig sewaktu menekan komponent tidak menyebabkan kerusakan
           seperti damage,
           crack, gap,
           dan aligment pada komponent</td>
          <td for="jawaban_2"><select name="jawaban_2">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>3</td>
          <td class="pertanyaan">Check apakah bagian yang terbuka pada base jig hanya untuk lokasi yang
           di touch up</td>
          <td for="jawaban_3"><select name="jawaban_3">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>4</td>
          <td class="pertanyaan">Check apakah jig bisa untuk digunakan secara berulang-ulang</td>
          <td for="jawaban_4"><select name="jawaban_4">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>5</td>
          <td class="pertanyaan">Check apakah jig tersebut mudah untuk digunakan</td>
          <td for="jawaban_5"><select name="jawaban_5">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>6</td>
          <td class="pertanyaan">Check kebersihan jig, bersih dari fluxs, Solder Splash</td>
          <td for="jawaban_6"><select name="jawaban_6">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>7</td>
          <td class="pertanyaan">Apakah jig tersebut membutuhkan improvement dan modification untuk
           kedepannya</td>
          <td for="jawaban_7"><select name="jawaban_7">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>
        </tbody>
       </table>
      </div>
     </div>
    </div>


    <div class="block-grid-tabel">
     <div class="revenue-card">
      <h3 class="section-head">Safety</h3>
      <div class="rev-content">
       <table border="1">
        <thead>
         <tr>
          <th>NO.</th>
          <th>CHECK ITEMS</th>
          <th>CHECK</th>
         </tr>
        </thead>
        <tbody>

         <tr>
          <td>1</td>
          <td class="pertanyaan">Apakah item terdapat kaki untuk memastikan kedudukannya bagus waktu
           ditempat kerja?</td>
          <td for="jawaban_8"><select name="jawaban_8">

            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>2</td>
          <td class="pertanyaan">Apakah ada tabung penyuplai udara jika ada,telah diatur untuk mencegah
           terhalangnya
           operator
           selama memakai?</td>
          <td for="jawaban_9"><select name="jawaban_9">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>3</td>
          <td class="pertanyaan">Untuk mekanik elektro yang aktif dari item jika ada, apakah ada
           ketentuan untuk
           menghentikan
           jika keadaan darurat ketika operator ingin untuk menghentikan pengoperasian setiap saat.
          </td>
          <td for="jawaban_10"><select name="jawaban_10">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>4</td>
          <td class="pertanyaan">Apakah ada pengontrol mekanik elektro pada item, ada keistimewaan
           seperti mengunakan
           kedua
           tangan
           untuk mengaktifkan untuk mencegah kecelakaan?</td>
          <td for="jawaban_11"><select name="jawaban_11">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>5</td>
          <td class="pertanyaan">Jika tajam, panas atau penggerakan bagian item,sudahkah terlindungi
           dengan penutup atau
           pelindung
           untuk mencegah operator terhindar dari kecelakaan.</td>
          <td for="jawaban_12"><select name="jawaban_12">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>6</td>
          <td class="pertanyaan">Apakah ada label atau peringatan pada item seperti power line, tekanan
           maksimal yang
           dibolehkan
           atau
           yang lain yang bisa dipakai untuk kesalahan penggunaan.</td>
          <td for="jawaban_13"><select name="jawaban_13">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>7</td>
          <td class="pertanyaan">Apakah ada bagian yang bisa dipindah atau digerakan, adakah pelatihan
           cara memegang
           tombol
           atau
           yang
           lain untuk memudahkan operator untuk memegang dengan benar dan mencegah pengunaan yang
           salah.
          </td>
          <td for="jawaban_14"><select name="jawaban_14">
            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

         <tr>
          <td>8</td>
          <td class="pertanyaan">Untuk item yang berat, adakah pemegang atau penyokong untuk memudahkan
           dalam mengangkat,
           memasang dan memindahkan.</td>
          <td for="jawaban_15"><select name="jawaban_15">

            <option value="OKE">Oke</option>
            <option value="NOT OKE">Not Oke</option>
           </select></td>
         </tr>

        </tbody>

       </table>
      </div>
     </div>
    </div>
   </section>
  </main>
 </div>


</body>

</html>