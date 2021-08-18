<?php $this->layout('layout', ['title' => 'Edit new tasks']) ?>

<?php d($results);?>

<form action="/edit_task" method="post">
    <div class="form-floating mb-3">
        <input hidden placeholder="<?= $results['id'] ?>" name="id" value="<?= $results['id'] ?>">

        <input type="text" class="form-control" id="floatingUsername" placeholder="<?= $results['username'] ?>" name="username">
        <label for="floatingUsername"><?= $results['username'] ?></label>
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="<?= $results['email'] ?>" name="email">
        <label for="floatingInput"><?= $results['email'] ?></label>
    </div>

    <div class="mb-3">
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here"
                      id="floatingTextarea2" style="height: 100px" name="task"></textarea>
            <label for="floatingTextarea2"><?= $results['task'] ?></label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Edit task</button>
</form>