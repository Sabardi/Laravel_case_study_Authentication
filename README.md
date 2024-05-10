# Belajar  Policy
Dalam bahasa inggris, "policy" berarti "kebijakan". Istilah ini umum dijumpai dalam dunia
ekonomi atau pemerintah. Misalnya sebuah perusahaan membuat kebijakan agar karyawan
harus datang jam 8:00 pagi dan baru boleh pulang jam 4 sore. Atau pemerintah mengeluarkan
kebijakan tentang batas atas dan batas bawah harga tiket pesawat. 


# Pengertian Laravel Policy
Di dalam Laravel, Policy dipakai untuk membatasi hak akses user terdapat sebuah model.
Lebih spesifik lagi, model yang dimaksud adalah salah satu dari Restfull method yang tersedia
dari sebuah aplikasi CRUD.
Dengan policy, kita bisa membatasi hanya user dengan nama "admin" saja yang boleh
menginput data ke tabel jurusan. Atau user "rissa" tidak bisa menghapus, tetapi diizinkan
untuk melihat dan mengedit data jurusan. Inilah kebijakan bisa diatur dengan Laravel Policy.
Sekilas policy mirip seperti middleware. Policy bisa disebut sebagai bentuk yang lebih khusus
dari middleware

# Membuat Policy
Policy pada dasarnya berbentuk sebuah class yang disimpan dalam file khusus (mirip seperti
file controller, file model, file middleware, dll). Untuk membuat policy, tersedia perintah php
artisan dengan format berikut:
php artisan make:policy <NamaPolicy>
Karena policy akan dipakai untuk membatasi akses ke suatu model, bisa ditambah option -m
dengan format sebagai berikut:
php artisan make:policy <NamaPolicy> -m NamaModel


Class JurusanPolicy butuh mengimport 2 buah class model, yakni User model (berisi data
user yang sedang login), serta Jurusan model (tabel yang aksesnya ingin kita batasi). Selain itu
juga perlu mengimport class Illuminate\Auth\Access\HandlesAuthorization yang berfungsi
sebagai class dasar untuk operasional policy.

Terdapat 7 method di dalam JurusanPolicy yang nantinya mengembalikan nilai true atau false
tergantung batasan yang ingin kita buat. Semua method memiliki pasangan dengan method
RESTfull di Controller:

![alt text](image.png)

Cara bacanya adalah, jika kita ingin membatasi user agar tidak bisa melihat satu data tabel
yang di proses oleh method show() di controller, maka kode programnya di tulis dalam
method view() di Policy.
Atau jika kita ingin membatasi agar user tidak bisa menghapus data tabel (yang di proses oleh
method destroy() di controller), maka kode programnya harus ditulis dalam method delete()
di Policy. 


#  Membatasi Proses Create
membatasi proses input data jurusan. Di dalam
JurusanController, proses input ini ditangani oleh method store(). Dengan melihat daftar
tabel sebelumnya, method store() berpasangan dengan method create() di JurusanPolicy. 

        return $user->email === 'admin@gmail.com';


Kita sudah singgung sedikit bahwa setiap method di dalam Policy harus mengembalikan nilai
true atau false. Jika hasilnya true, maka proses bisa dijalankan. Jika hasilnya false, proses
tersebut akan ditolak.
Dalam contoh ini saya ingin memeriksa apakah email dari user yang sedang login sama dengan
'admin@gmail.com' atau tidak. Jika sama (true), maka proses input data jurusan bisa dilakukan.
Informasi mengenai alamat email dari user yang sedang login bisa diakses dari $user->email,
dimana variabel $user berasal dari penulisan argument method create() di baris 5.
Syarat berikutnya, kita harus tambahkan perintah khusus ke dalam method store() di
JurusanController:
