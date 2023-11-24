<?php 
    include "services/taskService.php";
    include "helpers/redirectHelper.php";

    $taskId = $_GET["id"];
    $startDate = date("Y-m-d");

    // Cancel
    if(isset($_POST['cancelStart'])) {
        redirect('index.php');
    }

    // Delete
    if(isset($_POST['startTask'])) {
        // $startDate = $_POST['startDate'];

        if($taskId && $startDate) {
            start($taskId, $startDate);
        }
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
                    <a class="nav-link" aria-current="page" href="index.php">Tasks list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="addtask.php">Add task</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
  </header>
  <main>
    <div class="container">
        <h2>Start task</h2>
        <h4>Are you sure you want to start the task?</h4>

        <form class="mt-4 col-6" method="post">
            <div class="mb-3">
                <label for="startDate" class="form-label">Start date</label>
                <input name="startDate" value="<?php echo $startDate ?>" type="text" class="form-control" id="startDate" aria-describedby="startDateHelp" disabled>
            </div>
            
            
            <div>
                <button name="cancelStart" type="submit" class="btn btn-primary">Cancel</button>
                <button name="startTask" type="submit" class="btn btn-danger">Start</button>
            </div>
        </form>

    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>