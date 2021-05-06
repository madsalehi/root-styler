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

    public static function conf($config)
    {
        include "./root-styler/config.php";
        return $conf[$config];
    }

    public static function getLastModify($entity)
    {
        $timestamp = filemtime($entity);

        $strTime = array("second", "minute", "hour", "day", "month", "year");
        $length = array("60", "60", "24", "30", "12", "10");

        $currentTime = time();
        if ($currentTime >= $timestamp) {
            $diff = time() - $timestamp;
            for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
                $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            return $diff . " " . $strTime[$i] . "s ago ";
        }

    }

    public static function getFileType($file)
    {
        if (is_file($file)) {
            $parts = pathinfo($file);
            if (array_key_exists('extension', $parts)) {
                return $parts['extension'];
            }else{
                return 'bin';
            }
        } else {
            return 'dir';
        }

    }

    public static function getFileDescription($file)
    {
        $ext = self::getFileType($file);
        $descs = [
            'dir' => '-',
            'php' => 'PHP File',
            'js' => 'JavaScript File',
            'html' => 'HyperText Markup Language',
            'css' => 'CSS Style File',
            'scss' => 'Sass File',
            'sass' => 'Sass File',
            'txt' => 'Text File',
            'md' => 'Markdown File',
            'sql' => 'SQL File',
            'vue' => 'Vue File',
            'gitignore' => 'Git ignore File',
            'json' => 'JavaScript Object Notation',
        ];
        if (array_key_exists($ext, $descs)) {
            return $descs[$ext];
        } else {
            return 'A File';
        }
    }

    public static function getDirDescription($dir)
    {
        $dname = pathinfo($dir)['basename'];
        $descs = [
            '.idea' => 'JetBrains IDE configurations',
            '.git' => 'Git configurations',
            '.vscode' => 'Visual Studio Code configurations',
            'node_modules' => 'Nodejs libraries directory'
        ];
        if (array_key_exists($dname, $descs)) {
            return $descs[$dname];
        } else
            return '-';
    }

    public static function getFileSize($file)
    {
        if (is_file($file)) {
            $fileSize = filesize($file);
            isset($options['unit']) || $options['unit'] = 'byte';
            isset($options['standard']) || $options['standard'] = 'si';
            isset($options['width']) || $options['width'] = 'narrow';
            isset($options['prefix']) || $options['prefix'] = ' ';
            isset($options['round']) || $options['round'] = 2;

            $options['units'] = array(
                'byte' => array(
                    'singular' => array(
                        'narrow' => 'B',
                        'wide' => 'byte'
                    ),
                    'plural' => array(
                        'narrow' => 'B',
                        'wide' => 'bytes'
                    )
                ),
                'bit' => array(
                    'singular' => array(
                        'narrow' => 'bit',
                        'wide' => 'bit'
                    ),
                    'plural' => array(
                        'narrow' => 'bits',
                        'wide' => 'bits'
                    )
                )
            );

            $options['standards'] = array(
                'si' => array(
                    'narrow' => array(
                        "",
                        "K",
                        "M",
                        "G",
                        "T",
                        "P",
                        "E",
                        "Z",
                        "Y"
                    ),
                    'wide' => array(
                        "",
                        "kilo",
                        "mega",
                        "giga",
                        "tera",
                        "peta",
                        "exa",
                        "zetta",
                        "yotta"
                    )
                ),
                'iec' => array(
                    'narrow' => array(
                        "",
                        "Ki",
                        "Mi",
                        "Gi",
                        "Ti",
                        "Pi",
                        "Ei",
                        "Zi",
                        "Yi"
                    ),
                    'wide' => array(
                        "",
                        "kibi",
                        "mebi",
                        "gibi",
                        "tebi",
                        "pebi",
                        "exbi",
                        "zebi",
                        "yobi"
                    )
                )
            );

            switch ($options['unit'] = strtolower($options['unit'])) {
                case 'bit':
                case 'bits':
                case 'b':
                    $options['unit'] = 'bit';
                    break;
                default:
                    $options['unit'] = 'byte';
            }

            switch ($options['standard'] = strtolower($options['standard'])) {
                case 'i':
                case 'iec':
                    $options['standard'] = 'iec';
                    break;
                default:
                    $options['standard'] = 'si';
            }

            switch ($options['width'] = strtolower($options['width'])) {
                case 'w':
                case 'wide':
                    $options['width'] = 'wide';
                    break;
                default:
                    $options['width'] = 'narrow';
            }

            $factor = ($options['standard'] == 'si') ? 1000 : 1024;
            $i = 0;
            if ($options['unit'] == 'bit') {
                $fileSize *= 8;
            }

            while ($fileSize > $factor) {
                $fileSize /= $factor;
                $i++;
            }

            $fileSize = round($fileSize, $options['round']);
            $n = $fileSize == 0 || $fileSize == 1 ? 'singular' : 'plural';
            $humanizeSize = $fileSize . $options['prefix'] . $options['standards'][$options['standard']][$options['width']][$i] . $options['units'][$options['unit']][$n][$options['width']];

            return $humanizeSize;
        } else {
            return '-';
        }
    }

    public static function toJson($path = './')
    {
        $entities = [];
        $dirs = self::GetDirectories($path);
        $files = self::GetFiles($path);

        foreach ($dirs as $dir) {
            $entities[$dir]['name'] = $dir;
            $entities[$dir]['lastModify'] = self::getLastModify($dir);
            $entities[$dir]['description'] = self::getDirDescription($dir);
            $entities[$dir]['type'] = 'dir';
        }
        foreach ($files as $file) {
            $entities[$file]['name'] = $file;
            $entities[$file]['type'] = self::getFileType($file);
            $entities[$file]['size'] = self::getFileSize($file);
            $entities[$file]['lastModify'] = self::getLastModify($file);
            $entities[$file]['description'] = self::getFileDescription($file);
        }
        return json_encode($entities);
    }

    public static function getCustomBookmarks()
    {
        return self::conf('customBookmarks');
    }
}
