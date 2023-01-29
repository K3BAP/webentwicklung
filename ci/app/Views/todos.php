<div class="col-8">
    <div class="row">
        <?php if(isset($reiter)): foreach ($reiter as $item): ?>
        <div class="col-4">
            <div class="card mb-4">
                <div class="card-header">
                    <?php echo(isset($item) && isset($item['reiterName']) ? $item['reiterName'] : ''); ?>:
                </div>
                <div class="list-group list-group-flush">
                    <?php if (isset($aufgaben)): foreach ($aufgaben as $task): ?>
                    <?php if ($item['reiterId'] == $task['aufgabeReiterId']): ?>

                    <div class="list-group-item"><?php echo($task['aufgabeName'] . " (" . "zuständig" . ")")?></div>

                    <?php endif; endforeach; endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>
</div>