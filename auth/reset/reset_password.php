<?php

// Memulai Sesi
session_start();

// Koneksi Database
include '../../config/connection.php';

// Pengecekan users sudah login, jika sudah maka kemabalikan ke halaman sesuai role
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: ../../admin/dashboard_beranda.php");
    } elseif ($_SESSION['role'] == 'pengguna') {
        header("Location: ../../pages/dashboard_beranda.php");
    }

    exit();
}

// Kode php konfigurasi lupa password disini

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Luxe Task | Reset Password</title>

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="../../tailwindcss/src/output.css">

    <!-- Vendor Files -->
    <link rel="stylesheet" href="../../assets/vendor/FontAwesome6Pro/css/all.min.css">
    <link rel="stylesheet" href="../../tailwindcss/src/poppins.css">
    <link rel="stylesheet" href="../../assets/css/index.css">

</head>

<body class="bg-blue-50 flex items-center justify-center min-h-screen">

    <!-- Content -->
    <div class="bg-white shadow-lg rounded-md p-8 max-w-md w-full">
        <h2 class="text-3xl font-bold text-gray-700 mb-6">Reset Password</h2>
        <p class="text-gray-700 mb-8 text-base">Masukkan email Anda untuk mereset password.</p>

        <!-- Form -->
        <form method="POST" class="space-y-4">

            <!-- Pesan Error -->
            <div id="error-message" class="hidden bg-red-100 border border-red-400 text-red-700 p-3 rounded-md">
                <p id="error-text">
                    <!-- Echo $variable_error dengan php -->
                </p>
            </div>

            <div id="success-message" class="hidden bg-green-100 border border-green-400 text-green-700 p-3 rounded-md">
                <p id="success-text">
                    <!-- Echo $variable_success dengan php -->
                </p>
            </div>

            <!-- Input Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <div class="relative">
                    <input type="email" id="email" name="email" required placeholder="Masukkan email Anda"
                        class="w-full px-4 py-3 border rounded-md focus:outline-none" autocomplete="off">
                    <i class="fas fa-envelope absolute right-4 top-4 text-gray-400"></i>
                </div>
            </div>

            <!-- Submit -->
            <button type="submit" name="submit"
                class="w-full bg-[#5a67d8] hover:bg-[#4953aa] text-white font-semibold py-3 rounded-md transition-all duration-300">
                Kirim Email Reset
            </button>

        </form> <!-- End - Form -->

        <!-- Ingat Password -->
        <p class="text-center text-sm text-gray-600 mt-5">
            Ingat password Anda? <a href="../login.php" class="text-[#5a67d8] font-medium hover:underline">Masuk</a>.
        </p>
    </div> <!-- End - Left Content -->

    <!-- Right Content -->
    <div class="hidden md:block md:w-1/2 flex items-center justify-center animate-bounce-infinite">
        <img src="../../assets/svg/Email-campaign-pana.svg" alt="Ilustrasi Reset Password"
            class="max-w-full h-auto p-8" />
    </div> <!-- End - Right Content -->

    <!-- Javascript Pages -->
    <script>
        window.onload = function () {
            // Pengecekan jika berhasil atau terjadi error pada proses pengiriman pesan
            var errorMessage = "<?php //echo $variable_error ?>";
            var successMessage = "<?php //echo $variable_success ?>";

            // Menampilkan pesan error
            if (errorMessage) {
                document.getElementById("error-message").classList.remove("hidden");
            }

            // Menampilkan pesan sukses
            if (successMessage) {
                document.getElementById("success-message").classList.remove("hidden");
            }
        }
    </script>

    <!-- Javascript -->
    <script src="../../assets/js/auth/main.js"></script>

</body>

</html>