<?php

class RS
{
   public static function GetDirectories($dir = "./")
   {
      $dirs = [];
      $items = scandir($dir);
      foreach ($items as $item) {
         if (is_dir($item)) {
            $dirs[] = $item;
         }
      }
      $appSlug = 'root-styler';
      // here should check configs
      if (self::conf('showScriptFolder')) {
         $filters = ['..', '.'];
      } else {
         $filters = ['..', '.', $appSlug];
      }
      $dirs = array_diff($dirs, $filters);
      natcasesort($dirs);
      return $dirs;
   }
   public static function GetFiles($dir = "./")
   {
      $files = [];
      $items = scandir($dir);
      foreach ($items as $item) {
         if (is_file($item)) {
            $files[] = $item;
         }
      }
      natcasesort($files);
      return $files;
   }
   public static function GetDirectoryMTime($dir)
   {
      $time = filemtime($dir);
      echo date("Y/m/d - H:i:s", $time);
   }
   public static function GetFileSize($file_path)
   {
      $size = filesize($file_path);
      return self::FormatFileSize($size);
   }
   private static function FormatFileSize($bytes, $decimals = 2)
   {
      $sz = 'BKMGTP';
      $factor = floor((strlen($bytes) - 1) / 3);
      return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
   }
   public static function conf($config)
   {
      include "./root-styler/config.php";
      return $conf[$config];
   }
}
