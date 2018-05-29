<?php
// session_start();
include 'include/controller.php';
$session_username = $_SESSION['user_name'];
if(empty($_SESSION['user_name'])){
    header("Inventario/login.php");
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Inventario</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <!-- Loader -->
        <link rel="stylesheet" href="css/loader.css">
        <script src="js/jquery-1.12.4.js"></script>
        <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
        <script>
            $(document).ready(function() {
                $('#example').DataTable({

                });
            });

        </script>
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css/responsive.bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>

    </head>
    <bodyy onload="myFunction()" style="margin:0;">
        <br>
        <br>
        <div class="container">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown"><span class='glyphicon glyphicon-user' aria-hidden='true'></span> <?php echo $session_username; ?>
                    <span class="caret"></span>Session</button>
                <ul class="dropdown-menu">
                    <li><a href="#logout" data-toggle="modal"><span class='glyphicon glyphicon-log-out' aria-hidden='true'></span> Salir</a></li>
                </ul>
                <a href="#add" data-toggle="modal"><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Agregar Producto</button></a>
            </div><br>



            <table id="example" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estatus</th>
                        <th>Unidad de medida</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Estatus</th>
                      <th>Unidad de medida</th>
                      <th>Precio</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM productos";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $id = $row['id_producto'];
                            $item_name = $row['nombre_producto'];
                            $item_code = $row['status_producto'];
                            $item_category = $row['unidad_medida_producto'];
                            $item_description = $row['precio_producto'];
                            $qty = $row['cantidad'];

            echo "<tr>
            <td>$id</td>
            <td>$item_name</td>
            <td>$item_code</td>
            <td>$item_category</td>
            <td>$item_description</td>
            ";
                    ?>
                    <td>
                        <div class='btn-group' role='group' aria-label='...'>
                            <a href="#edit<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
                            <a href="#delete<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
                        </div>
                    </td>
        </div>
        </div>

        <!--Edit Item Modal -->
        <div id="edit<?php echo $id; ?>" class="modal fade" role="dialog">
            <form method="post" class="form-horizontal" role="form">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Editar producto</h4>
                            <div class="modal-body">
                            <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="nombre_producto">ID:</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" id="id_producto" name="id_producto" value="<?php echo $id; ?>" placeholder="Item Name" required autofocus>
                              </div>
                              <label class="control-label col-sm-2" for="nombre_producto">Nombre:</label>
                              <div class="col-sm-4">
                  <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="<?php echo $item_name; ?>" placeholder="Item Name" required autofocus>
              </div>
              <label class="control-label col-sm-2" for="item_code">Disponivilidad</label>
              <div class="col-sm-4">
                <input type="text" readonly class="form-control" id="status_producto" name="status_producto" value="<?php echo $item_code; ?>" placeholder="Item Code" required>
              </div>
              <br>
              <div class="form-group">
                <br>
                <label class="control-label col-sm-2" for="item_description">Precio:</label>
                <div class="col-sm-4">
                  <textarea cclass="form-control" id="precio_producto" name="precio_producto" placeholder="Description" required style="width: 100%;"><?php echo $item_description; ?></textarea>
                </div>
                <label class="control-label col-sm-2" for="item_category">Category:</label>
                <div class="col-sm-4">

                  <input type="text" class="form-control" id="unidad_medida_producto" name="unidad_medida_producto" value="<?php echo $item_category; ?>" placeholder="Category" required>
                </div>
</div>
</div>
<br>
<br>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary" name="editar_item"><span class="glyphicon glyphicon-edit"></span> Editar</button>
    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
                              </div>
                            </div>
                    </div>
                </div>
        </div>
        </form>
        </div>

        <!--Delete Modal -->
        <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form method="post">

                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Eliminar</h4>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                            <p>
                                <div class="alert alert-danger">Confirmacion de eliminacion de producto <strong><?php echo $item_name; ?>?</strong></p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Aceptar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
        </tr>


        <?php
                        }
          //               if(isset($_POST['change_pass'])){
          //                   $sql = "SELECT password FROM tbl_user WHERE username='$session_username'";
          //                   $result = $conn->query($sql);
          //
          //                   if ($result->num_rows > 0) {
          //                       // output data of each row
          //                       while($row = $result->fetch_assoc()) {
          //                           if($row['password'] != $current_password){
          //                               echo "<script>window.alert('Invalid Password');</script>";
          //                               $passwordErr = '<div class="alert alert-warning">
          //               <strong>Password!</strong> Invalid.
          //               </div>';
          //                           } elseif($new_password != $repeat_password) {
          //                               echo "<script>window.alert('Password Not Match!');</script>";
          //                               $passwordErr = '<div class="alert alert-warning">
          //               <strong>Password!</strong> Not Match.
          //               </div>';
          //                           } else{
          //                               $sql = "UPDATE tbl_user SET password='$new_password' WHERE username='$session_username'";
          //
          //                               if ($conn->query($sql) === TRUE) {
          //                                   echo "<script>window.alert('Password Successfully Updated');</script>";
          //                               } else {
          //                                   echo "Error updating record: " . $conn->error;
          //                               }
          //                           }
          //                       }
          //                   } else {
          //                       $usernameErr = '<div class="alert alert-danger">
          // <strong>Username</strong> Not Found.
          // </div>';
          //                       $username = "";
          //                   }
          //               }

                        //Update Items
                        if(isset($_POST['editar_item'])){
                          $id= $_POST['id_producto'];
                          $item_name = $_POST['nombre_producto'];
                          $item_code = $_POST['status_producto'];
                          $item_category = $_POST['unidad_medida_producto'];
                          $item_description = $_POST['precio_producto'];
                            $sql = "UPDATE productos SET
                                id_producto='$id',
                                nombre_producto='$item_name',
                                status_producto='$item_code',
                                unidad_medida_producto='$item_category',
                                precio_producto='$item_description'
                                WHERE id_producto='$id' ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM productos WHERE id_producto='$delete_id' ";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "DELETE FROM productos WHERE id_producto='$delete_id' ";
                                if ($conn->query($sql) === TRUE) {
                                    $sql = "DELETE FROM productos WHERE id_producto='$delete_id' ";
                                    echo '<script>window.location.href="inventory.php"</script>';
                                } else {
                                    echo "Error deleting record: " . $conn->error;
                                }
                            } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }
                    }

                    //Add Item
                    if(isset($_POST['add_item'])){
                        $item_name = $_POST['item_name'];
                        $item_code = $_POST['item_code'];
                        $item_category = $_POST['item_category'];
                        $item_description = $_POST['item_description'];
                        $sql = "INSERT INTO tbl_items
            (item_name,
            item_code,
            item_description,
            item_category,
            item_critical_lvl,
            item_date)
            VALUES (
            '$item_name',
            '$item_code',
            '$item_description',
            '$item_category',
            '$item_critical_lvl',
            '$date'
            )";
                        if ($conn->query($sql) === TRUE) {
                            $add_inventory_query = "INSERT INTO tbl_inventory
            (item_name,
            item_code,
            date,
            qty
            )
            VALUES (
            '$item_name',
            '$item_code',
            '$date',
            '0'
            )";

                            if ($conn->query($add_inventory_query) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }

                    if(isset($_POST['add_inventory'])){
                        $remarks = clean($_POST["remarks"]);
                        $sql = "INSERT INTO tbl_issuance
            (
            date,
            item_name,
            item_code,
            qty,
            in_out,
            remarks
            )
            VALUES (
            '$date_time',
            '$item_name',
            '$item_code',
            '$quantity',
            'in',
            '$remarks'
            )";
                        if ($conn->query($sql) === TRUE) {
                            $add_inv = "UPDATE tbl_inventory SET
                qty=(qty + '$quantity')
                WHERE id='$id' ";
                            if ($conn->query($add_inv) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }

                    if(isset($_POST['minus_inventory'])){
                        $remarks = clean($_POST["remarks"]);
                        $sql = "INSERT INTO tbl_issuance
            (
            date,
            item_name,
            item_code,
            qty,
            sender_receiver,
            in_out,
            remarks
            )
            VALUES (
            '$date_time',
            '$item_name',
            '$item_code',
            '$quantity',
            '$received_by',
            'out',
            '$remarks'
            )";
                        if ($conn->query($sql) === TRUE) {
                            $add_inv = "UPDATE tbl_inventory SET
                qty=(qty - '$quantity')
                WHERE id='$id' ";
                            if ($conn->query($add_inv) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
?>
            </tbody>
            </table>
            </div>

            <!--Add Item Modal -->
            <div id="add" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Item</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="item_name">Item Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" autofocus required>
                                    </div>
                                    <label class="control-label col-sm-2" for="item_code">Item Code:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="item_category">Category:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="item_category" name="item_category" placeholder="Item Category" required>
                                    </div>
                                    <label class="control-label col-sm-2" for="item_critical_lvl">Critical Level:</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="item_critical_lvl" name="item_critical_lvl" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="item_sub_category">Description:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="item_description" name="item_description" required></textarea>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="add_item"><span class="glyphicon glyphicon-plus"></span> Add</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            </div>

            <!--Logout Modal -->
            <div id="logout" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Logout</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                            <p>
                                <div class="alert alert-danger">Seguro que desea salir? <strong><?php echo $_SESSION['user_name']; ?>?</strong></p>
                            </div>
                            <div class="modal-footer">
                                <a href="logout.php"><button type="button" class="btn btn-danger">SI </button></a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                            </div>
                        </div>
                    </div>
                </div>
                </body>

    </html>
