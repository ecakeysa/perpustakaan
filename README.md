# 📚 Sistem Informasi Perpustakaan (Digital Library)

Selamat datang di repository **Perpustakaan**. Aplikasi ini dirancang untuk memudahkan manajemen peminjaman buku, pengelolaan kategori, data petugas, serta pembuatan laporan secara digital.

---

## 🚀 Fitur Utama
* **Autentikasi:** Login dan Register (Petugas/Peminjam).
* **Manajemen Buku:** CRUD data buku lengkap dengan cetak laporan PDF.
* **Kategori:** Pengelompokan buku berdasarkan kategori.
* **Peminjaman:** Proses pinjam, pengembalian, dan riwayat koleksi pribadi.
* **Ulasan:** Memberikan ulasan dan rating pada buku.
* **Laporan:** Fitur generate laporan untuk admin/petugas.

---

## 📸 Tampilan Aplikasi
Berikut adalah beberapa tampilan dari aplikasi Perpustakaan:

| Dashboard & Login | Manajemen Buku |
|---|---|
| <img src="https://github.com/user-attachments/assets/260a0bd2-d183-4e3a-81c5-34a4e4edc75e" width="400"> | <img src="https://github.com/user-attachments/assets/7222e29f-f7a4-4778-91f5-746fd10b8a20" width="400"> |

| Data Kategori | Laporan & Cetak |
|---|---|
| <img src="https://github.com/user-attachments/assets/50ebf337-e33b-4159-9a8c-17ff2648391f" width="400"> | <img src="https://github.com/user-attachments/assets/e8bc9916-b905-4f66-9155-47f8e0ee744f" width="400"> |

### Galeri Lainnya
<details>
  <summary>Klik untuk melihat lebih banyak screenshot</summary>
  <br>
  <img src="https://github.com/user-attachments/assets/c095e99c-aebf-4451-a90b-df3b6e21dc0d" width="100%">
  <img src="https://github.com/user-attachments/assets/6a7a9388-2b30-44ae-bd07-423e219f5e86" width="100%">
  <img src="https://github.com/user-attachments/assets/35210c0e-691c-4346-8627-d63af1c3cdea" width="100%">
  <img src="https://github.com/user-attachments/assets/d86c805c-2901-404f-86d2-a05dbd5f5f84" width="100%">
  <img src="https://github.com/user-attachments/assets/0405f85a-e679-4f56-89ff-376a49d436e5" width="100%">
  <img src="https://github.com/user-attachments/assets/1f9f6b45-37d8-4b3d-add8-8fa723dfd63f" width="100%">
</details>

---

## 🛠️ Daftar Route (API/Web endpoints)

Berikut adalah daftar endpoint yang tersedia di dalam aplikasi ini:

| Method | URI | Name | Controller Action |
|:---|:---|:---|:---|
| **GET** | `/` | - | - |
| **GET** | `login` | `login` | `AuthController@showLogin` |
| **POST** | `login` | - | `AuthController@login` |
| **POST** | `logout` | `logout` | `AuthController@logout` |
| **GET** | `register` | `register` | `AuthController@showRegister` |
| **POST** | `register` | - | `AuthController@register` |
| **GET** | `dashboard` | `dashboard` | `AuthController@index` |
| **GET** | `buku` | `buku.index` | `BukuController@index` |
| **POST** | `buku` | `buku.store` | `BukuController@store` |
| **GET** | `buku/create` | `buku.create` | `BukuController@create` |
| **GET** | `buku/{buku}/edit` | `buku.edit` | `BukuController@edit` |
| **PUT** | `buku/{buku}` | `buku.update` | `BukuController@update` |
| **DELETE** | `buku/{buku}` | `buku.destroy` | `BukuController@destroy` |
| **GET** | `laporan/cetak` | `buku.cetak` | `BukuController@cetak_pdf` |
| **GET** | `peminjaman` | `peminjaman.index` | `PeminjamanController@index` |
| **POST** | `pinjam-buku/{id}` | `peminjam.store` | `PeminjamanController@store` |
| **PUT** | `peminjaman/{id}/kembali`| `peminjaman.kembali` | `PeminjamanController@kembalikan` |
| **GET** | `pinjaman-saya` | `peminjam.pinjaman` | `PeminjamanController@pinjamanSaya` |
| **GET** | `ulasan` | `ulasan.index` | `UlasanBukuController@index` |
| **POST** | `ulasan/store` | `ulasan.store` | `UlasanBukuController@store` |

*(Dan 20+ route lainnya untuk Petugas, Kategori, dan Koleksi)*

---

## 💻 Instalasi

1. Clone repository:
   ```bash
   git clone [https://github.com/ecakeysa/perpustakaan.git](https://github.com/ecakeysa/perpustakaan.git)
