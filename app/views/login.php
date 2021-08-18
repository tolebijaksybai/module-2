<?php $this->layout('layout', ['title' => 'Add new tasks']) ?>

<form action="/login_check" method="post">

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
    </div>

    <button type="submit" class="btn btn-primary">Login in</button>
</form>