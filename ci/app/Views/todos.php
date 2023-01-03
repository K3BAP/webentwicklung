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