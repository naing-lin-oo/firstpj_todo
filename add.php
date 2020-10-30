<?php

require('config.php');
if($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO todo(title, description) VALUES (:title, :description)";
    $pdostatement = $pdo->prepare($sql);
    $result = $pdostatement->execute(
        array(
            ':title' => $title,
            ':description' => $desc
        )
    );

    if($result) {
        echo "<script> alert('New ToDo is Added'); window.location.href='index.php'; </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New TODO</h2>
            <form action="add.php" method="POST">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="8"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="Create New">
                    <a href="index.php" class="btn btn-warning" name="">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>