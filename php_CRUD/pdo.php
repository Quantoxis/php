<?php
    require_once 'pdo-db.php';
?>

<?php
//insert
try{
    $insertName = filter_input(INPUT_POST, 'personName', FILTER_SANITIZE_STRING);
    $insertDesc = filter_input(INPUT_POST, 'personDesc', FILTER_SANITIZE_STRING);
    $insertBtn = filter_input(INPUT_POST, 'insertBtn');

    if(isset($insertBtn)){
        $sql = "INSERT INTO people(name, description) VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $insertName, PDO::PARAM_STR);
        $stmt->bindParam(2, $insertDesc, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            header('location: pdo.php');
            exit();
        }
    }
}
catch(Exception $e){
    echo $e->getMessage();
}
?>

<?php
//insert
    try{
        $updateName = filter_input(INPUT_POST, 'updateName', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'updateID', FILTER_VALIDATE_INT);
        $updateBtn = filter_input(INPUT_POST, 'updateBtn');

        if(isset($updateBtn)){
            $sql = "UPDATE people SET name=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $updateName, PDO::PARAM_STR);
            $stmt->bindParam(2, $id, PDO::PARAM_INT);
            $stmt->execute();
        
            if($stmt->rowCount() > 0){
                echo "updated";
            } else {
                echo "not updated";
            }
    
            header('location: pdo.php');
            exit();
        }
    }
    catch(Exception $e){
        $e->getMessage();
    }
?>

<?php
//delete
try{
    $delete = filter_input(INPUT_POST, 'deletePerson');
    $deleteBtn = filter_input(INPUT_POST, 'deleteBtn');

    if(isset($deleteBtn)){
        $sql = "DELETE FROM people WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $delete, PDO::PARAM_INT);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            echo "deleted";
        } else {
            echo "not deleted";
        }

        header('location: pdo.php');
        exit();
    }
}
catch(Exception $e){
    $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>PDO crud</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <div class="form-group">
                        <label for="personName">Name</label>
                        <input name="personName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="personDesc">Description</label>
                        <input name="personDesc" class="form-control">
                    </div>
                    <button type="submit" name="insertBtn" class="btn btn-primary">Insert</button>
                </form>
            </div>
            <div class="col-4">
                <?php
                    try{
                        $sql = "SELECT * FROM people ORDER BY id ASC";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        
                        if($stmt->rowCount() > 0){
                            $results = $stmt->fetchAll();

                            foreach($results as $result){
                            ?>
                                <p><?php echo $result['name'] ?></p>

                                <form method="GET" action="<?php echo $_SERVER['PHP_SELF']?>">
                                    <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                                    <button type="submit" class="btn btn-primary">See more</button>
                                </form>

                                <hr>

                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                    <div class="form-group">
                                        <label>update name</label>
                                        <input name="updateName" placeholder="Update" value="<?php echo $result['name'] ?>">
                                    </div>
                                    <input type="hidden" name="updateID" value="<?php echo $result['id'] ?>">
                                    <button type="submit" name="updateBtn" class="btn btn-warning">Update</button>
                                </form>

                                <hr>
                                
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                    <input type="hidden" name="deletePerson" value="<?php echo $result['id'] ?>">
                                    <button type="submit" name="deleteBtn" class="btn btn-danger">Delete</button>
                                </form>
                            <?php
                            }
                        }
                    }
                    catch(PDOException $e){
                        $e->getMessage();
                    }
                ?>
            </div>
            <div class="col-4">
            <?php
                //get where
                try{
                    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

                    if(isset($id)){
                        $sql = "SELECT * FROM people WHERE id = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(1, $id, PDO::PARAM_INT);
                        $stmt->bindColumn('id', $id, PDO::PARAM_INT);
                        $stmt->bindColumn('name', $name, PDO::PARAM_STR);
                        $stmt->bindColumn('description', $description, PDO::PARAM_STR);
                        $stmt->execute();

                        if($stmt->rowCount() > 0){

                        if($stmt->fetch() ){
                            ?>
                            <p> ID: <?php echo $id ?> </p>
                            <p> Name: <?php echo $name ?> </p>
                            <p> Description: <?php echo $description ?> </p>
                            <?php
                            }
                        } else {
                            ?>
                            <p>no id selected</p>
                            <?php
                        }
                    }
                }
                catch(Exception $e){
                    $e->getMessage();
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>