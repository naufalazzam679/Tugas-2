<?php
$mahasiswa = [];
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim((string) ($_POST['nama'] ?? ''));
    $nim = trim((string) ($_POST['nim'] ?? ''));
    $jurusan = trim((string) ($_POST['jurusan'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));

    if ($nama === '' || $nim === '' || $jurusan === '' || $email === '') {
        $pesan = 'Semua kolom wajib diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $pesan = 'Format email tidak valid.';
    } else {
        // Data form disimpan ke array PHP.
        $mahasiswa[] = [
            'nama' => $nama,
            'nim' => $nim,
            'jurusan' => $jurusan,
            'email' => $email,
        ];

        $pesan = 'Data berhasil dikirim dan ditampilkan di tabel.';
    }
}

// Escape output untuk mengurangi risiko XSS.
function e(string $nilai): string
{
    return htmlspecialchars($nilai, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Mahasiswa</title>
</head>
<body>
    <h1>Form Data Mahasiswa</h1>

    <form method="post" action="">
        <p>
            <label for="nama">Nama:</label><br>
            <input
                type="text"
                id="nama"
                name="nama"
                required
                value="<?= e((string) ($_POST['nama'] ?? '')) ?>"
            >
        </p>

        <p>
            <label for="nim">NIM:</label><br>
            <input
                type="text"
                id="nim"
                name="nim"
                required
                value="<?= e((string) ($_POST['nim'] ?? '')) ?>"
            >
        </p>

        <p>
            <label for="jurusan">Jurusan:</label><br>
            <input
                type="text"
                id="jurusan"
                name="jurusan"
                required
                value="<?= e((string) ($_POST['jurusan'] ?? '')) ?>"
            >
        </p>

        <p>
            <label for="email">Email:</label><br>
            <input
                type="email"
                id="email"
                name="email"
                required
                value="<?= e((string) ($_POST['email'] ?? '')) ?>"
            >
        </p>

        <button type="submit">Simpan Data</button>
    </form>

    <?php if ($pesan !== ''): ?>
        <p><?= e($pesan) ?></p>
    <?php endif; ?>

    <h2>Data Mahasiswa</h2>

    <?php if ($mahasiswa !== []): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $index => $data): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= e($data['nama']) ?></td>
                        <td><?= e($data['nim']) ?></td>
                        <td><?= e($data['jurusan']) ?></td>
                        <td><?= e($data['email']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Belum ada data yang dikirim. Isi form di atas untuk menampilkan data.</p>
    <?php endif; ?>
</body>
</html>
