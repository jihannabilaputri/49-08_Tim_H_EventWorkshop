<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendaftaran Peserta</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <div class="container">
    <h1>Form Biodata Peserta</h1>
    <p class="sub">Event & Workshop</p>

    <form action="proses.php" method="POST">
      <label for="nama">Nama Lengkap</label>
      <input type="text" id="nama" name="nama" required>

      <label for="kampus">Asal Kampus</label>
      <input type="text" id="kampus" name="kampus" required>

      <label for="prodi">Program Studi</label>
      <input type="text" id="prodi" name="prodi" required>

      <label for="kontak">Nomor Kontak</label>
      <input type="tel" id="kontak" name="kontak" required>

      <label for="email">Email Aktif</label>
      <input type="email" id="email" name="email" required>

      <div class="aksi-form kanan">
        <button type="submit">Daftar</button>
      </div>
    </form>
  </div>
</body>
</html>