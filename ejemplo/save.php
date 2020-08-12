<?php 
    include ("db.php");

    if(isset($_POST['guardar'])){
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $query = "insert into tarea(nombre, descripcion) values ('$titulo', '$descripcion')";

        $result = mysqli_query($conn, $query);

        if (!$result){
            die("fallo en la creacion");
        }

        $_SESSION['message'] = 'Guardado exitosamente';
        $_SESSION['message_type'] = 'success';

        header("Location: index.php");
    }

?>
