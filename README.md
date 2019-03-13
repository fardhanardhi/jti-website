# Website JTI Polinema

## Susunan File
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
│   └── const.php
├── view/
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
├── router/
|   ├── mahasiswaRouter.php
|   ├── dosenRouter.php
|   └── adminRouter.php
└── index.php
```

- Susunan view berdasarkan halaman sesuai user level
- Susunan router berdasarkan halaman sesuai user level
- Susunan process berdasarkan tabel pada database