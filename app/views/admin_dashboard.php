<?php $this->layout('layout', ['title' => 'Admin Dashborad']) ?>

    <a href="/admin_logout" class="btn btn-primary mb-3" type="submit">Logout</a>

    <table class="table table2 table-striped table-hover table-bordered " data-sortlist="[[0,0],[2,0]]">
        <thead class="table-primary ">
        <tr>
            <th scope="col">Username</th>
            <th scope="col">E-mail</th>
            <th scope="col">Text task</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($results as $result): ?>
            <tr>
                <td><?php echo $result['username'];?></td>
                <td><?php echo $result['email'];?></td>
                <td><?php echo $result['task'];?></td>
                <td><a href="edit/<?= $result['id'];?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
<?php

?>