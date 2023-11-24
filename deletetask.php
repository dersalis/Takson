<?php 
    include "services/taskService.php";
    include "helpers/redirectHelper.php";

    $taskId = $_GET["id"];
    $task = getById($taskId);

    $name = $task['Name'];
    $description = $task['Description'];
    $priority = $task['Priority'];
    $author = $task['AuthorName'];
    $assigned = $task['AssignedName'];


    // Cancel
    if(isset($_POST['cancelDelete'])) {
        redirect('index.php');
    }

    // Delete
    if(isset($_POST['deleteTask'])) {
        if($taskId) {
            delete($taskId);
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
        <h2>Delete task</h2>
        <h4>Are you sure you want to delete the task?</h4>

        <form class="mt-4 col-6" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" value="<?php echo $name ?>" type="text" class="form-control" id="name" aria-describedby="nameHelp" disabled>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input name="description" value="<?php echo $description ?>" type="text" class="form-control" id="description" aria-describedby="descriptionHelp" disabled>
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label">Priority</label>
                <select name="priority" class="form-select" id="priority" aria-label="Default select example" disabled>
                    <option value="0" <?php if($priority == 0) echo 'selected' ?>>None</option>
                    <option value="1" <?php if($priority == 1) echo 'selected' ?>>1 - !</option>
                    <option value="2" <?php if($priority == 2) echo 'selected' ?>>2 - !!</option>
                    <option value="3" <?php if($priority == 3) echo 'selected' ?>>3 - !!!</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author name</label>
                <input name="author" value="<?php echo $author ?>" type="text" class="form-control" id="author" aria-describedby="authorHelp" disabled>
            </div>
            <div class="mb-4">
                <label for="assigned" class="form-label">Assigned name</label>
                <input name="assigned" value="<?php echo $assigned ?>" type="text" class="form-control" id="assigned" aria-describedby="assignedHelp" disabled>
            </div>
            
            <div>
                <button name="cancelDelete" type="submit" class="btn btn-primary">Cancel</button>
                <button name="deleteTask" type="submit" class="btn btn-danger">Delete</button>
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