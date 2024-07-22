<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 5.0.4
 */

/**
 * Database `masjidalirsyad2`
 */

/* `masjidalirsyad2`.`admin` */
$admin = array(
  array('id' => '1','username' => 'rommy ivandika haris','password' => 'hashed_password','nama' => 'Admin Masjid','email' => 'ivanris146@gmail.com','no_telp' => '081383737320')
);

/* `masjidalirsyad2`.`agenda` */
$agenda = array(
  array('id' => '2','agenda' => 'Kajian Bulughul Maram','tanggal' => '2024-07-26','jam_mulai' => '13:55:00','jam_selesai' => '16:00:00','keterangan' => 'Mohon bawa buku catatan'),
  array('id' => '3','agenda' => 'Majelis Talim Ibu-Ibu','tanggal' => '2024-07-30','jam_mulai' => '04:30:00','jam_selesai' => '05:30:00','keterangan' => 'Jamaah tetap shalat subuh setiap hari Minggu'),
  array('id' => '4','agenda' => 'Tahsin Al-Quran','tanggal' => '2024-07-27','jam_mulai' => '19:00:00','jam_selesai' => '21:00:00','keterangan' => 'Pengajian rutin setiap Rabu')
);

/* `masjidalirsyad2`.`infaq` */
$infaq = array(
  array('id' => '2','nama' => 'Budi','tanggal' => '2024-07-16','jumlah' => '300000.00','keterangan' => 'QURBAN','bukti_pembayaran' => NULL,'foto_bukti_pembayaran' => NULL),
  array('id' => '5','nama' => 'Fathimah','tanggal' => '2024-07-19','jumlah' => '100000.00','keterangan' => 'INFAQ','bukti_pembayaran' => NULL,'foto_bukti_pembayaran' => NULL)
);

/* `masjidalirsyad2`.`inventaris` */
$inventaris = array(
  array('id_inventaris' => '2','tgl_pendataan' => '2024-07-19','nama_barang' => 'Sound System','satuan' => '2','keterangan' => 'Untuk penggunaan acara besar','status' => 'tersedia'),
  array('id_inventaris' => '3','tgl_pendataan' => '2024-07-20','nama_barang' => 'Al-Qur\'an Terjemah','satuan' => '10','keterangan' => 'Digunakan dalam pengajian','status' => 'tersedia'),
  array('id_inventaris' => '5','tgl_pendataan' => '2024-07-25','nama_barang' => 'mic','satuan' => '1','keterangan' => 'beli di toko ahsui','status' => 'tersedia')
);

/* `masjidalirsyad2`.`jamaah` */
$jamaah = array(
  array('id_jamaah' => '1','nama_jamaah' => 'Dahniar','alamat' => 'Jl. APK Dalam No. 4','no_telp' => '081234567890'),
  array('id_jamaah' => '2','nama_jamaah' => 'Edwati','alamat' => 'Jl. KH Sulamaiman No. 7','no_telp' => '081298765432'),
  array('id_jamaah' => '3','nama_jamaah' => 'Maiyulis','alamat' => 'Jl. APK No. 1A','no_telp' => '081276543210'),
  array('id_jamaah' => '4','nama_jamaah' => 'erwadi','alamat' => 'parakgasang','no_telp' => '082333011119'),
  array('id_jamaah' => '5','nama_jamaah' => 'Mawardi','alamat' => 'alai','no_telp' => '08111292910'),
  array('id_jamaah' => '6','nama_jamaah' => 'taufan','alamat' => 'pisang','no_telp' => '082822222233'),
  array('id_jamaah' => '7','nama_jamaah' => 'chandra yudasswara','alamat' => 'bandung','no_telp' => '082211085000')
);

/* `masjidalirsyad2`.`kegiatan` */
$kegiatan = array(
  array('id' => '1','nama_kegiatan' => 'Ceramah Jumat','tanggal' => '2024-07-19','jam_mulai' => '13:00:00','jam_selesai' => '14:30:00','keterangan' => 'Dengan Ustadz Ahmad'),
  array('id' => '2','nama_kegiatan' => 'Pengajian Rutin','tanggal' => '2024-07-20','jam_mulai' => '19:00:00','jam_selesai' => '21:00:00','keterangan' => 'Tema: Tafsir Surah Yasin'),
  array('id' => '3','nama_kegiatan' => 'Bakti Sosial','tanggal' => '2024-07-22','jam_mulai' => '08:00:00','jam_selesai' => '12:00:00','keterangan' => 'Bantu Warga Terdampak Banjir')
);

/* `masjidalirsyad2`.`keuangan` */
$keuangan = array(
  array('id' => '1','tanggal' => '2024-07-18','uang_masuk' => '1000000.00','uang_keluar' => '0.00','sisa_saldo' => '0.0'),
  array('id' => '2','tanggal' => '2024-07-20','uang_masuk' => '0.00','uang_keluar' => '500000.00','sisa_saldo' => '0.0'),
  array('id' => '3','tanggal' => '2024-07-09','uang_masuk' => '320000.00','uang_keluar' => '21000.00','sisa_saldo' => '0.0'),
  array('id' => '4','tanggal' => '2024-07-25','uang_masuk' => '34000.00','uang_keluar' => '0.00','sisa_saldo' => '0.0')
);

/* `masjidalirsyad2`.`kritik_saran` */
$kritik_saran = array(
  array('id' => '1','nama' => 'John Doe','email' => 'johndoe@example.com','nomor_hp' => '08123456789','pesan' => 'Pelayanan sangat baik, tetapi tolong perbaiki waktu respons terhadap keluhan.','waktu_submit' => '2024-07-17 14:58:31'),
  array('id' => '2','nama' => 'Jane Smith','email' => 'janesmith@example.com','nomor_hp' => '08567891234','pesan' => 'Saya merasa ada beberapa area yang perlu diperbaiki dalam fasilitas Anda. Semoga bisa segera ditangani.','waktu_submit' => '2024-07-17 14:58:31'),
  array('id' => '3','nama' => 'Michael Brown','email' => 'michaelbrown@example.com','nomor_hp' => '08765432100','pesan' => 'Saran saya adalah untuk meningkatkan kualitas acara yang diselenggarakan. Terima kasih.','waktu_submit' => '2024-07-17 14:58:31'),
  array('id' => '4','nama' => 'Emily Davis','email' => 'emilydavis@example.com','nomor_hp' => '08987654321','pesan' => 'Sangat menghargai inisiatif Anda dalam memperbaiki layanan kepada jamaah.','waktu_submit' => '2024-07-17 14:58:31'),
  array('id' => '5','nama' => 'David Wilson','email' => 'davidwilson@example.com','nomor_hp' => '08234567890','pesan' => 'Tingkatkan komunikasi terbuka dengan pengurus untuk menjaga transparansi di masjid kami.','waktu_submit' => '2024-07-17 14:58:31'),
  array('id' => '6','nama' => 'ahmad dhani','email' => 'samue@gmail.com','nomor_hp' => '08111112882','pesan' => 'bersihkan kamar
','waktu_submit' => '2024-07-18 15:55:41'),
  array('id' => '7','nama' => 'karfindo','email' => 'ivanris146@gmail.com','nomor_hp' => '082222110808','pesan' => 'mohon untuk sajadah dibersihkan dan perbaiki penerangan lampu','waktu_submit' => '2024-07-18 16:12:37'),
  array('id' => '8','nama' => 'khoirul','email' => 'ivansammm@com','nomor_hp' => '071100101229','pesan' => 'mantap pengurus masjidnya','waktu_submit' => '2024-07-18 19:40:28'),
  array('id' => '9','nama' => 'azura','email' => 'ivanris146@gmail.com','nomor_hp' => '081383737320','pesan' => 'mohon perbaiki micnya agak kurang','waktu_submit' => '2024-07-18 20:09:50'),
  array('id' => '10','nama' => 'juned','email' => 'sandysisk@gmail.com','nomor_hp' => '072222117117','pesan' => 'mohon lampu ganti terlalu terang ','waktu_submit' => '2024-07-18 20:11:52'),
  array('id' => '11','nama' => 'khoirul','email' => 'ivanriss@aman.com','nomor_hp' => '08112222221','pesan' => 'masukkan air','waktu_submit' => '2024-07-18 20:12:48'),
  array('id' => '12','nama' => 'khoirul','email' => 'ivanriss@aman.com','nomor_hp' => '08112222221','pesan' => 'masukkan air','waktu_submit' => '2024-07-18 20:13:41'),
  array('id' => '14','nama' => 'khoirul','email' => 'ivanriss@aman.com','nomor_hp' => '08112222221','pesan' => 'masukkan air','waktu_submit' => '2024-07-18 20:15:47'),
  array('id' => '15','nama' => 'khoirul','email' => 'ivanriss@aman.com','nomor_hp' => '08112222221','pesan' => 'masukkan air','waktu_submit' => '2024-07-18 20:17:13'),
  array('id' => '16','nama' => 'khoirul','email' => 'ivanriss@aman.com','nomor_hp' => '08112222221','pesan' => 'masukkan air','waktu_submit' => '2024-07-18 20:17:50'),
  array('id' => '17','nama' => 'azura','email' => 'sandysisk@gmail.com','nomor_hp' => '072222117117','pesan' => 'mantap','waktu_submit' => '2024-07-18 20:28:04'),
  array('id' => '18','nama' => 'azura','email' => 'sandysisk@gmail.com','nomor_hp' => '072222117117','pesan' => 'mantap','waktu_submit' => '2024-07-18 20:28:09'),
  array('id' => '19','nama' => 'rapindo','email' => 'ivansammm@com','nomor_hp' => '071100101229','pesan' => 'anka','waktu_submit' => '2024-07-18 23:33:21')
);

/* `masjidalirsyad2`.`penceramah` */
$penceramah = array(
  array('id' => '2','nama_penceramah' => 'Saiful efendi','alamat' => 'lubuk buaya','no_telp' => '081364075349'),
  array('id' => '3','nama_penceramah' => 'Rahmad','alamat' => 'belimbing kuranji','no_telp' => '081374003366'),
  array('id' => '4','nama_penceramah' => 'DR.H.IZHARMAN','alamat' => 'SIITEBA','no_telp' => '082233101010'),
  array('id' => '5','nama_penceramah' => 'Johardi','alamat' => NULL,'no_telp' => NULL)
);

/* `masjidalirsyad2`.`pengurus_masjid` */
$pengurus_masjid = array(
  array('id_pengurus' => '1','nama_pengurus' => 'DR.H.Abdullah Wali Nasution','jabatan' => 'Ketua Pengurus','alamat' => 'Pasaman Barat','no_telp' => '0811662597'),
  array('id_pengurus' => '2','nama_pengurus' => 'Johardi Dt.Bandaro Putiah','jabatan' => 'Pembina','alamat' => 'Pesisir Selatan','no_telp' => '0811266721675'),
  array('id_pengurus' => '3','nama_pengurus' => 'Imam Soleh Nasution','jabatan' => 'Imam Tetap','alamat' => 'Mandailing Natal','no_telp' => '082318347528')
);
