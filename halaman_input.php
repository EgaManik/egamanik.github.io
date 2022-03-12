<?php include("inc_header.php") ?>
<?php
$wilayah    = "";
$pengguna       = "";
$tindakan   = "";
$obat       = "";
$error      = "";
$sukses     = "";

if (isset($_POST['simpan'])) {
    $wilayah    = $_POST['wilayah'];
    $pengguna   = $_POST['pengguna'];
    $tindakan   = $_POST['tindakan'];
    $obat       = $_POST['obat'];

    if ($wilayah == '' or   $tindakan == '' or $obat == '' ) {
        $error  = "silakan masukan semua data terlebih dahulu";
        if (empty($error)) {
            $sql1   = "insert into halaman(wilayah,pengguna,tindakan,obat) values ('$wilayah','$pengguna','$tindakan','$obat')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Sukses memasukan data";
            } else {
                $error  = "Gagal memasukan data";
            }
        }
    }
}
?>

<h1>Halaman Admin Input Data</h1>
<div class="mb-3 row">
    <a href="halaman.php">
        << kembali ke Halaman Admin</a>
</div>
<?php
if ($error) {
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>

<?php
}
?>
<?php
if ($sukses) {
?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
<?php
}
?>
<form action="" method="post">
    <div class="mb-3 row">
        <label for="wilayah" class="col-sm-2 col-form-label">Wilayah</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="wilayah" value="<?php echo $wilayah ?>" name="wilayah">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="pengguna" class="col-sm-2 col-form-label">User</label>
        <div class="col-sm-10">
            <input class="form-check-input" type="radio" name="pengguna" id="pengguna" value="<?php echo $pengguna ?>" checked>
            <label class="form-check-label" for="flexRadioDefault1">
                Dokter
            </label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pengguna" id="pengguna" value="<?php echo $pengguna ?>" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Perawat
                </label>
            </div>

        </div>
    </div>
    <div class="mb-3 row">
        <label for="tindakan" class="col-sm-2 col-form-label">Tindakan</label>
        <div class="col-sm-10">
            <textarea name="tindakan" class="form-control"><?php echo $tindakan ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="obat" class="col-sm-2 col-form-label">Obat</label>
        <div class="col-sm-10">
            <textarea name="obat" class="form-control"><?php echo $obat ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
        </div>
    </div>
</form>
<?php include("inc_footer.php") ?>