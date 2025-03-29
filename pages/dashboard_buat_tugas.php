<?php

// Session Pages
include '../php/pages/session/session_pages.php';

// Koneksi Database
include '../config/connection.php';

// Php Main
include '../php/pages/dashboard_buat_tugas/main.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Luxe Task | Dashboard Buat Tugas</title>

  <!-- Favicons -->
  <link rel="shortcut icon" href="../assets/img/fav.png" type="image/x-icon">

  <!-- Vendor Files -->
  <link rel="stylesheet" href="../assets/vendor/FontAwesome6Pro/css/all.min.css">
  <script src="../assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>

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

        <a href="dashboard_buat_tugas.php"
          class="mb-3 capitalize font-medium text-sm text-blue-700 transition ease-in-out duration-500">
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
        <h2 class="text-2xl font-semibold text-gray-800">Buat Tugas</h2>
      </div>

      <!-- Search Data -->
      <div class="relative w-full sm:w-full md:w-full">
        <input id="search-task" type="text" placeholder="Cari Tugas..." value="<?php echo htmlspecialchars($search); ?>"
          class="w-full sm:w-full md:w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 text-sm font-medium text-gray-700 transition-all"
          autocomplete="off" />
        <svg style="top: -20px; position: relative; left  :10px"
          class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400"
          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M11 4a7 7 0 100 14 7 7 0 000-14zM21 21l-4.35-4.35" />
        </svg>
      </div>

      <!-- Pagination Dropdown -->
      <?php if ($total_tasks > 0): ?>
      <div class="relative mb-4 sm:w-full md:w-full">
        <select id="page-select"
          class="block w-full md:w-full sm:w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 text-sm font-medium text-gray-700 transition-all"
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


      <!-- Sweet Alert -->
      <?php include 'include/sweetalert_buat_tugas.php'; ?>

      <!-- Form Add Task -->
      <form id="task_form" action="dashboard_buat_tugas.php" method="POST"
        class="flex flex-wrap gap-4 p-4 bg-white rounded-lg shadow mb-4">
        <input id="task_name" name="task_name" type="text" maxlength="50"
          class="flex-1 bg-gray-100 rounded-md p-2 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
          autocomplete="off" placeholder="Masukkan nama tugas..." required />
        <input id="deadline" name="deadline" type="date"
          class="bg-gray-100 rounded-md p-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <select id="priority" name="priority"
          class="bg-gray-100 rounded-md p-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="penting">Penting</option>
          <option value="biasa" selected>Biasa</option>
        </select>
        <button type="submit" class="btn-bs-primary w-full sm:w-auto">Tambah</button>
      </form>

      <!-- Task List -->
      <div class="bg-white shadow rounded-lg p-6 mt-6">
        <?php if (count($tasks) > 0): ?>
        <div id="task_list" class="max-h-96 overflow-auto space-y-2">
          <?php foreach ($tasks as $task): ?>
          <div
            class="flex flex-wrap items-center space-x-4 p-4 rounded-md shadow bg-white task-item <?php echo ($task['status'] == 'Complete') ? 'line-through text-gray-400' : ''; ?>"
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

              <!-- Priority & Status Badges -->
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

            <!-- Status Dropdown -->
            <div class="flex items-center space-x-2">
              <select class="text-sm p-1 bg-gray-100 rounded-md status-dropdown"
                data-task-id="<?php echo $task['task_id']; ?>" data-status="<?php echo $task['status']; ?>">
                <option <?php echo ($task['status']=='' ) ? 'selected' : '' ; ?>>Pilih status</option>
                <option value="Tertunda" <?php echo ($task['status']=='Tertunda' ) ? 'selected' : '' ; ?>>Tertunda
                </option>
                <option value="Selesai" <?php echo ($task['status']=='Selesai' ) ? 'selected' : '' ; ?>>Selesai</option>
              </select>
            </div>

            <!-- Edit Task -->
            <i class="fas fa-edit text-blue-500 cursor-pointer" onclick="openEditTaskModal(this)"
              data-task-id="<?php echo $task['task_id']; ?>" data-task-name="<?php echo $task['task_name']; ?>"
              data-deadline="<?php echo $task['deadline']; ?>" data-priority="<?php echo $task['priority']; ?>"></i>

            <!-- Delete Task -->
            <i class="fa fa-trash text-red-600 cursor-pointer"
              onclick="openModal('dashboard_buat_tugas.php?id=<?php echo $task['task_id']; ?>')"></i>
          </div>
          <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="bg-gray-100 p-4 text-center rounded-lg">
          <p class="text-gray-600">Tidak Ada Tugas.</p>
        </div>
        <?php endif; ?>
      </div> <!-- Task List -->

    </div> <!-- End - Main Content -->

  </div> <!-- End - Wrapper -->

  <!-- Javascript Main -->
  <script src="assets/js/main.js"></script>

</body>

<!-- Modal Delete Task -->
<div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
  <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-2xl transition-all transform scale-95">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
    <p class="text-gray-600 mb-8 text-center">Apakah Anda yakin ingin menghapus tugas ini?</p>
    <div class="flex justify-center space-x-4">
      <!-- Button Tidak -->
      <button type="button"
        class="flex items-center justify-center w-32 rounded-lg bg-gray-200 px-4 py-2 text-gray-700 transition hover:bg-gray-300"
        onclick="closeModalDelete()">
        <i class="fas fa-times mr-2"></i> Tidak
      </button>
      <!-- Button Ya -->
      <a id="confirmDeleteLink" href="#"
        class="flex items-center justify-center w-32 rounded-lg bg-red-600 px-4 py-2 text-white transition hover:bg-red-700">
        <i class="fas fa-trash-alt mr-2"></i> Ya
      </a>
    </div>
  </div>
</div>
<!-- End - Modal Delete Task -->

<!-- Modal Edit Task -->
<div id="editModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-gray-800 bg-opacity-50">
  <div class="w-full max-w-lg rounded-2xl bg-white p-8 shadow-2xl transition-all transform scale-95">
    <h2 class="mb-6 text-2xl font-semibold text-gray-800">Edit Tugas</h2>
    <form id="editTaskForm" action="../php/pages/dashboard_buat_tugas/update_task.php" method="POST">
      <input type="hidden" id="task_id" name="task_id">

      <!-- Task Name -->
      <div class="mb-5">
        <label for="taskName" class="block text-sm font-medium text-gray-700 mb-2">Nama Tugas</label>
        <input type="text" id="taskName" name="task_name"
          class="w-full rounded-lg border-gray-300 px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition" />
      </div>

      <!-- Priority -->
      <div class="mb-5">
        <label for="priority" class="block text-sm font-medium text-gray-700 mb-2">Prioritas</label>
        <select id="priority" name="priority"
          class="w-full rounded-lg border-gray-300 px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
          <option value="penting">Penting</option>
          <option value="biasa">Biasa</option>
        </select>
      </div>

      <!-- Deadline -->
      <div class="mb-5">
        <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Deadline</label>
        <input type="date" id="deadline" name="deadline"
          class="w-full rounded-lg border-gray-300 px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition" />
      </div>

      <!-- Buttons -->
      <div class="flex justify-end space-x-4">
        <button type="button"
          class="flex items-center justify-center w-32 rounded-lg bg-gray-200 px-4 py-2 text-gray-700 transition hover:bg-gray-300"
          onclick="closeModalEdit()">
          <i class="fas fa-times mr-2"></i> Batal
        </button>
        <button type="submit"
          class="flex items-center justify-center w-32 rounded-lg bg-blue-600 px-4 py-2 text-white transition hover:bg-blue-700">
          <i class="fas fa-save mr-2"></i> Simpan
        </button>
      </div>
    </form>
  </div>
</div>
<!-- End - Modal Edit Task -->

</html>