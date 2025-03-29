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

// Kode php konfigurasi verifikasi password disini

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Title -->
    <title>Luxe Task | Konfirmasi Password</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="../../assets/favicons/luxetask.png" type="image/x-icon">

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="../../tailwindcss/src/output.css">

    <!-- Vendor Files -->
    <link rel="stylesheet" href="../../assets/vendor/FontAwesome6Pro/css/all.min.css">
    <link rel="stylesheet" href="../../tailwindcss/src/poppins.css">
    <link rel="stylesheet" href="../../assets/css/index.css">

</head>

<body class="bg-blue-50 flex items-center justify-center min-h-screen">
    
    <!-- Left Content -->
    <div class="bg-white shadow-lg rounded-md p-8 max-w-md w-full">

        <!-- Judul & Deskripsi -->
        <h2 class="text-3xl font-bold text-gray-700 mb-6">Buat Password Baru</h2>
        <p class="text-gray-700 mb-8 text-base">Masukkan password baru dan konfirmasi password Anda.</p>

        <!-- Form -->
        <form action="#" method="POST" class="space-y-4">

            <!-- Validas Pesan Error -->
            <div id="error-message" class="hidden bg-red-100 border border-red-400 text-red-700 p-3 rounded-md">
                <p id="error-text"><!-- Echo $variable_error --></p>
            </div>

            <!-- Input Password Baru -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required placeholder="Masukkan password baru"
                        class="w-full px-4 py-3 border rounded-md focus:outline-none" autocomplete="off">
                    <button type="button" id="toggle-password" class="absolute right-4 top-3.5">
                        <i id="eye-icon" class="fas fa-eye text-gray-400"></i>
                    </button>
                </div>
            </div>

            <!-- Input Verifikasi Password -->
            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">Verifikasi Password</label>
                <div class="relative">
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Konfirmasi password baru"
                        class="w-full px-4 py-3 border rounded-md focus:outline-none" autocomplete="off">
                    <button type="button" id="toggle-confirm-password" class="absolute right-4 top-3.5">
                        <i id="eye-icon" class="fas fa-eye text-gray-400"></i>
                    </button>
                </div>
            </div>

            <!-- Button Submit -->
            <button type="submit"
                class="w-full bg-[#5a67d8] hover:bg-[#4953aa] text-white font-semibold py-3 rounded-md transition-all duration-300">
                Reset Password
            </button>

        </form>

        <!-- Kembali ke Login -->
        <p class="text-center text-sm text-gray-600 mt-5">
            Ingat password Anda? <a href="../login.php" class="text-[#5a67d8] font-medium hover:underline">Masuk sekarang</a>.
        </p>

    </div> <!-- End - Left Content -->

    <!-- Right Content -->
    <div class="hidden md:block md:w-1/2 flex items-center justify-center animate-bounce-infinite">
        <img src="../../assets/svg/Email-campaign-pana.svg" alt="Ilustrasi Reset Password" class="max-w-full h-auto p-8" />
    </div> <!-- End - Right Content -->

    <!-- Pages -->
    <script>
        // Toggle Password Functionality
        const togglePassword = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        togglePassword.addEventListener('click', () => {
            const isPasswordHidden = passwordInput.type === 'password';
            passwordInput.type = isPasswordHidden ? 'text' : 'password';
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });

        // Toggle Confirm Password Functionality
        const toggleConfirmPassword = document.getElementById('toggle-confirm-password');
        const confirmPasswordInput = document.getElementById('confirm_password');
        const eyeIconConfirm = document.getElementById('eye-icon-confirm');

        toggleConfirmPassword.addEventListener('click', () => {
            const isConfirmPasswordHidden = confirmPasswordInput.type === 'password';
            confirmPasswordInput.type = isConfirmPasswordHidden ? 'text' : 'password';
            eyeIconConfirm.classList.toggle('fa-eye');
            eyeIconConfirm.classList.toggle('fa-eye-slash');
        });

        // Autofill Confirm Password when Password is entered
        passwordInput.addEventListener('input', () => {
            confirmPasswordInput.value = passwordInput.value;
        });
    </script>

</body>

</html>
