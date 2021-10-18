# remed-pinjam-buku
Install projek dengan cara :
composer install
setting Database di env
sebelum migrate, masuk ke folder migrations. hapus file ini : file migrations kategori, buku, dan transaksi.
selanjutnya migrate dengan php artisan migrate
setelah itu, pulihkan file migration kategori, lalu migrate
pulihkan file migration buku, lalu migrate
pulihkan file migration transaksi, lalu migrate
jalanakan php artisan serve
