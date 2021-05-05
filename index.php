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
   <div class="container" id="app">

   </div>
   <script src="./root-styler/assets/js/vue.js"></script>
   <script src="./root-styler/assets/js/bootstrap.bundle.min.js"></script>
   <script src="./root-styler/assets/js/app.js"></script>
</body>

</html>