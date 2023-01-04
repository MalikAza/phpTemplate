<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Website Name</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/">Website Name</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item <?php echo !isset($_GET['page'])?'active':'' ?>">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item <?php echo $_GET['page']=='page2'?'active':'' ?>">
                        <a class="nav-link" href="?page=page2">Page 2</a>
                    </li>
                    <li class="nav-item <?php echo $_GET['page']=='page3'?'active':'' ?>">
                        <a class="nav-link" href="?page=page3">Page 3</a>
                    </li>
                    <li class="nav-item <?php echo $_GET['page']=='contact'?'active':'' ?>">
                        <a class="nav-link" href="?page=contact">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>