<?php 

    include("db.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "Select * from tarea where id = $id";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['nombre'];
            $descripcion = $row['descripcion'];

        }
    }

    if(isset($_POST['edit'])){
        $id = $_GET['id'];
        $title = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $query = "Update tarea set nombre = '$title', descripcion = '$descripcion' where id = $id";

        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Tarea actualizada satisfactoriamente';
        $_SESSION['message_type'] = 'info';
        header("Location: index.php");


    }




?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $title; ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control"><?php echo $descripcion; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="edit">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>