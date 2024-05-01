<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="assets/image/vas.png" />
  <link rel="stylesheet" href="css/admin.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/387774990c.js" crossorigin="anonymous"></script>
  <title>ATKaryawan</title>
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="assets/image/vas.png" alt="" width="30" />
      <span class="logo_name">ATKaryawan</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="admin.php" class="active">
          <i class="fa-solid fa-border-all"></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="employee/employee.php">
          <i class="fa-solid fa-users"></i>
          <span class="links_name">Employee</span>
        </a>
      </li>
      <li>
        <a href="wages/wages.php">
          <i class="fa-solid fa-sack-dollar"></i>
          <span class="links_name">Wages</span>
        </a>
      </li>
      <li>
        <a href="index.php">
          <i class="fa-solid fa-right-from-bracket"></i>
          <span class="links_name">Logout</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
      </div>
      <div class="profile-details">
        <span class="admin_name">ATK Admin</span>
      </div>
    </nav>
    <div class="home-content">
      <h1>Selamat Datang Admin!</h1>
      <div id="clock"></div>
      <div id="date"></div>
    </div>
  </section>
  <script>
    function currentTime() {
      let date = new Date();
      let hh = date.getHours();
      let mm = date.getMinutes();
      let ss = date.getSeconds();
      let day = date.getDay();
      let days = [
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu",
      ];
      let month = date.getMonth();
      let months = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
      ];
      let year = date.getFullYear();
      let session = "AM";
      if (hh > 12) {
        session = "PM";
        hh = hh - 12;
      }
      hh = hh < 10 ? "0" + hh : hh;
      mm = mm < 10 ? "0" + mm : mm;
      ss = ss < 10 ? "0" + ss : ss;
      let time = hh + ":" + mm + ":" + ss + " " + session;
      let formattedDate =
        days[day] + ", " + date.getDate() + " " + months[month] + " " + year;
      document.getElementById("clock").innerText = time;
      document.getElementById("date").innerText = formattedDate;
      var t = setTimeout(function () {
        currentTime();
      }, 1000);
    }
    currentTime();

    // Sidebar onclick
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    };
  </script>
</body>

</html>