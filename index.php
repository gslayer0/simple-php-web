<?php
include "conn.php";

$sql = "SELECT * FROM transaksi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pikti Web - Index</title>
</head>

<body>
    <div class="container">

        <div class="d-flex justify-content-center mt-5 mb-3">
            <h3>Tabel Gaji Pegawai</h3>
        </div>

        <div class="mb-3 mt-2 d-flex justify-content-end">
            <a href="add.php" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark align-middle">
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $counter = 0;
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td><?php echo $row["TANGGAL"]; ?></td>
                                <td><?php echo $row["JENIS"]; ?></td>
                                <td><?php echo $row["KETERANGAN"]; ?></td>
                                <td><?php echo $row["JUMLAH"]; ?></td>
                                <td class="d-flex gap-2">
                                    <div>
                                        <a href="edit.php?id=<?php echo $row["ID"]; ?>" class="btn btn-block btn-warning">Edit</a>
                                    </div>

                                    <div>
                                        <form action="delete.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row["ID"]; ?>">
                                            <button class="btn btn-block btn-danger">Delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "0 results";
                    } ?>
                </tbody>
            </table>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>


<?php
$conn->close();
