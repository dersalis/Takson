<?php 
    include "services/taskService.php";

    $tasks = getAll();

    if(isset($_POST['rowClick'])) {
        echo 'rowClick';
    }
?>
<!doctype html>
<html lang="en">

<head>
  <title>Lista zadań</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Takson</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Tasks list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="addtask.php">Add task</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
  </header>
  <main>
  <div class="container">
        <h2 class="mb-4">Tasks list</h2>
        <?php
            function tasksAlert() {
                echo '
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Tasks</h4>
                        <hr>
                        <p>
                            Tasks cannot be downloaded or no task has been added :(
                        </p>
                    </div>
                ';
            }

            function connectionAlert() {
                echo '
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Connection</h4>
                        <hr>
                        <p>
                            There was a problem connecting to the database :(
                        </p>
                    </div>
                ';
            }

            function createRow($id, $name, $description, $priority, $author, $assigned, $startdate, $enddate) {
                $startButton = $startdate ? '' : '<a href="starttask.php?id=' . $id . '" type="button" class="btn btn-sm btn-outline-success"><i class="bi bi-play-circle-fill"></i></a>';
                $stopButton = $startdate && !$enddate ? '<a href="finishtask.php?id=' . $id . '" type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-stop-circle-fill"></i></a>' : '';

                echo '
                        <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $description . '</td>
                            <td>' . $priority . '</td>
                            <td>' . $author . '</td>
                            <td>' . $assigned . '</td>
                            <td>' . $startdate . '</td>
                            <td>' . $enddate . '</td>
                            <td>' . $startButton . '</td>
                            <td>' . $stopButton . '</td>
                            <td><a href="edittask.php?id=' . $id . '" type="button" class="btn btn-sm btn-outline-primary">Edit</a></td>
                            <td><a href="deletetask.php?id=' . $id . '" type="button" class="btn btn-sm btn-outline-danger">Delete</a></td>
                        </tr>';
            }

            if(!$tasks || !$connection) {
                if(!$tasks) {
                    tasksAlert();
                }
                if(!$connection) {
                    connectionAlert();
                }
                
            } else {
                echo '
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Author name</th>
                        <th scope="col">Assigned name</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col" colspan="4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                ';
                while($task = mysqli_fetch_assoc($tasks)) {
                    createRow($task['Id'], $task['Name'], $task['Description'], $task['Priority'], $task['AuthorName'], $task['AssignedName'], $task['StartDate'], $task['EndDate']);
                }
                echo '
                    </tbody>
                </table>
                ';
            }
        ?>

    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteTaskModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Delete task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete the task?</p>

            <form action="deletetask.php" method="post">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button name="deleteTask" type="submit" class="btn btn-danger">Delete</button>
            </form>
            <!-- <div class="row mt-4">
                <div class="col-12 right">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
                
            </div> -->
        </div>
        <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </div> -->
        </div>
    </div>
    </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
    <script>
        $(document).ready(function(){
            function rowClick(id) {
                console.log('rowClick');
            }

            $("#rowClick").click(function(){
                console.log('rowClick');
            });
        });
    </script>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>