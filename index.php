<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input dan Daftar Kategori</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title">Form Input Kategori</h5>
                    </div>
                    <div class="card-body">
                        <form action="simpan_kategori.php" method="POST">
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori:</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title">Daftar Kategori</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

                                if (mysqli_connect_errno()) {
                                    echo "Koneksi database gagal: " . mysqli_connect_error();
                                    exit();
                                }

                                $nomorIndeks = 1;

                                $query = "SELECT * FROM tblKategori";
                                $result = mysqli_query($koneksi, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                            <td>".$nomorIndeks."</td>
                                            <td>".$row['nama_kategori']."</td>
                                            <td>
                                                <a href='edit_kategori.php?id=".$row['idKategori']."' class='btn btn-info btn-sm'>Edit</a>
                                                <a href='hapus_kategori.php?id=".$row['idKategori']."' class='btn btn-danger btn-sm'>Delete</a>
                                            </td>
                                        </tr>";
                                    $nomorIndeks++;
                                }

                                mysqli_close($koneksi);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
