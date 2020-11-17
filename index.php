<?php

# PREPARED STATEMENTS (prepare & execute)
// Create task
function publishTask($title, $body, $author)
{
    $host = 'localhost';
    $user = 'test';
    $password = 'test';
    $dbname = 'todo';

    // Set DSN data source name
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    // Create PDO instance
    $pdo = new PDO($dsn, $user, $password);

    // INSERT DATA
    $sql = 'INSERT INTO tasks(title, body, author) VALUES(:title, :body, :author)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
}

// Read tasks
function loadTasks()
{
    $host = 'localhost';
    $user = 'test';
    $password = 'test';
    $dbname = 'todo';


    // Set DSN data source name
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    // Create PDO instance
    $pdo = new PDO($dsn, $user, $password);

    // INSERT DATA
    $sql = 'SELECT title, body, author FROM tasks';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
if (isset($_POST['publish'])) {
    // INSERT DATA
    $title = $_POST['title'];
    $body = $_POST['body'];
    $author = $_POST['author'];

    publishTask($title, $body, $author);
}

// Edits a task
function updateTask($title, $body, $author)
{
    $host = 'localhost';
    $user = 'test';
    $password = 'test';
    $dbname = 'todo';

    // Set DSN data source name
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    // Create PDO instance
    $pdo = new PDO($dsn, $user, $password);

    // SET DATA
    $sql = 'SELECT * FROM tasks WHERE id=$id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();

}


// Deletes a task
function deleteTask()
{
}


define('SITENAME', 'To Do List');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <div class="d-flex justify-content-center container">
        <div class="col-md-12 justify-content-center">
            <!-- Publish/Update Post -->
            <div id='publishTask' class='hidden alert alert-success' role='alert'>
                <h4 class='alert-heading'>Add A Task</h4>
                <hr>
                <form action='index.php' method='post' class='text-center'>
                    <!-- Title -->
                    <input type='text' required class='form-control mb-2' name='title' placeholder='Input task title'>
                    <input type='text' required class='form-control mb-2' name='author' placeholder='Input your name'>
                    <!-- Body -->
                    <textarea class='form-control' name='body' placeholder='Input task body' rows='3' required></textarea>
                    <div class='mt-4 d-block text-right'>
                        <button class='mr-2 btn btn-link btn-sm' id='hide'>Cancel</button>
                           <input type='submit' class='btn btn-warning edit-btn' name='edit-btn' value='Edit' />
                           <input type='submit' class='btn btn-success publish-btn' name='publish' value='Publish' />
                    </div>
                </form>
            </div>
            <!-- End of Publish/Update Post -->

            <div class="card-hover-shadow-2x mb-3 card justify-content-center">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Task List</div>
                </div>
                <div class="scroll-area-sm">
                    <perfect-scrollbar class="ps-show-limits">
                        <div style="position: static;" class="ps ps--active-y">
                            <div class="ps-content">
                                <ul class=" list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="todo-indicator bg-info"></div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2">
                                                    <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox2" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox2">&nbsp;</label></div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <table>
                                                        <?php foreach (loadTasks() as $task) { ?>
                                                            <tr>
                                                                <td>
                                                                    <div class='widget-heading'><?php echo $task['title'] ?></div>
                                                                    <div class='widget-subheading'><?php echo $task['author'] ?></div>
                                                                    <div class='widget-body'><?php echo $task['body'] ?></div>
                                                                </td>
                                                                
                                                                    <td>
                                                                        <div class='widget-actions widget-content-right'>
                                                                    </td>
                                                                    <form action='index.php' method='post'>
                                                                    <td><button class="border-0 btn-transition btn btn-outline-success"><i class="fa fa-check"></i></button></td>
                                                                    <td>
                                                                    <input type="button" class="order-0 btn-transition btn btn-outline-info" name="edit" value="Edit" id="edit" /></td>
                                                                    <td><button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i></button>
                                                        </form>
                                                </div>
                                                </td>
                                                
                                                </tr>
                                            <?php } ?>
                                            </table>
                                            </div>

                                        </div>
                            </div>
                            </li>
                            </ul>
                        </div>
                </div>
                </form>
                </perfect-scrollbar>
            </div>

            <div class="d-block text-right card-footer">
                <input type="button" class="btn btn-primary" name="add" value="Add Task" id="add" />
            </div>

        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#add").click(function() {
                $("#publishTask").removeClass("hidden");
                $(".edit-btn").addClass("hidden");
                $(".publish-btn").removeClass("hidden");
            });

            $("#edit").click(function() {
                $("#publishTask").removeClass("hidden");
                $(".edit-btn").removeClass("hidden");
                $(".publish-btn").addClass("hidden");
            });

            $("#hide").click(function() {
                $("#publishTask").addClass("hidden");
            });

        });
    </script>
</body>

</html>