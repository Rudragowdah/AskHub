<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-navbar">
        <div class="container">
            <a class="navbar-brand" href="./"><img height="30" src="./public/logo.png" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Home</a>
                    </li>
                    <?php 
                        if(isset($_SESSION['user']['username'])){?>
                            <li class="nav-item">
                        <a class="nav-link" href="./server/request.php?logout=true">Logout (<?php echo ucfirst($_SESSION['user']['username']) ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?ask=true">Ask A Question</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?u_id=<?php echo $_SESSION['user']['user_id'] ?>">My Questions</a>
                    </li>
                    <?php    }
                    ?>
                    <?php 
                        if(!isset($_SESSION['user']['username'])){?>
                            <li class="nav-item">
                                <a class="nav-link" href="?login=true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?signup=true">SignUp</a>
                            </li>
                    <?php    }
                    ?>
                    <!-- <li class="nav-item">
                        <a class="nav-link">Category</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="?latest=true">Latest Questions</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search Questions" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</body>
</html>