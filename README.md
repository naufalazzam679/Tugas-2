# Form Data Mahasiswa (PHP)

Project sederhana untuk menerima data mahasiswa melalui form HTML, menyimpannya sementara dalam array PHP, lalu menampilkan hasilnya pada tabel.

## Fitur
- Form input nama, NIM, jurusan, dan email.
- Validasi kolom wajib diisi.
- Validasi format email.
- Menampilkan data yang dikirim dalam tabel.
- Menggunakan `htmlspecialchars()` untuk mengamankan output HTML.

## Struktur Folder
```
Tugas-2/
├── README.md
└── form-mahasiswa/
    └── index.php
```

## Persyaratan
- PHP 8.0 atau lebih baru (disarankan PHP 8+).
- Browser web.

## Cara Menjalankan
1. Clone atau unduh repository ini.
2. Buka terminal di folder utama repository.
3. Jalankan server PHP bawaan:

   ```bash
   php -S localhost:8000
   ```

4. Buka alamat berikut di browser: http://localhost:8000/form-mahasiswa/

> Pastikan PHP sudah terpasang dan perintah `php` tersedia di terminal.

## Catatan
Data disimpan dalam array selama satu kali request saja. Data tidak disimpan permanen dan akan hilang ketika halaman dimuat ulang atau request baru dilakukan. Untuk penyimpanan permanen, project ini perlu dikembangkan dengan database atau penyimpanan file.
