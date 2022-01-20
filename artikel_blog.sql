-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2021 pada 18.11
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artikel_blog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `artikel_id` int(5) NOT NULL,
  `artikel_judul` varchar(100) NOT NULL,
  `artikel_isi` varchar(2000) NOT NULL,
  `artikel_tanggal` date NOT NULL,
  `artikel_views` int(4) NOT NULL,
  `artikel_gambar` varchar(255) NOT NULL,
  `kategori_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`artikel_id`, `artikel_judul`, `artikel_isi`, `artikel_tanggal`, `artikel_views`, `artikel_gambar`, `kategori_id`) VALUES
(60, 'Manfaat Putri Malu Untuk Kesehatan: Mengatasi Insomnnia, Rematik, Hingga Cacingan', '<p>Manfaat Putri Malu Untuk Kesehatan: Mengatasi Insomnnia, Rematik, Hingga Cacingan – Putri malu sering kita jumpai di pekarang rumah, pesawahan dan ladang. Tanaman ini tumbuh tidur di tanah, kadang-kadang tegak. Memiliki batang yang bulat, berbulu dan berduri. Daunnya kecil-kecil tersusun secara majemuk bentuknya lonjong dengan ujung yang lancip, warnanya hijau (ada yang warna kemerahmerahan).</p><p>Uniknya daun putri malu apabila kita sentuh akan segera menutup dengan teratur dengan demikian disebut sebagai tanaman yang sensitif (sensitif plan). Karena sifatnya itulah disebut sebagai tanaman putri malu. Bunganya berbentuk bulat seperti bola dengan warna merah muda. Walaupun tanamannya kecil putri malu mempunyai nama daerah yang berbeda-beda diantaranya adalah si kejut, rebah bangun, akan kaget, Han xiu cao (Cina). Putri malu dapat dimanfaatkan dalam mengobati beberapa penyakit diantaranya adalah susah tidur (insomnia), bronkitis, panas tinggi, herpes, rematik, dan cacingan.</p><p><b>Bagaimana pemakaian tanaman obat Ini?</b></p><p>Untuk penyakit luar seperti, luka, radang kulit benanah dan herpes, putri malu dapat digunakan dengan cara tanaman yang segar dilumatkan terlebih dahulu kemudian di tempelkan pada bagian tubuh yang sakit. Sedangkan untuk penyakit dalam, putri malu dapat digunakan dengan cara diminum. Contohnya apabila ada yang menderita penyakit susah tidur (insomnia), daun putri malu sebanyak 30-60 gram direbus dan diminum setiap hari.</p><p><b>Apakah rahasia di balik manfaat dan khasiat tanaman putri malu?</b></p><p>Tanaman ini memiliki rasa manis dan agak dingin dan dapat berperan sebagai penenang (tranquiliser), peluruh dahak (expectorant), anti batuk (anlitusive), penurun panas (antipirelic), anti radang (anti-inilammatory), peluruh air seni (diuretic). Kandungan kimia yang terkandung didalamnya adalah senyawa mimosine. Bagian tumbuhan putri malu yang digunakan sebagai obat adalah daun, akar, seluruh tanaman, baik yang masih seger atau yang telah di', '2021-12-22', 0, '61c35aee3f7ce.png', 14),
(61, 'Cara Menanam Bunga Anggrek Praktis Pakai Pot', '<p>Anggrek merupakan salah satu jenis tanaman bunga paling populer di negara tropis termasuk Indonesia. Saking populernya, anggrek dianggap sebagai tanaman yang tak lekang oleh tren. Kapan pun di musim tanaman apa pun, anggrek selalu ramai peminatnya. Apalagi anggrek memiliki banyak jenis, warna dan bentuk, bahkan pada jenis tertentu bunganya bisa bertahan hingga berbulan-bulan.</p><p>Sayangnya, cara menanam bunga anggrek bisa dibilang susah-susah gampang. Hal ini karena media tanam anggrek nggak seperti tanaman pada umumnya yang bisa tumbuh di tanah. Anggrek biasanya tumbuh dengan media arang, sabut kelapa, pakis kering dan menempel di pohon. Buat kamu yang ingin mencoba menanam anggrek sendiri, berikut  cara menanam bunga anggrek yang mudah dan bisa kamu coba sendiri, yuk simak!</p><ul><li>Menanam anggrek di dalam pot dengan media arang. Siapkan juga serpihan batu bata dan genting sebagai media tambahan</li><li>Menanam bunga anggrek menggunakan media sabut kelapa, bisa digantung ataupun ditaruh di dalam pot</li><li>Menanam anggrik dengan media papan pakis. Jika kamu ingin meletakkan anggrek dengan cara digantung pada dinding</li></ul>', '2021-12-22', 0, '61c35ae0554a5.png', 16),
(62, 'Cara Merawat Janda Bolong Biar Subur dan Nggak Menguning. Simpel!', '<p>Beberapa waktu belakangan, demam tanaman hias melanda masyarakat Tanah Air. Mereka saling berburu tanaman hias untuk mengisi waktu di rumah selama pandemi Covid-19. Salah satu tanaman hias yang paling banyak diburu adalah ‘janda bolong’ atau memiliki nama ilmiah ‘monstera’. Saking banyaknya orang yang memburu tanaman cantik satu ini, harganya pun kemudian melambung tinggi hingga jutaan rupiah.</p><p>Namun, semakin lama hobi untuk menanam tanaman hias ini bergeser dengan hobi lainnya yang membuat tanaman hias menjadi tidak terawat. Padahal, manfaat tanaman, seperti janda bolong ini sangat banyak, di antaranya bisa memperbaiki kualitas udara hingga bisa menyegarkan mata. Untuk itu, supaya tanaman janda bolong milikmu tetap tumbuh subur dan tidak layu, kamu perlu memperhatikan enam cara merawat tanaman janda bolong yang sudah Hipwee rangkum berikut ini.</p><p><b>1. Perhatikan media tanam janda bolong, kamu bisa memilih menggunakan tanah gambut atau air</b></p><p>Media tanam janda bolong perlu diperhatikan supaya kelembapannya terjaga. Ada beberapa pilihan media tanam yang bisa kamu gunakan, yaitu tanah gambut ataupun air. Jika kamu ingin menggunakan tanah gambut, kamu bisa menambahkannya dengan pupuk dengan perbandingan 1:1. Sebaliknya, cara merawat janda bolong media air adalah dengan rutin mengganti air secara rutin seminggu sekali. Pastikan akar tanaman janda bolong benar-benar terendam untuk membantu proses pertumbuhannya.</p><p><b>2. Penyiraman yang rutin bisa dilakukan dua kali sehari, tetapi jangan sampai berlebihan karena akan membusuk</b></p><p>Hal kedua yang tidak boleh kamu lewatkan adalah penyiraman rutin. Cara menyiram tanaman janda bolong cukup dilakukan dua kali sehari, yaitu di waktu pagi dan sore hari. Hindari menyiram tanaman di siang hari karena akan mengganggu proses fotosintesis tanaman. Lalu, intensitas air yang diberikan harus cukup dan jangan terlalu banyak. Hal itu dikarenakan tanaman janda bolong bisa bertahan di tanah yang lembap</p>', '2021-12-22', 0, '61c35ad26af02.png', 16),
(63, '3 Cara Menanam Sayuran Organik di Rumah. Bebas Kimia, Tinggal Panen', '<p>Bartanam sudah mejadi hobi yang diminati banyak orang. Kegiatan itu ditekuni hanya memberikan kepuasan saja, tetapi juga bisa menghasilkan aneka sayuran organik yang aman dikonsumsi. Pasalnya, mencari sayuran organik di pasaran sangat sulit sehingga lebih baik jika bisa memproduksinya sendiri. Sayur organik memang banyak diminati karena tidak berbahaya dan juga lebih banyak kandungan nutrisinya.</p><p>Cara menanam sayuran organik memang memerlukan trik tersendiri agar bisa menghasilkan sayur yang berkualitas. Ada beberapa hal yang perlu diperhatikan agar sayuran yang ditanam tetap tumbuh subur di lahan yang kamu gunakan. Apa saja, ya?</p><p><b>1. Persiapkan tanah yang baik bisa dilakukan dengan cangkul atau traktor untuk memperbaiki kondisi fisik tanah</b></p><p>Berbeda dengan cara menanam sayuran hidroponik yang hanya memerlukan air, menanam di tanah membutuhkan pengolahan tanah. Hal wajib yang perlu kamu lakukan sebelum menanam bibit adalah pengolahan tanah. Langkah ini bertujuan untuk memperbaiki kondisi fisik tanah. Pengolahan tanah bisa dilakukan dengan cangkul atau traktor sesuai dengan yang seberapa luasnya lahan dan alat kamu miliki.</p><p><b>2. Sesuaikan iklim dengan jenis sayuran organik yang akan kamu tanam. Ada beberapa sayuran yang cocok untuk pemula</b></p><p>Sayuran memiliki karakteristik tertentu yang membuatnya tidak bisa sembarangan hidup di berbagai iklim.  Ada beberapa jenis sayuran yang mudah ditanam untuk kamu para pemula. Sayuran itu di antaranya tomat, bawang, selada, kangkung, cabai, kangkung, dan bayam. Cara menanam sayuran kangkung dan bayam pun tergolong mudah sehingga cocok untuk pemula.</p><p><b>3. Pilih lahan yang terkena sinar matahari dan tidak terhalang gedung ataupun pohon yang tinggi</b></p><p>Tanaman berupa sayuran tentu membutuhkan sinar matahari untuk pertumbuhannya. Tanaman akan tumbuh subur di tempat yang terkena sinar matahari penuh dan tidak terhalang dengan pohon atau dinding yang tinggi.</p>', '2021-12-22', 0, '61c35abc2c321.png', 16),
(64, '2 Jenis Pupuk untuk Aglonema yang Bikin Tanaman Hiasmu Makin Subur', '<p>Tren mengoleksi tanaman hias kembali melejit semenjak pandemi karena aktivitas di luar rumah yang masih sangat terbatas. Hal ini membuat banyak orang memilih untuk berkebun demi mengusir rasa bosan. Ada yang berkebun dengan menanam beragam tanaman sayur hingga mengoleksi beragam tanaman hias. Nggak heran kalau kini harga tanaman hias seperti monstera, anthurium, hingga aglaonema kembali naik.</p><p>Bagi kamu yang sedang gemar mengoleksi tanaman hias, jangan lupa untuk selalu merawat tanamannya agar tetap sehat, ya. Jangan sampai tanamannya hanya tergeletak di teras tanpa diurus, lo. Nah, kali ini Hipwee akan memberikan rekomendasi beberapa jenis pupuk yang bisa kamu gunakan untuk memaksimalkan pertumbuhan salah satu tanaman hias, yakni aglaonema. Yuk, langsung simak ulasan berikut!</p><p><b>1. Pupuk NPK Mutiara bisa meningkatkan kesegaran dan kecerahan warna daun pada tanaman aglaonema</b></p><p>NPK mutiara merupakan salah satu pupuk terkenal di kalangan pencinta tanaman hias. Selain karena harganya yang cukup terjangkau, pupuk NPK juga memiliki kandungan unsur hara yang lengkap. Pupuk ini dapat meningkatkan kesegaran dan kecerahan pertumbuhan warna daun pada tanaman aglaonema. Cara menggunakan pupuk NPK Mutiara juga cukup mudah, yaitu dengan menghancurkan butiran halusnya lalu taburkan pada sekeliling aglaonema sehingga pupuk bisa lebih cepat menyerap.</p><p><b>2. Pupuk kompos memiliki kandungan unsur hara yang tinggi sehingga baik untuk pertumbuhan tanaman</b></p><p>Cara penggunaannya pun cukup mudah, kamu hanya perlu mencampurkan pupuk kompos dengan media tanam aglaonema. Harga pupuk ini juga termasuk terjangkau dan mudah didapatkan.<br></p>', '2021-12-22', 0, '61c35a860b389.png', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel_like`
--

CREATE TABLE `artikel_like` (
  `artikel_like_id` int(11) NOT NULL,
  `artikel_like_ip` varchar(20) NOT NULL,
  `artikel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel_like`
--

INSERT INTO `artikel_like` (`artikel_like_id`, `artikel_like_ip`, `artikel_id`) VALUES
(8, '::1', 23),
(9, '::1', 25),
(10, '::1', 26),
(11, '::1', 27),
(12, '::1', 29),
(13, '::1', 30),
(14, '::1', 34),
(15, '::1', 33),
(16, '::1', 36),
(17, '::1', 37),
(18, '::1', 51),
(19, '::1', 52),
(20, '::1', 60),
(21, '::1', 63);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(5) NOT NULL,
  `kategori_nama` varchar(100) NOT NULL,
  `kategori_deskripsi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_deskripsi`) VALUES
(14, 'manfaat', '<p>Membahas mengenai manfaat yang dimiliki tanaman</p>'),
(15, 'info', '<p>Memberikan informasi seputar tanaman</p>'),
(16, 'tips', '<p>membahas seputar tips dalam menjaga dan merawat tanaman</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'admin', '$2y$10$cJvk6R.4oLSg0bseh4Q3qOKTBD1uZBCQivAsxDb4e0PVaUdSbfUp.'),
(7, 'puteriaulia1809@gmail.com', '$2y$10$apIjjrTWhk1mc2qnqKZUQ.aBBqgBHmhf.IJp9iaTtLGIcahJqNwGC'),
(9, 'hilmyhaidar@gmail.com', '$2y$10$3TrL2xdof6RbyyPuO9Loq.GOnU.Ig1dJIVgL3aE0ndVE1XIqKOoHW');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikel_id`);

--
-- Indeks untuk tabel `artikel_like`
--
ALTER TABLE `artikel_like`
  ADD PRIMARY KEY (`artikel_like_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikel_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `artikel_like`
--
ALTER TABLE `artikel_like`
  MODIFY `artikel_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
