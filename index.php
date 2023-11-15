<?php 
    include "services/db.php";

    function getAll($conn) {
        $query = "SELECT * FROM `Tasks`";

        $tasks = mysqli_query($conn, $query);
        if(!$tasks) {
            die('Query feild: ' . mysqli_error());
        }

        return $tasks;
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
                <a class="nav-link active" aria-current="page" href="index.php">Lista</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
  </header>
  <main>
    <div class="container">
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
            </tr>
        </thead>
        <tbody>
            <?php 
                $tasks = getAll($connection);
                while($task = mysqli_fetch_assoc($tasks)) {
                    echo '
                    <tr>
                        <th scope="row">' . $task['Id'] . '</th>
                        <td>' . $task['Name'] . '</td>
                        <td>' . $task['Description'] . '</td>
                        <td>' . $task['Priority'] . '</td>
                        <td>' . $task['AuthorName'] . '</td>
                        <td>' . $task['AssignedName'] . '</td>
                        <td>' . $task['StartDate'] . '</td>
                        <td>' . $task['EndDate'] . '</td>
                    </tr>';
                }
            ?>
        </tbody>
        </table>
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