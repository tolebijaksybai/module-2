<?php $this->layout('layout', ['title' => 'Add new tasks']) ?>

<form action="/add_task" method="post">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingUsername" placeholder="Username" name="username">
        <label for="floatingUsername">Username</label>
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
    </div>

    <div class="mb-3">
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here"
                      id="floatingTextarea2" style="height: 100px" name="task"></textarea>
            <label for="floatingTextarea2">Task</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Add task</button>
</form>