<?php
$file = './root-styler/RootStyler.php';
if (file_exists($file)) {
   include $file;
}

?>
<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" href="./root-styler/assets/app.css">
   <title>Localhost Root Folder</title>
</head>

<body>
   <div class="container" id="app">
      <?php
      if (RS::conf('showPageTitle')) { ?>
         <div class="page-title">
            <h3>You are in Localhost!</h3>
            <p>You are using <?php echo $_SERVER['SERVER_SOFTWARE']; ?> on <?php
                                                                           echo gethostname();
                                                                           ?>
            </p>
            <p style="font-size:13px;">
               Powered by
               <a href="https://github.com/ghambale/root-styler/" target="_blank">RootStyler</a>
            </p>
            <?php

            ?>
         </div>
      <?php } ?>


      <section id="dirs-container">
         <p class="section-title">Folders</p>
         <div id="dirs">
            <?php
            $path = dirname(__FILE__);
            $dirs = RS::GetDirectories($path);
            foreach ($dirs as $dir) {
               echo '<a href="' . $dir . '" class="dir">'; ?>
               <div class="icon-folder"></div>
               <span class="dirname">
                  <?php
                  echo $dir;
                  echo '</span>'; ?>
                  <span class="dir-last-modified">
                     <?php
                     echo RS::GetDirectoryMTime($dir);

                     ?>
                  </span>
                  </a>
               <?php
            }
               ?>
         </div>
      </section>
      <section id="files-container">
         <p class="section-title">Files</p>
         <div id="files">
            <?php
            $path = dirname(__FILE__);
            $files = RS::GetFiles($path);
            foreach ($files as $file) {
               echo '<a href="' . $file . '" class="dir">'; ?>
               <div class="icon-file"></div>
               <span class="dirname">
                  <?php
                  echo $file;
                  echo '</span>'; ?>
                  <span class="dir-last-modified">
                     <?php
                     echo RS::GetDirectoryMTime($file);
                     ?>
                  </span>
                  <span class="file-size">
                     Size:
                     <?php
                     echo RS::GetFileSize($file);
                     ?>
                  </span>
                  </a>
               <?php
            }
               ?>
         </div>
      </section>
   </div>
   <script src="./root-styler/assets/js/vue.js"></script>
   <script src="./root-styler/assets/js/app.js"></script>
</body>

</html>