<?php

require_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST["id"];
    $TANGGAL = $_POST['tanggal'];
    $JENIS = $_POST['jenis'];
    $KETERANGAN = $_POST['keterangan'];
    $JUMLAH = $_POST['jumlah'];

    $query = "UPDATE transaksi SET TANGGAL = '$TANGGAL', JENIS = '$JENIS', JUMLAH = $JUMLAH, KETERANGAN = '$KETERANGAN' WHERE ID = $ID";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("location:index.php");
    } else {
        echo 'please check your query';
    }
} else {
    $ID = null;
    if (!isset($_GET["id"])) {
        echo "ID tidak ditemukan";
    } else {
        $ID = $_GET["id"];
        $TANGGAL = null;
        $JENIS = null;
        $KETERANGAN = null;
        $JUMLAH = null;
        $sql = "SELECT * FROM transaksi WHERE ID = $ID LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                $TANGGAL = $row["TANGGAL"];
                $JENIS = $row["JENIS"];
                $KETERANGAN = $row["KETERANGAN"];
                $JUMLAH = $row["JUMLAH"];
            }
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <title>Pikti Web - Add</title>
            </head>

            <body>

                <div class="container w-50">
                    <div class="mx-auto">
                        <h3 class="mt-5 mb-3 text-center">Tambah Data</h3>
                        <form class="" method="POST" action="edit.php">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $TANGGAL ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis</label>
                                <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $JENIS ?>">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $KETERANGAN ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $JUMLAH ?>">
                            </div>

                            <input type="hidden" name="id" value="<?php echo $ID ?>">
                            <div class="d-grid gap-1">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            </body>

            </html>
<?php
        } else {
            echo "data tidak ditemukan";
        }
    }
}
