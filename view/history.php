<?php ob_start(); ?>
<?php ini_set('display_errors', 1); ?>
<?php require('model/history.php') ?>
<?php $historyContent = selectAllHistory($_SESSION['user_id']); ?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Start Date</th>
        <th scope="col" class="position-relative">Action
            <button type="button" style="position: absolute; right: 10px; top: 5px " class="btn btn-danger "
                    data-toggle="modal" data-target="#exampleModal">
                Delete all
            </button>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($historyContent as $content):?>
        <tr>
            <th scope="row"><?= Media::getMediaById($content['media_id'])['title']; ?></th>
            <td><?= $content['start_date'] ?></td>
            <td><a class="btn btn-danger" href="view/deleteHistory.php?id=<?= $content['id'] ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete all?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="view/deleteHistory.php?deleteAll=all">YES</a>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('dashboard.php'); ?>


