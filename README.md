
# 📦 Warehouse Management System — Master-Slave Replication

**Judul Proyek:** Sinkronisasi Server dengan Metode Master-Slave pada Aplikasi Gudang  
**Mata Kuliah:** Sistem Terdistribusi  
**Universitas Pelita Bangsa — 2025**

---

## 📌 Deskripsi

Aplikasi **Warehouse Management System (WMS)** dikembangkan untuk mendukung operasional gudang dengan sistem database **MySQL Master-Slave**.  
Tujuan:
- Menjamin *High Availability*
- Menjaga konsistensi data real-time
- Redundansi & skalabilitas

---

## ⚙️ Topologi Sistem

- **Master DB:** Port `3307`
- **Slave 1:** Port `3309`
- **Slave 2:** Port `3308`
- **Slave 3:** Port `3310`

Semua node **tersinkronisasi** dan **berjalan stabil**.

---

## 🚀 Fitur Aplikasi

- CRUD Data Barang
- Pencatatan Barang Masuk & Keluar
- Laporan Stok Barang Real-time
- Backend: Laravel
- Frontend: Bootstrap

---

## ✅ Status Implementasi

- Replikasi 1 Master + 3 Slave **berfungsi normal**
- Multi-koneksi Laravel aktif
- Sinkronisasi data otomatis
- Tidak ada kendala teknis

---

## 👨‍💻 Tim Pengembang

- M Ilham Firdaus — 312310021
- Ismu Nurkhasanah — 312310042
- Indra Maha Resi — 312310044
- Alisya Katsulya S — 312310046

---

## 📚 Referensi

- [Laravel Docs](https://laravel.com/docs/10.x/database)
- [Bootstrap v5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)
- [MySQL 8.0 Replication](https://dev.mysql.com/doc/refman/8.0/en/replication.html)
- [Musaamin.web.id — Replikasi MariaDB](https://musaamin.web.id/cara-replikasi-database-master-slave-mariadb-10-di-ubuntu-16-04/)
- TechTarget — Master-Slave Replication

---

# 📖 Tutorial — Setup Master-Slave & Laravel Multi-DB

---

## 1️⃣ Persiapan

- Install MySQL/MariaDB di semua node
- Pastikan semua server satu jaringan LAN
- Buka port MySQL atau matikan firewall jika perlu

---

## 2️⃣ Konfigurasi Master

**Edit `my.ini`**

```ini
[mysqld]
server-id=1
log-bin=mysql-bin
bind-address=0.0.0.0
```

**Buat user replikasi**

```sql
CREATE USER 'repl'@'%' IDENTIFIED BY 'password';
GRANT REPLICATION SLAVE ON *.* TO 'repl'@'%';
FLUSH PRIVILEGES;
```

**Cek status master**

```sql
SHOW MASTER STATUS;
```

Catat *File* dan *Position*.

---

## 3️⃣ Konfigurasi Slave

**Edit `my.ini`**

```ini
[mysqld]
server-id=2   # Ganti sesuai Slave
relay-log=relay-log
```

**Hubungkan ke Master**

```sql
CHANGE MASTER TO
  MASTER_HOST='IP_MASTER',
  MASTER_USER='repl',
  MASTER_PASSWORD='password',
  MASTER_LOG_FILE='mysql-bin.000001',
  MASTER_LOG_POS=xxx;

START SLAVE;
```

**Cek status slave**

```sql
SHOW SLAVE STATUS\G
```

Pastikan `Slave_IO_Running` dan `Slave_SQL_Running` bernilai `Yes`.

---

## 4️⃣ Multi-DB di Laravel

**Tambahkan di `.env`**

```env
# Master DB
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=master_db
DB_USERNAME=root
DB_PASSWORD=

# Slave 1 DB
DB_SLAVE1_HOST=127.0.0.1
DB_SLAVE1_PORT=3309
DB_SLAVE1_DATABASE=slave1_db
DB_SLAVE1_USERNAME=root
DB_SLAVE1_PASSWORD=
```

**Tambahkan di `config/database.php`**

```php
'mysql_slave1' => [
    'driver' => 'mysql',
    'host' => env('DB_SLAVE1_HOST'),
    'port' => env('DB_SLAVE1_PORT'),
    'database' => env('DB_SLAVE1_DATABASE'),
    'username' => env('DB_SLAVE1_USERNAME'),
    'password' => env('DB_SLAVE1_PASSWORD'),
    ...
],
```

**Gunakan di kode**

```php
DB::connection('mysql_slave1')->select(...);
```

---

## ✅ Tips

- Restart service MySQL/MariaDB setiap ubah konfigurasi.
- Gunakan `SHOW MASTER STATUS` & `SHOW SLAVE STATUS` untuk monitoring.
- Pakai `bind-address=0.0.0.0` agar bisa diakses via LAN.

---

## 🚀 Pengembangan Lanjut

- Tambahkan mekanisme failover otomatis
- Optimasi query: *read* ke Slave, *write* ke Master
- Integrasi monitoring & alerting

---

**© 2025 Fakultas Teknik — Universitas Pelita Bangsa**
