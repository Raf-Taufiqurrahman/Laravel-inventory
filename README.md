## Inventory Management System
Aplikasi Web ini saya bangun sebagai tugas akhir skripsi kuliah di Universitas Mulia Samarinda, menggunakan framework laravel. <br><br>
Latar belakang pembuatan aplikasi ini adalah pada tempat penelitian saya, untuk melakukan sebuah transaksi permintaan, peminjaman dan juga pengambilan barang harus melakukan pengecekan barang di gudang terlebih dahulu yang dimana gudang terletak pada lantai 2 sedangkan customer mayoritas berada pada lantai 1 dan juga barang yang digudang tidak di data secara mendetail oleh pengelola gudang tersebut, sehingga untuk melakukan transaksi bisa memakan waktu yang cukup lama, oleh karena itu saya mencoba untuk membangung sebuah aplikasi yang diharapkan mampu mempercepat dan mempermudah transaski dan juga pengelolaan barang.

![Imgur](https://imgur.com/mVyzQ6V.png)

## Cara Instalasi Project

Pastikan git cli sudah terinstall, kemudian jalankan perintah dibawah
```
1. clone repository
2. copy .env.example rename menjadi .env kemudian atur database di .env
3. composer install
4. php artisan key:generate
5. php artisan migrate --seed
```

## Akun Super Admin
```
email : rafi@gmail.com
password : password
```

## Fitur Aplikasi 
- Terdapat 3 role yaitu : super admin, admin, dan customer
- Mengelola Kategori (Super Admin & Admin)
- Mengelola Supplier (Super Admin & Admin)
- Mengelola Barang (Super Admin & Admin)
- Mengelola User (Super Admin & Admin)
- Mengelola Transaksi (Super Admin & Admin)
- Mengelola Roles & Permission (Super Admin)
- Halaman Dashboard dengan berbagai fitur seperti : (Super Admin & Admin) 
   - Barang paling populer
   - Notifikasi permintaan barang yang belum di verifikasi
   - List barang dengan stok kurang dari 10
   - Jumlah Kategori
   - Jumlah Supplier
   - Jumlah Barang
   - Jumlah Kendaraan
   - Jumlah Customer
   - Jumlah Permintaan Barang
   - Jumlah Barang Keluar
   - Jumlah Barang Keluar Bulan Ini
- Permintaan Barang (All Role)
- Peminjaman Kendaraan (All Role)
- Pengembalian Kendaraan (All Role)
- Keranjang (All Role)
- Mengubah Akun (All Role)
- List Transaksi (All Role)
- Search Data
- Responsive

## License
Aplikasi ini bersifat open source dapat digunakan oleh siapa pun dengan syarat tidak untuk di perjual belikan.
