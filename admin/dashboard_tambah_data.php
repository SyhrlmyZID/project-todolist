<?php

// Session Admin
include '../php/admin/session/session_admin.php';

// Koneksi Database
include '../config/connection.php';

// Php Main
include '../php/admin/dashboard_pengguna/add_data.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Luxe Task | Dashboard Kelola Pengguna</title>

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

            <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
              href="dashboard_buat_tugas.php">
              <i class="fad fa-badge-check text-xs mr-1"></i>
              Tugas
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

      <div class="bg-white shadow-md rounded-lg p-8 border border-gray-200">

        <!-- Title -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
          <i class="fad fa-plus-circle text-indigo-500 mr-2"></i> Tambah Data Pengguna
        </h1>

        <!-- Pesan Validasi -->
        <?php if ($message): ?>
        <div
          class="w-full p-4 mb-6 rounded-md flex items-center <?= $success ? 'bg-green-100 border border-green-300 text-green-700' : 'bg-red-100 border border-red-300 text-red-700' ?>">
          <i
            class="fad <?= $success ? 'fa-check-circle text-green-500' : 'fa-triangle-exclamation text-red-500' ?> text-xl mr-3"></i>
          <span class="font-medium">
            <?= htmlspecialchars($message) ?>
          </span>
        </div>
        <?php endif; ?>

        <form method="POST" class="space-y-6">
          <!-- Nama -->
          <div>
            <label class="block text-gray-600 font-medium mb-2">Nama</label>
            <input type="text" name="name"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400"
              placeholder="Masukan Nama" maxlength="30" autocomplete="off">
          </div>
          <!-- Email -->
          <div>
            <label class="block text-gray-600 font-medium mb-2">Email</label>
            <input type="email" name="email"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400"
              placeholder="Masukan Email" maxlength="50" autocomplete="off">
          </div>
          <!-- Password -->
          <div class="relative">
            <label class="block text-gray-600 font-medium mb-2">Password</label>
            <input type="password" name="password" id="password"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400"
              placeholder="Masukan Password" maxlength="60" autocomplete="off">
            <button type="button" class="absolute right-4 top-9 text-gray-500 hover:text-gray-700">
            </button>
          </div>
          <!-- Role -->
          <div>
            <label class="block text-gray-600 font-medium mb-2">Role</label>
            <select name="role"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400">
              <option value="admin">Admin</option>
              <option value="pengguna">Pengguna</option>
            </select>
          </div>
          <!-- Action Buttons -->
          <div class="flex justify-end space-x-3">
            <a href="dashboard_pengguna.php" class="px-4 py-2 btn-bs-secondary">
              <i class="fad fa-arrow-left mr-1"></i> Kembali
            </a>
            <button type="submit" class="px-4 py-2 btn-bs-primary">
              <i class="fad fa-save mr-1"></i> Simpan
            </button>
          </div>
        </form>
      </div>

    </div> <!-- End - Main Content -->

  </div> <!-- End - Wrapper -->

  <!-- Javascript Main -->
  <script src="assets/js/main.js"></script>

</body>

</html>