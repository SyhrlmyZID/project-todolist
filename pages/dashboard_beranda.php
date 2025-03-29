<?php

// Session Pages
include '../php/pages/session/session_pages.php';

// Php Main
include '../php/pages/dashboard_beranda/main.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Luxe Task | Dashboard Beranda</title>

  <!-- Favicons -->
  <link rel="shortcut icon" href="../assets/img/fav.png" type="image/x-icon">

  <!-- Vendor Files -->
  <link rel="stylesheet" href="../assets/vendor/FontAwesome6Pro/css/all.min.css">

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">

</head>

<body class="bg-blue-100">

  <!-- Navbar -->
  <div
    class="md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-300">
    <div class="flex-none w-56 flex flex-row items-center">
      <button id="sliderBtn" class="flex-none text-right text-gray-900 hidden md:block">
        <i class="fad fa-list-ul"></i>
      </button>
      <img src="../assets/svg/luxetask.svg" class="flex-none md:hidden sm:hidden w-32">
    </div>

    <button id="navbarToggle" class="hidden md:block md:fixed right-0 mr-6">
      <i class="fad fa-chevron-double-down"></i>
    </button>
    <div id="navbar"
      class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-between items-center md:flex-col md:items-center">

      <div></div>

      <div class="flex flex-row-reverse items-center">

        <div class="dropdown relative md:static">

          <button class="menu-btn focus:outline-none flex flex-wrap items-center">
            <div class="ml-2 capitalize flex ">
              <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">
                <?php echo htmlspecialchars($_SESSION['name']); ?>
              </h1>
              <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
            </div>
          </button>

          <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

          <div
            class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">

            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
              href="dashboard_pengaturan.php">
              <i class="fad fa-user-edit text-xs mr-1"></i>
              Edit Profile
            </a>

            <hr>

            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
              href="../php/process_logout.php">
              <i class="fad fa-user-times text-xs mr-1"></i>
              log out
            </a>

          </div>
        </div>
      </div>
    </div>

  </div> <!-- End - Navbar -->

  <!-- Wrapper -->
  <div class="h-screen flex flex-row flex-wrap">

    <!-- Sidebar -->
    <div id="sideBar"
      class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">
      <div class="flex flex-col">

        <div class="text-right hidden md:block mb-4">
          <button id="sideBarHideBtn">
            <i class="fad fa-times-circle"></i>
          </button>
        </div>

        <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">Dashboard</p>

        <a href="dashboard_beranda.php"
          class="text-blue-700 mb-3 capitalize font-medium text-sm transition ease-in-out duration-500">
          <i class="fad fa-chart-pie text-xs mr-2"></i>
          Beranda
        </a>

        <a href="dashboard_buat_tugas.php"
          class="mb-3 capitalize font-medium text-sm hover:text-blue-700 transition ease-in-out duration-500">
          <i class="fad fa-list text-xs mr-2"></i>
          Buat Tugas
        </a>

        <a href="dashboard_tugas_selesai.php"
          class="mb-3 capitalize font-medium text-sm hover:text-blue-700 transition ease-in-out duration-500">
          <i class="fad fa-check-double text-xs mr-2"></i>
          Tugas Selesai
        </a>

        <a href="dashboard_tugas_tertunda.php"
          class="mb-3 capitalize font-medium text-sm hover:text-blue-700 transition ease-in-out duration-500">
          <i class="fad fa-clock text-xs mr-2"></i>
          Tugas Tertunda
        </a>

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Pengaturan</p>

        <a href="dashboard_pengaturan.php"
          class="mb-3 capitalize font-medium text-sm hover:text-blue-700 transition ease-in-out duration-500">
          <i class="fad fa-cogs text-xs mr-2"></i>
          Pengaturan Akun
        </a>

      </div>

    </div> <!-- End - Sidebar -->

    <!-- Main Content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">

      <!-- Title -->
      <div class="mb-5">
        <h2 class="text-2xl font-semibold text-gray-800">Dashboard Beranda</h2>
      </div>

      <!-- Statistic Task -->
      <div class="gap-6 xl:grid-cols-1 flex sm:flex-col lg:flex-col">
        <div class="report-card w-full">
          <div class="card">
            <div class="card-body flex flex-col">
              <div class="flex flex-row justify-between items-center">
                <div class="h6 text-indigo-700 fad fa-tasks"></div>
              </div>
              <div class="mt-8">
                <h1 class="h5 text-gray-800 font-semibold">
                  <?php echo $stats['total_tasks']; ?>
                </h1>
                <p class="text-base text-gray-700  ">Semua Tugas</p>
              </div>
            </div>
          </div>
          <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>

        <div class="report-card w-full">
          <div class="card">
            <div class="card-body flex flex-col">
              <div class="flex flex-row justify-between items-center">
                <div class="h6 text-red-700 fad fa-check-double"></div>
              </div>
              <div class="mt-8">
                <h1 class="h5 font-semibold text-gray-800">
                  <?php echo $stats['completed_tasks']; ?>
                </h1>
                <p class="text-base text-gray-700">Tugas Selesai</p>
              </div>
            </div>
          </div>
          <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>

        <div class="report-card w-full">
          <div class="card">
            <div class="card-body flex flex-col">

              <div class="flex flex-row justify-between items-center">
                <div class="h6 text-yellow-600 fad fa-clock"></div>
              </div>
              <div class="mt-8">
                <h1 class="h5 text-gray-800 font-semibold">
                  <?php echo $stats['pending_tasks']; ?>
                </h1> 
                <p class="text-gray-700 text-base">Tugas Tertunda</p>
              </div>
            </div>
          </div>
          <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>
      </div> <!-- End - Statistic Task -->

      <!-- Task List -->
      <div
        class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 lg:flex-col lg:flex md:flex-col md:flex sm:flex-col sm:flex">

        <!-- Task Terbaru -->
        <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-2xl transition-all duration-300">
          <h3 class="text-xl font-medium text-gray-700 mb-4">
            <i class="fas fa-thumbtack text-red-500 mr-3"></i> Tugas Terbaru
          </h3>
          <?php if (count($tasks) > 0): ?>
          <div class="space-y-4">
            <?php foreach ($tasks as $task): ?>
            <div
              class="flex items-center justify-between p-4 bg-gray-50 rounded-lg shadow-sm hover:bg-gray-100 transition duration-300">
              <div>
                <h4 class="font-medium text-gray-800">
                  <?php echo htmlspecialchars($task['task_name']); ?>
                </h4>
                <p class="text-sm text-gray-500">Deadline:
                  <span class="text-red-500 font-semibold">
                    <?php echo htmlspecialchars($task['deadline']); ?>
                  </span>
                </p>
              </div>
              <span class="px-3 py-1 text-sm font-medium text-white rounded-md
                <?php echo ($task['status'] == 'selesai') ? 'bg-green-500' : 'bg-yellow-500'; ?>">
                <?php echo ucfirst($task['status']); ?>
              </span>
            </div>
            <?php endforeach; ?>
          </div>
          <?php else: ?>
          <!-- Tampilan Jika Tidak Ada Tugas -->
          <div class="bg-gray-100 p-6 text-center rounded-lg">
            <i class="fas fa-tasks text-gray-400 text-6xl mb-3"></i>
            <p class="text-gray-600 font-semibold">Belum ada tugas yang dibuat.</p>
            <p class="text-sm text-gray-500">Klik pada sidebar "Buat Tugas" untuk membuat tugas</p>
          </div>
          <?php endif; ?>
        </div>

      </div> <!-- End - Task List -->



    </div> <!-- End - Main Content -->

  </div> <!-- End - Wrapper -->

  <!-- Javascript Main -->
  <script src="assets/js/main.js"></script>

</body>

</html>