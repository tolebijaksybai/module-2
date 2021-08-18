<html>
<head>
    <title><?= $this->e($title)?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Homepage</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin_login">Admin login</a>
                </li>

            </ul>

            <a href="/add_page" class="btn btn-primary" type="submit">Add task</a>

        </div>
    </div>
</nav>

    <div class="container pt-5">
        <?= $this->section('content')?>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.15/js/jquery.tablesorter.min.js"></script>

<script>
    $(function() {

        // initial sort set using sortList option
        $(".table1").tablesorter({
            theme : 'blue',
            // sort on the first column and second column in ascending order
            sortList: [[0,0],[1,0]]
        });

        // initial sort set using data-sortlist attribute (see HTML below)
        $(".table2").tablesorter({
            theme : 'blue'
        });

    });
</script>

</body>
</html>