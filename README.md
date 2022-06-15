## Inventory Management System
Aplikasi Web ini saya bangun sebagai tugas akhir skripsi kuliah di Universitas Mulia Samarinda, menggunakan framework laravel.

![Imgur](https://imgur.com/B8mUH8u.png)

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
- Terdapat 2 role yaitu : super admin, admin, dan customer
- Mengelola Kategori (Role: Super Admin & Admin)
- Mengelola Supplier (Role: Super Admin & Admin)
- Mengelola Barang (Role: Super Admin & Admin)
- Mengelola User (Role: Super Admin & Admin)
- Mengelola Transaksi (Role: Super Admin & Admin)
- Mengelola Roles & Permission (Super Admin)
- Halaman Dashboard dengan berbagai fitur seperti : (Role: Super Admin & Admin) 
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
- Permintaan Barang (Role: all Role)
- Peminjaman Kendaraan (Role: all Role)
- Pengembalian Kendaraan (Role: all Role)
- Keranjang (Role: all Role)
- Mengubah Akun (Role: all Role)
- List Transaksi (Role: all Role)
- Search Data
- Responsive

## License
Aplikasi ini bersifat open source dapat digunakan oleh siapa pun dengan syarat tidak untuk di perjual belikan.
