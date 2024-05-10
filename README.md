# Authentication

Salah satu alasan Taylor Otwell mengembangkan Laravel karena pada saat itu framework
Code Igniter tidak memiliki fitur authentication bawaan. Authentication adalah sebutan untuk
proses registrasi user, termasuk mekanisme login dan logout. Hampir semua project skala
menengah ke atas butuh sistem seperti ini.
Oleh sebab itulah Laravel menyediakan fitur authentication bawaan yang sangat powerfull
namun juga sedikit rumit karena banyaknya hal 'magic' di Laravel. Maksudnya, untuk bisa
memodifikasi proses authentication, kita harus pelajari semua mekanisme yang dipakai
Laravel.


#  Instalasi Laravel Authentication

composer require laravel/ui
php artisan ui bootstrap --auth
npm install
npm install laravel-mix --save-dev

lakukan migration tp sebelum nya buat database nya dulu
