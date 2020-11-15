<?php

# PREPARED STATEMENTS (prepare & execute)

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
                        <button class='mr-2 btn btn-link btn-sm'>Cancel</button>
                        <input type='submit' class='btn btn-success' name='publish' value='Publish' />
                    </div>
                    <?php 
                    
                    $title = $_POST['title'];
                    $body = $_POST['body'];
                    $author = $_POST['author'];
                    publishTask($title, $body, $author);

                    ?>
            </div>
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
                                        <div class="todo-indicator bg-warning"></div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2">
                                                    <div class="custom-checkbox custom-control"> <input class="custom-control-input" id="exampleCustomCheckbox12" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label> </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Call Sam For payments <div class="badge badge-danger ml-2">Rejected</div>
                                                    </div>
                                                    <div class="widget-subheading"><i>By Bob</i></div>
                                                </div>
                                                <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button> </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="todo-indicator bg-focus"></div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2">
                                                    <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox1" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox1">&nbsp;</label></div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Make payment to Bluedart</div>
                                                    <div class="widget-subheading">
                                                        <div>By Johnny <div class="badge badge-pill badge-info ml-2">NEW</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button> </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="todo-indicator bg-primary"></div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2">
                                                    <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox4" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox4">&nbsp;</label></div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Office rent </div>
                                                    <div class="widget-subheading">By Samino!</div>
                                                </div>
                                                <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button> </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="todo-indicator bg-info"></div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2">
                                                    <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox2" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox2">&nbsp;</label></div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Office grocery shopping</div>
                                                    <div class="widget-subheading">By Tida</div>
                                                </div>
                                                <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button> </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="todo-indicator bg-success"></div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2">
                                                    <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox3" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox3">&nbsp;</label></div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Ask for Lunch to Clients</div>
                                                    <div class="widget-subheading">By Office Admin</div>
                                                </div>
                                                <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button> </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="todo-indicator bg-success"></div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2">
                                                    <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox10" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox10">&nbsp;</label></div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Client Meeting at 11 AM</div>
                                                    <div class="widget-subheading">By CEO</div>
                                                </div>
                                                <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button> </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </perfect-scrollbar>
                </div>
                <form method="post">
                    <div class="d-block text-right card-footer">
                        <input type="submit" class="btn btn-primary" name="add" value="Add Task" id="add" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <?php
    if ($_POST['publish']) {
        // INSERT DATA
        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];

        $sql = 'INSERT INTO tasks(title, body, author) VALUES(:title, :body, :author)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
    }
    ?>
    <script>
        $(document).ready(function() {
            $("#add").click(function() {
                $("#publishTask").removeClass("hidden");
            });
        });
    </script>
</body>

</html>