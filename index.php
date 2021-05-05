<?php
$file = './root-styler/RootStyler.php';
if (file_exists($file)) {
    include $file;
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./root-styler/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./root-styler/assets/css/app.css">
    <title>Localhost Root Folder</title>
</head>

<body>
<div id="app">
    <header id="header">
        <div class="container">
            <div class="header-inner">
                <div id="brand">
                    <h2>RootStyler</h2>
                    <p>You are in Localhost!</p>
                </div>
                <a href="#" id="about-link">About</a>
            </div>

        </div>
    </header>
    <div class="container">
        <section id="search-wrapper">
            <input type="text" placeholder="Type here to search...">
        </section>
        <section id="custom-links">
            <ul>
                <li><a href="">localhost:8000</a></li>
                <li><a href="">phpMyAdmin</a></li>
            </ul>
        </section>
        <section id="table-wrapper">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Last modified</th>
                    <th scope="col">Size</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                        <td><img src="./root-styler/assets/img/directory.svg" class="img-icon" alt="">
                            <a href="">
                            packages/
                            </a>
                        </td>
                        <td>3 days ago</td>
                        <td>-</td>
                        <td></td>
                </tr>
                <tr>
                    <td>
                        <img src="./root-styler/assets/img/php.svg" class="img-icon" alt="">
                        <a href="">
                        app.php
                        </a>
                    </td>
                    <td>3 days ago</td>
                    <td>2.3K</td>
                    <td>PHP File</td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>

</div>
<script src="./root-styler/assets/js/vue.js"></script>
<script src="./root-styler/assets/js/bootstrap.bundle.min.js"></script>
<script src="./root-styler/assets/js/app.js"></script>
</body>

</html>