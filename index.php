<?php
    include 'data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Excel Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body bg-light>
    <div class="container">
        <div class="row">
            <div class="card mt-5">
                <div class="card-header">
                    <form action="data.php" target="_new" method="POST">
                        <button type="submit" name="export_excel_data" class="btn btn-secondary shadow-none float-end">Export to excel</button>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Bio</th>
                        </tr>
                        <?php foreach ($data as $item): ?> 
                            <tr>
                                <td><?= $item['name']; ?></td>
                                <td><?= $item['email']; ?></td>
                                <td><?= $item['bio']; ?></td>
                            </tr>
                        <?php endforeach; ?> 
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>