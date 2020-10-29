<p align="center">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQJ4okybreCGgCZN5FAfc2CZ7u9mkQugAoyBg&usqp=CAU" width="300">
</p>

<h1 align="center"> JTI Website</h1>

> Unofficial JTI Polinema Website.

## Getting Started

**Import MySql database**

Import database file `database/jti_website.sql` into PhpMyAdmin or your another mysql host

**Database connection setting**

1. Copy `config/constant.php.example` file and paste it into the same folder
2. Rename to `constant.php` <br> \*\* **never delete, rename or edit constant.php.example file**
3. Edit `constant.php`, make changes by your database connection!

Example:

```php
$dbUrl  = "localhost"; // MySql host Url
$dbUser = "root"; // Mysql user
$dbPass = ""; // Mysql password
$dbName = "jti_website"; // db name
```

Save & Done!

<hr>

## Folder Structure

- Module structure arranged by page and it's own user level
- Module folder only contain pages / UIs
- Every files, included to module/index.php
- Process arranged by database tables

```
jti-website/
├── css/
├── img/
├── js/
├── attachment/
│   ├── file/
│   └── img/
├── config/
│   ├── connection.php
|   ├── scripts.php
│   └── styles.php
├── database/
│   └── jti_website.sql
├── module/
|   ├── mahasiswa
|   |   ├── home.php
|   |   ├── setting.php
|   |   ├── kompen.php
|   |   ├── notifikasi.php
|   |   └── absen.php
|   ├── dosen/
|   |   ├── home.php
|   |   ├── notifikasi.php
|   |   └── setting.php
|   ├── admin/
|   |   ├── home.php
|   |   ├── notifikasi.php
|   |   ├── setting.php
|   |   ├── mahasiswa/
|   |   |   ├── tampilData.php
|   |   |   ├── tambah.php
|   |   |   └── update.php
|   |   ├── dosen/
|   |   |   ├── tampilData.php
|   |   |   ├── tambah.php
|   |   |   └── update.php
|   |   ├── kelas/
|   |   |   ├── tampilData.php
|   |   |   ├── tambah.php
|   |   |   └── update.php
|   |   ├── info/
|   |   |   ├── tampilData.php
|   |   |   ├── tambah.php
|   |   |   └── update.php
|   |   ├── jadwal/
|   |   |   ├── tampilData.php
|   |   |   ├── tambah.php
|   |   |   └── update.php
|   |   ├── chat/
|   |   |   ├── tampilData.php
|   |   |   ├── tambah.php
|   |   |   └── update.php
|   |   └── prodi/
|   |       ├── tampilData.php
|   |       ├── tambah.php
|   |       └── update.php
|   ├── index.php
|   └── login.php
├── process/
|   ├── login.php
|   ├── logout.php
|   ├── CRUD_mahasiswa.php
|   ├── CRUD_dosen.php
|   ├── CRUD_kelas.php
|   ├── CRUD_info.php
|   ├── CRUD_jadwal.php
|   ├── CRUD_chat.php
|   └── CRUD_prodi.php
└── index.php
```
