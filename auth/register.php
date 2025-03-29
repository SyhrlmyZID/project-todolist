<?php

// Session Auth
include '../php/auth/session/session_auth.php';

// Proses Register
include '../php/auth/process_register.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Luxe Task | Register</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="../assets/favicons/luxetask.png" type="image/x-icon">

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="../tailwindcss/src/output.css">

    <!-- Vendor Files -->
    <link rel="stylesheet" href="../assets/vendor/FontAwesome6Pro/css/all.min.css">
    <link rel="stylesheet" href="../tailwindcss/src/poppins.css">

</head>

<body class="bg-blue-50 flex items-center justify-center min-h-screen">

    <!-- Left Content -->
    <div class="bg-white shadow-lg rounded-md p-8 max-w-md w-full">

        <!-- Judul & Deskripsi -->
        <h2 class="text-3xl font-bold text-gray-700 mb-6">Daftar Ke <span class="text-[#5a67d8]">LuxeTask</span></h2>
        <p class="text-gray-700 mb-8 text-base">Buat akun Anda dan mulai perjalanan baru bersama kami.</p>

        <!-- Form -->
        <form class="space-y-4" method="POST">

            <!-- Validasi Pesan Error -->
            <div id="error-message"
                class="hidden bg-red-100 border border-red-400 text-red-700 p-3 rounded-md text-base">
                <p id="error-text"></p>
            </div>

            <!-- Input Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                <div class="relative">
                    <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda"
                        class="w-full px-4 py-3 border rounded-md focus:outline-none" autocomplete="off">
                    <i class="fas fa-user absolute right-4 top-4 text-gray-400"></i>
                </div>
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

            <!-- Input Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required placeholder="Masukkan password Anda"
                        class="w-full px-4 py-3 border rounded-md focus:outline-none" autocomplete="off">
                    <button type="button" id="toggle-password" class="absolute right-4 top-3.5">
                        <i id="eye-icon" class="fas fa-eye text-gray-400"></i>
                    </button>
                </div>
            </div>

            <!-- Button Submit -->
            <button type="submit"
                class="w-full bg-[#040505] hover:bg-[#4953aa] text-white font-semibold py-3 rounded-md transition-all duration-300">
                Daftar Sekarang
            </button>

        </form>

        <!-- Sudah Punya Akun -->
        <p class="text-center text-sm text-gray-600 mt-5">
            Sudah punya akun? <a href="login.php" class="text-[#5a67d8] font-medium hover:underline">Masuk</a>.
        </p>

    </div> <!-- End - Left Content -->

    <!-- Right Content -->
    <div class="hidden md:block md:w-1/2 flex items-center justify-center">
        <img src="../assets/svg/Secure-login-pana.svg" alt="Ilustrasi Login" class="max-w-full h-auto p-8" />
    </div> <!-- End - Rigt Content -->

    <!-- Javascript Main -->
    <script src="../assets/js/auth/main.js"></script>

    <!-- Javascript Pages -->
    <script>

        // Menjalankan event listener ketika halaman berhasil dimuat
        document.addEventListener("DOMContentLoaded", function () {

            // Mengambil elemen form dan elemen pesan error dari HTML
            const form = document.querySelector("form");
            const errorMessage = document.getElementById("error-message");
            const errorText = document.getElementById("error-text");

            // Memanggil event ketika form disubmit
            form.addEventListener("submit", function (e) {
                e.preventDefault();

                // Mengumpulkan data dari form menggunakan FormData
                const formData = new FormData(form);

                // Mengirim data form ke server dengan menggunakan Fetch API
                fetch("register.php", {
                    method: "POST",
                    body: formData,
                })
                
                    // Mengubah respon server menjadi format JSON
                    .then(response => response.json())

                    // Mengolah data yang diterima dari server
                    .then(data => {

                        // Jika ada error dari server (misalnya email sudah terdaftar)
                        if (data.status === "error") {
                            errorText.innerText = data.message;
                            errorMessage.classList.remove("hidden");
                        } else if (data.status === "success") {

                            // Jika register berhasil, pindah ke halaman login
                            window.location.href = "login.php";
                        }
                    });
            });
        });
    </script>

</body>

</html>