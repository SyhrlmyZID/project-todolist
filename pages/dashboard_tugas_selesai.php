<?php

// Session Pages
include '../php/pages/session/session_pages.php';

// Koneksi Database
include '../config/connection.php';

// Php Main
include '../php/pages/dashboard_tugas_selesai/main.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Luxe Task | Dashboard Tugas Selesai</title>

  <!-- Favicons -->
  <link rel="shortcut icon" href="../assets/img/fav.png" type="image/x-icon">

  <!-- Vendor Files -->
  <link rel="stylesheet" href="../assets/vendor/FontAwesome6Pro/css/all.min.css">

  <!-- Custom CSS -->
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
          class="mb-3 capitalize font-medium text-sm hover:text-blue-700 transition ease-in-out duration-500">
          <i class="fad fa-chart-pie text-xs mr-2"></i>
          Beranda
        </a>

        <a href="dashboard_buat_tugas.php"
          class="mb-3 capitalize font-medium text-sm hover:text-blue-700 transition ease-in-out duration-500">
          <i class="fad fa-list text-xs mr-2"></i>
          Buat Tugas
        </a>

        <a href="dashboard_tugas_selesai.php"
          class="mb-3 capitalize font-medium text-sm text-blue-700 transition ease-in-out duration-500">
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

      <div class="mb-5 flex flex-wrap justify-between items-center gap-4 sm:flex-col sm:items-start">

        <!-- Title -->
        <div>
          <h2 class="text-2xl font-semibold text-gray-800">Tugas Selesai</h2>
        </div>

        <!-- Search Data -->
        <div style="position: relative; top: 8px;" class="sm:w-full md:w-full">
          <form method="GET">
            <input id="search-task" name="search" type="text" placeholder="Cari Tugas..."
              value="<?php echo htmlspecialchars($search); ?>"
              class="w-72 sm:w-full md:w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 text-sm font-medium text-gray-700 transition-all"
              autocomplete="off" />
            <button type="submit" hidden></button>
            <svg style="position: relative; bottom: 29px; left: 12px" class="h-5 w-5 text-gray-400"
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11 4a7 7 0 100 14 7 7 0 000-14zM21 21l-4.35-4.35" />
            </svg>
          </form>
        </div>

        <!-- Pagination Dropdown -->
        <?php if ($total_tasks > 0): ?>
        <div class="relative sm:w-full md:w-full">
          <select id="page-select"
            class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 text-sm font-medium text-gray-700 transition-all"
            onchange="location = this.value;">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <option class="font-medium text-gray-700" value="?page=<?= $i ?>&search=<?= urlencode($search) ?>"
              <?=$i==$page ? 'selected' : '' ?>>
              Halaman
              <?= $i ?>
            </option>
            <?php endfor; ?>
          </select>
        </div>
        <?php else: ?>
        <?php endif; ?>


      </div>

      <div class="space-y-4">

        <!-- Task List -->
        <div class="bg-white shadow rounded-lg p-6 mt-6">
          <?php if (count($tasks) > 0): ?>
          <div id="task_list" class="max-h-96 overflow-auto space-y-2">
            <?php foreach ($tasks as $task): ?>
            <div class="flex items-center space-x-4 p-4 rounded-md shadow bg-white task-item"
              id="task-<?php echo $task['task_id']; ?>">

              <!-- Task Name -->
              <div class="flex-1">
                <span class="font-medium text-gray-800">
                  <?php echo $task['task_name']; ?>
                </span>
                <div class="text-sm text-gray-500">
                  Deadline: <span class="text-red-500 font-semibold">
                    <?php echo ($task['deadline'] == "Tidak ada deadline" ? "Tidak ada deadline" : $task['deadline']); ?>
                  </span>
                </div>

                <!-- Priority & Status Badge -->
                <div class="mt-2 flex space-x-2">
                  <span
                    class="px-3 py-1 text-sm font-medium text-white rounded-md bg-<?php echo ($task['priority'] == 'penting') ? 'red' : 'blue'; ?>-500">
                    <?php echo ucfirst($task['priority']); ?>
                  </span>
                  <span id="status-badge-<?php echo $task['task_id']; ?>"
                    class="px-3 py-1 text-sm font-medium text-white rounded-md <?php echo ($task['status'] == 'selesai') ? 'bg-green-500' : 'bg-orange-500'; ?>">
                    <?php echo ucfirst($task['status']); ?>
                  </span>
                </div>
              </div>

              <!-- Task Complete Icon -->
              <i class="fa fa-check text--600 cursor-pointer text-green-600"></i>
            </div>
            <?php endforeach; ?>
          </div>
          <?php else: ?>
          <div class="bg-gray-100 p-4 text-center rounded-lg">
            <p class="text-gray-600">Tidak Ada Tugas.</p>
          </div>
          <?php endif; ?>
        </div> <!-- Task List -->

      </div>

    </div> <!-- End - Main Content -->

  </div> <!-- End - Wrapper -->

  <!-- Javascript Main -->
  <script src="assets/js/dashboard_tugas_selesai.js"></script>

</body>

</html>