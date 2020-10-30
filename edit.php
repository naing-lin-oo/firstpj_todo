<?php
    require('config.php');
    if($_POST) {
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $id = $_POST['id'];

        $pdostatement = $pdo->prepare("UPDATE todo SET title='$title', description='$desc' WHERE id='$id'");
        $result = $pdostatement->execute();
        if($result) {
            echo "<script> alert('ToDo is Updated'); window.location.href='index.php'; </script>";
        }

    } else {
        $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();
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
            <h2>Edit New TODO</h2>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $result[0]['id']; ?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="8"><?php echo $result[0]['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Update">
                    <a href="index.php" class="btn btn-warning" name="">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>