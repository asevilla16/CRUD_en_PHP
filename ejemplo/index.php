<?php
    include("db.php");
    include("includes/header.php");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php 
            if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <?php session_unset(); } ?>
            <div class="card card-body">
                <form action="save.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="titulo" placeholder="Titulo de la tarea">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="descripcion" rows="2" placeholder="Descripcion de la tarea"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success" name="guardar" value="Guardar">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * from tarea";
                    $result_tareas = mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_array($result_tareas)){ ?>
                    <tr>
                        <td><?php echo $row['nombre'] ?> </td>
                        <td><?php echo $row['descripcion'] ?> </td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Editar</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                        </td>
                    </tr>


                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>