<?php require_once('./common/database.php'); ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Todos</title>
    <link href="https://unpkg.com/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" />
</head>
<body>
<div class="container-fluid">
    <?php
    $heading_text = "Aufgabenplaner: Todos (Aktuelles Projekt)";
    require("./common/heading.php");
    ?>
    <div class="row">
        <?php require("./common/sidebar.php"); ?>
        <div class="col-10">
            <div class="row">
                <?php if(isset($reiter)): foreach ($reiter as $item): ?>
                <div class="col-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <?php echo(isset($item) ? $item['name'] : ''); ?>:
                        </div>
                        <div class="list-group list-group-flush">
                            <?php if (isset($aufgaben)): foreach ($aufgaben as $task): ?>
                            <?php if ($item['name'] == $task['reiter']): ?>

                            <div class="list-group-item"><?php echo($task['name'] . " (" . $task['zustaendig'] . ")")?></div>

                            <?php endif; endforeach; endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>