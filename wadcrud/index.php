<?php
// Panggil koneksi database
include "koneksi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - PHP MySQL Daftar Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">
      <div class="mt-3">
        <h3 class="text-center">Top 3 imnotkhairy movie</h3>
        <h3 class="text-center">M Daffa Khairy</h3>
      </div>

      <div class="card mt-3">
        <div class="card-header bg-primary text-white">
          Daftar Film
        </div>
        <div class="card-body">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah Data
          </button>

          <table class="table table-bordered table-striped table-hover">
            <tr>
              <th>No.</th>
              <th>Judul Film</th>
              <th>Sutradara</th>
              <th>Tahun rilis</th>
              <th>Genre</th>
              <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM tfilm ORDER BY id_film DESC");
            while ($data = mysqli_fetch_array($tampil)) :
            ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['judul']; ?></td>
                <td><?= $data['sutradara']; ?></td>
                <td><?= $data['tahun']; ?></td>
                <td><?= $data['genre']; ?></td>
                <td>
                  <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $data['id_film'] ?>">Ubah</a>
                  <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $data['id_film'] ?>">Hapus</a>
                </td>
              </tr>
              <!-- Awal Modal Ubah -->
              <div class="modal fade" id="modalUbah<?= $data['id_film'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Daftar Film Favorite</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="aksi_crud.php">
                      <input type="hidden" name="id_film" value="<?= $data["id_film"] ?>">

                      <div class="modal-body">
                        <div class="mb-3">
                          <label class="form-label">Judul Film</label>
                          <input type="text" class="form-control" name="tjudul" value="<?= $data['judul'] ?>" placeholder="Masukkan Judul Film!">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Sutradara</label>
                          <input type="text" class="form-control" name="tsutradara" value="<?= $data['sutradara'] ?>" placeholder="Masukkan Nama Sutradara!">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Tahun Rilis</label>
                          <input type="text" class="form-control" name="trilis" value="<?= $data['tahun'] ?>" placeholder="Masukkan Tahun Rilis!">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Genre</label>
                          <select class="form-select" name="tgenre">
                            <?php foreach (["Drama", "Comedy", "Action"] as $genreOption) : ?>
                              <option value="<?= $genreOption ?>"<?= $data["genre"] == $genreOption ? ' selected' : '' ?>>
                                <?= $genreOption ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Akhir Modal Ubah -->

              <!-- Awal Modal Hapus -->
              <div class="modal fade" id="modalHapus<?= $data['id_film'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="aksi_crud.php">
                      <input type="hidden" name="id_film" value="<?= $data["id_film"] ?>">

                      <div class="modal-body">
                        <h5 class='text-center'>Apakah anda yakin akan menghapus data ini?<br>
                          <span class="text-danger"><?= $data["judul"] ?> - <?= $data["sutradara"] ?></span>
                        </h5>
                      </div>
                      <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="bhapus">Hapus</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Akhir Modal Hapus -->

            <?php endwhile; ?>
          </table>

<!-- Awal Modal -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Daftar Film Favorite</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud.php">
    <div class="modal-body">
        <div class="mb-3">
            <label class="form-label">Judul Film</label>
            <input type="text" class="form-control" name="tjudul" placeholder="Masukkan Judul Film!">
        </div>
        <div class="mb-3">
            <label class="form-label">Sutradara</label>
            <input type="text" class="form-control" name="tsutradara" placeholder="Masukkan Nama Sutradara!">
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun Rilis</label>
            <input type="text" class="form-control" name="trilis" placeholder="Masukkan Tahun Rilis!">
        </div>

        <div class="mb-3">
    <label class="form-label">Genre</label>
    <select class="form-select" name="tgenre">
        <option value="Drama">Drama</option>
        <option value="Comedy">Comedy</option>
        <option value="Action">Action</option>
    </select> 
</div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>    
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
        
    </div>
</form>
    </div>
  </div>
</div>
<!-- Akhir Modal -->    
      </div>

  </div>
  
  </div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>