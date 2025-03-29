# 📋 To-Do List Application

Aplikasi **To-Do List** ini merupakan aplikasi web sederhana yang bertujuan untuk membantu pengguna mengatur dan melacak tugas mereka. Berikut adalah detail tentang aplikasi yang digunakan dalam project ini:

---

## 🛠️ Sistem yang Digunakan

- **XAMPP**: Versi `8.2`  
- **PHP**: Versi `8.2.12`  
- **MySQL**: Versi `10.4.32`  
- **Bahasa Pemrograman**: PHP, JavaScript, HTML, CSS, TailwindCSS  
- **Framework UI**: TailwindCSS  
- **Library Frontend**: Font Awesome, AOS, Ajax, SweetAlert2
- **Framework Backend**: Tcpdf, PhpSpreadsheet, Composer
- **Database**: MariaDB 

---

## 🚀 Fitur Aplikasi

- **Login Multi Users**: Login dan register untuk setiap pengguna.  
- **Dashboard Pengguna**: Menampilkan tugas spesifik berdasarkan pengguna yang login.  
- **Manajemen Tugas**: Tambah, edit, hapus, dan tandai tugas sebagai selesai.  
- **Deadline dengan Input Date**: Input tanggal dengan antarmuka kalender.  
- **Prioritas Tugas**: Tugas dapat diberi prioritas (biasa, penting).  

---

## 📂 Struktur Database
Database `luxetask` memiliki tabel utama yaitu `users` dan `tasks`, dengan struktur sebagai berikut:

### Tabel `users`
| Field       | Tipe Data | Deskripsi                		 |
|-------------|------------|-------------------------------------|
| `user_id`   | INT        | Primary key               		 |
| `name`      | VARCHAR    | Nama pengguna             		 |
| `email`     | VARCHAR    | Email unik                	 	 |
| `password`  | VARCHAR    | Password terenkripsi      	 	 |
| `role`      | ENUM       | Role pengguna (`admin`, `pengguna`) |
| `created_at`| TIMESTAMP  | Waktu registrasi          		 |

### Tabel `tasks`
| Field        | Tipe Data | Deskripsi                                  |
|--------------|------------|-------------------------------------------|
| `task_id`    | INT        | Primary key               		|
| `user_id`    | INT        | Foreign key dari `users`  		|
| `task_name`  | VARCHAR    | Nama tugas                		|
| `deadline`   | VARCHAR    | Deadline tugas            		|
| `priority`   | ENUM       | Prioritas (`penting`, `biasa`, |
| `status`     | ENUM       | Status tugas (`selesai`, `tertunda`) 	|
| `created_at` | TIMESTAMP  | Waktu pembuatan tugas     		|
| `updated_at` | TIMESTAMP  | Waktu terakhir diupdate   		|

## 📦 Cara Install
1. Pastikan Anda telah menginstall **XAMPP** versi `8.2` atau yang lebih baru.  
2. Clone repository ini:  
   ```bash
   git clone https://github.com/SyhrlmyZID/ujikom.git
3. Pindahkan File project dengan nama ujikom-main ke folder htdocs.
4. Buat database dengan nama: luxetask di phpMyAdmin.
6. Pastikan sudah dipilih database nya dengan nama luxetask lalu klik import pada navbar phpMyAdmin.
7. Pilih file .sql, untuk file database nya bisa masuk ke project dengan nama ujikom-main lalu di dalam nya ada folder bernama database lalu pilih luxetask.sql, jika sudah dipilih langsung saja import.
