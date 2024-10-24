<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Customer</title>
    
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Customer</h1>
        
        <!-- Tombol Tambah Customer -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahCustomer"
        >Tambah Customer</button>

        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID Customer</th>
                    <th>NIK Customer</th>
                    <th>Nama Customer</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customer as $c): ?>
                <tr>
                    <td><?= esc($c['id_customer']) ?></td>
                    <td><?= esc($c['nik_customer']) ?></td>
                    <td><?= esc($c['nama_customer']) ?></td>
                    <td><?= esc($c['jenis_kelamin']) ?></td>
                    <td><?= esc($c['pekerjaan']) ?></td>
                    <td><?= esc($c['nomor_telepon']) ?></td>
                    <td><?= esc($c['alamat']) ?></td>
                    <td><?= esc($c['email']) ?></td>
                    <td><?= esc($c['created_at']) ?></td>

                    <!-- Kolom Aksi -->
                    <td>
                        <a href="<?= base_url('customer/view/'.$c['id_customer']) ?>"
                        class="btn btn-info btn-sm">Edit</a>
                        <a href="<?= base_url('customer/hapus/'.$c['id_customer']) ?>"
                        class="btn btn-danger btn-sm" onclick="return confirm
                        ('Apakah Anda yakin ingin menghapus customer ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Customer -->
    <div class="modal fade" id="modalTambahCustomer" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form Tambah Customer -->
            <form action="<?= base_url('customer/tambah') ?>" method="post">
              <div class="form-group">
                <label for="nik_customer">NIK Customer</label>
                <input type="text" class="form-control" name="nik_customer" required>
              </div>
              <div class="form-group">
                <label for="nama_customer">Nama Customer</label>
                <input type="text" class="form-control" name="nama_customer" required>
              </div>
              <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" required>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan" required>
              </div>
              <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="text" class="form-control" name="nomor_telepon" required>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Menambahkan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
