<h1>Beta Testing</h1>

Aplikasi Open Source versi 1 perpustakaan (Beta Testing)

Framework: Laravel

Full Stack Framework: Livewire

<h3>Penginstalaan</h3>

<ul>
    <li>Clone Project</li>
    <li>Buat database bernama perpustakaan, lalu execute perpustakaan.sql</li>
    <li>Composer Install</li>
    <li>Linux: cp .env.example .env | windows: copy .env.example .env </li>
    <li>php artisan key:generate</li>
    <li>Tidak perlu php artisan serve</li>
    <li>akses langsung http://localhost/perpus-eks</li>
</ul>

Alur Program

<h3>Modul pertama Buku</h3>
<hr>
<ul>
    <li>Tambahkan Buku</li>
    <li>Lihat Daftar Buku (Jika terjadi kesalahan penginputan, klik edit. Untuk menghapus data, klik delete)</li>
    <li>Tambahkan QTY buku</li>
    <li>Jika ingin buka semua laporan, klik laporan</li>
</ul>

<h3>Modul kedua Pengunjung</h3>
<hr>
<ul>
    <li>Tambahkan Pengunjung</li>
    <li>Setelah tertambah, lihat daftar pengunjung, (Jika terjadi kesalahan penginputan, klik edit. Untuk menghapus, klik delete)</li>
</ul>

<h3>Modul ketiga Peminjaman</h3>
<hr>
<p><b>Peringatan:</b></p>
<p>Jika pengunjung dan buku sudah ada data, Maka bisa melakukan transaksi peminjaman</p>
    <ul>
        <li>Transaksi peminjaman</li>
        <li>Jika sudah melakukan transaksi, maka akan masuk pada pending peminjaman (Untuk Approve)</li>
        <li>Laporan Peminjaman mencatat semua transaksi</li>
    </ul>
    
<h3>Modul keempat Pengembalian</h3>
<hr>
 <ul>
   <li>Transaksi Pengembalian bisa dilakukan jika sudah ada peminjaman, dan status approve</li>
   <li>Laporan mencatat semua transaksi pengembalian</li>
 </ul>
    
<h3>Modul Kelima Denda</h3>
<hr>
    <ul>
        <li>Lakukan transaksi pengembalian, jika terdapat pengembalian buku yang melanggar aturan, maka data akan muncul pada denda</li>
    </ul>


<h3 style="text-center">Kunjungi</h3>

<p style="text-center">www.coderpartai.com</h3>
