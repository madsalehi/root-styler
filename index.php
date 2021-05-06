<?php

$dir = __DIR__;
$file = './root-styler/RootStyler.php';
if (file_exists($file)) {
    include $file;
}

?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="./root-styler/assets/css/app.css">
    <title>Localhost Root Folder</title>
</head>

<body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">About RootStyler</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                RootStyler is a clean user interface for localhost. It uses PHP for getting files and folders.
                <br/>
                It's free and open-source. <br/>
                Github repo: <a
                        href="https://github.com/ghambale/root-styler">https://github.com/ghambale/root-styler</a><br/>
                Author: <a href="http://github.com/ghambale/">Mohammad Salehi</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="app">
    <header id="header">
        <div class="container">
            <div class="header-inner">
                <div id="brand">
                    <h2>RootStyler</h2>
                    <p>You are in Localhost!</p>
                </div>
                <a href="#" id="about-link" data-bs-toggle="modal" data-bs-target="#exampleModal">About</a>
            </div>

        </div>
    </header>
    <div class="container">
        <section id="search-wrapper">
            <input type="text" placeholder="Type here to search..." v-model="search">
        </section>
        <section id="custom-links">
                <?php
                $items = RS::getCustomBookmarks();
                ?>
            <ul>
                <?php
                foreach ($items as $item) {
                    ?>
                    <li><a href="<?php echo $item['url'] ?>" target="_blank">
                            <?php echo $item['title']; ?>
                        </a></li>
                <?php
                }
                ?>
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
                <tr v-for="entity in filteredList">
                    <td>
                        <img :src="`./root-styler/assets/img/${entity.type}.svg`" class="img-icon" alt="">
                        <a :href="'./'+entity.name">
                            {{ entity.name }}
                        </a>
                    </td>
                    <td>
                        {{ entity.lastModify }}
                    </td>
                    <td>
                        {{ entity.size }}
                    </td>
                    <td>
                        {{ entity.description }}
                    </td>
                </tr>

                </tbody>
            </table>
        </section>
        <p class="text-center" style="margin-top:20px;">
            You are using
            <?php echo apache_get_version(); ?>
        </p>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>

<script src="./root-styler/assets/js/vue.js" async></script>
<script src="./root-styler/assets/js/app.js" async></script>
<script>
    var fetchedData =
        <?php
        echo RS::toJson($dir);
        ?>
    ;
    for (x in fetchedData) {
        entities.push(fetchedData[x]);
    }
</script>
</body>

</html>