<?php $this->layout('layout', ['title' => 'Homepage']) ?>

<?php

use \Tamtamchik\SimpleFlash\Flash;

$flash = new Flash();

//if (true) {
//    Flash::message('Hello world!');
//}


use JasonGrimes\Paginator;

$totalItems = $count;

$itemsPerPage = 3;
$currentPage = $_GET['page'] ?? 1;
$urlPattern = '?page=(:num)';

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

?>

<nav aria-label="Page navigation example">
<ul class="pagination">
    <?php if ($paginator->getPrevUrl()): ?>
        <li class="page-item"><a class="page-link" href="<?php echo $paginator->getPrevUrl(); ?>">&laquo; Previous</a></li>
    <?php endif; ?>

    <?php foreach ($paginator->getPages() as $page): ?>
        <?php if ($page['url']): ?>
            <li class="page-item"<?php echo $page['isCurrent'] ? 'class="active"' : ''; ?>>
                <a class="page-link " href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
            </li>
        <?php else: ?>
            <li class="page-item disabled"><span><?php echo $page['num']; ?></span></li>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if ($paginator->getNextUrl()): ?>
        <li class="page-item"><a class="page-link" href="<?php echo $paginator->getNextUrl(); ?>">Next &raquo;</a></li>
    <?php endif; ?>
</ul>
</nav>


<table class="table table2 table-striped table-hover table-bordered " data-sortlist="[[0,0],[2,0]]">
    <thead class="table-primary ">
    <tr>
        <th scope="col">Username</th>
        <th scope="col">E-mail</th>
        <th scope="col">Text task</th>
    </tr>
    </thead>
    <tbody>

<?php foreach ($items as $result): ?>
    <tr>
        <td><?php echo $result['username'];?></td>
        <td><?php echo $result['email'];?></td>
        <td><?php echo $result['task'];?></td>
    </tr>
<?php endforeach; ?>

    </tbody>
    </table>
<?php

echo flash()->display();

?>