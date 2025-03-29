<?php

// Session Admin
include '../php/admin/session/session_admin.php';

// Koneksi Database
include '../config/connection.php';

// Php Main
include '../php/admin/dashboard_pengguna/main.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Luxe Task | Dashboard Pengguna</title>

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
          class="hover:text-blue-700 mb-3 capitalize font-medium text-sm transition ease-in-out duration-500">
          <i class="fad fa-chart-pie text-xs mr-2"></i>
          Beranda
        </a>

        <a href="dashboard_pengguna.php"
          class="mb-3 capitalize font-medium text-sm text-blue-700 transition ease-in-out duration-500">
          <i class="fad fa-users text-xs mr-2"></i>
          Kelola Pengguna
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
        <h2 class="text-2xl font-semibold text-gray-800">Kelola Pengguna</h2>
      </div>

      <div class="bg-white shadow-lg rounded-xl p-6">
        <!-- Action Buttons -->
        <div class="flex justify-between items-center mb-4 sm:flex md: flex sm:flex-col md:flex-col">
          <!-- Search Data -->
          <div style="position: relative; top: 8px;">
            <input id="search-data" type="text" placeholder="Cari Disini..."
              class="w-72 pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 text-sm font-medium text-gray-700 transition-all"
              autocomplete="off" value="<?= htmlspecialchars($searchQuery) ?>" />
            <svg style="position: relative; bottom: 29px; left: 12px" class="h-5 w-5 text-gray-400"
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11 4a7 7 0 100 14 7 7 0 000-14zM21 21l-4.35-4.35" />
            </svg>
          </div>

          <div class="flex gap-3">
            <button onclick="window.location.href='dashboard_tambah_data.php';"
              class="flex items-center sm:flex-col px-4 py-2 btn-bs-primary focus:outline-none text-sm sm:text-xs">
              <i class="fas fa-plus mr-2"></i> Tambah Data
            </button>
            <button onclick="window.location.href='export_excel.php';"
              class="flex items-center sm:flex-col px-4 py-2 btn-bs-success focus:outline-none text-sm sm:text-xs">
              <i class="fas fa-file-excel mr-2"></i> Export XLSX
            </button>
            <button onclick="window.location.href='export_pdf.php';"
              class="flex items-center sm:flex-col px-4 py-2 btn-bs-danger focus:outline-none text-sm sm:text-xs">
              <i class="fas fa-file-pdf mr-2"></i> Export PDF
            </button>
          </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto border-collapse border border-gray-200">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 border border-gray-200 text-left font-medium text-sm text-gray-700">ID</th>
                <th class="px-4 py-2 border border-gray-200 text-left font-medium text-sm text-gray-700">Nama</th>
                <th
                  class="px-4 py-2 border border-gray-200 text-left font-medium text-sm text-gray-700 sm:hidden md:hidden">
                  Email</th>
                <th class="px-4 py-2 border border-gray-200 text-left font-medium text-sm text-gray-700">Role</th>
                <th
                  class="px-4 py-2 border border-gray-200 text-left font-medium text-sm text-gray-700 sm:hidden md:hidden">
                  Tanggal Dibuat
                </th>
                <th class="px-4 py-2 border border-gray-200 text-center font-medium text-sm text-gray-700">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch_assoc()): ?>
              <tr class="hover:bg-gray-100 transition">
                <td class="px-4 py-2 border border-gray-200 text-sm text-gray-700">
                  <?= $row['user_id'] ?>
                </td>
                <td
                  class="px-4 py-2 border border-gray-200 text-sm text-gray-700 whitespace-nowrap overflow-hidden text-ellipsis max-w-[150px]">
                  <?= htmlspecialchars($row['name']) ?>
                </td>
                <td class="px-4 py-2 border border-gray-200 text-sm text-gray-700 sm:hidden md:hidden">
                  <?= htmlspecialchars($row['email']) ?>
                </td>
                <td class="px-4 py-2 border border-gray-200 text-sm text-gray-700">
                  <?= $row['role'] ?>
                </td>
                <td class="px-4 py-2 border border-gray-200 text-sm text-gray-700 sm:hidden md:hidden">
                  <?= $row['created_at'] ?>
                </td>
                <td class="px-4 py-2 border border-gray-200 text-center">
                  <button onclick="window.location.href='dashboard_edit_data.php?user_id=<?= $row['user_id'] ?>';"
                    class="text-blue-600 hover:text-blue-800 mx-2 text-sm focus:outline-none">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button onclick="window.location.href='dashboard_delete_data.php?user_id=<?= $row['user_id'] ?>';"
                    class="text-red-600 hover:text-red-800 mx-2 text-sm focus:outline-none">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>

        <!-- Entri Data & Dropdown Pagination -->
        <div class="flex justify-between items-center mt-8">
          <span class="text-gray-700 text-sm">
            <?php if ($searchQuery !== ''): ?>
            Menampilkan <strong>
              <?= $result->num_rows ?>
            </strong> Entri Hasil Pencarian
            <?php else: ?>
            Menampilkan <strong>
              <?= $startEntry ?> -
              <?= $endEntry ?>
            </strong> dari <strong>
              <?= $totalEntries ?>
            </strong> Entri
            <?php endif; ?>
          </span>

          <div class="relative inline-block">
            <select id="pagination"
              class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 text-sm font-medium text-gray-700 transition-all"
              onchange="location = this.value;">
              <?php for ($i = 1; $i <= $totalPages; $i++): ?>
              <option value="?page=<?= $i ?>&search=<?= htmlspecialchars($searchQuery) ?>" <?=$i==$page ? 'selected'
                : '' ?>>
                Halaman
                <?= $i ?>
              </option>
              <?php endfor; ?>
            </select>
          </div>

          </table>
        </div>

      </div> <!-- End - Main Content -->

    </div> <!-- End - Wrapper -->

    <!-- Javascript Main -->
    <script src="assets/js/main.js"></script>

</body>

</html>