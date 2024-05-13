<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//ENhttp://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/3-music/viewer.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php
$shuffle = isset($_GET['shuffle']) && $_GET['shuffle'] === 'on';
$bysize = isset($_GET['bysize']) && $_GET['bysize'] === 'on';
?>
<div id="header">
    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
    <a href="music.php">Go back to the original list.</a>
</div>
<div id="listarea">
    <ul id="musiclist">
        <?php
        if (isset($_REQUEST["playlist"])) {
            $playlist = $_REQUEST["playlist"];
            $playlistContent = file($playlist, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($playlistContent as $mp3File) {
                $fileName = basename($mp3File);
                $fileSize = filesize($mp3File);
            }
        } else {
            $mp3Files = glob("*.mp3");
            if ($bysize) {
                usort($mp3Files, function ($a, $b) {
                    return filesize($b) - filesize($a);
                });
            }
            if ($shuffle) {
                shuffle($mp3Files);
            }

            foreach ($mp3Files as $mp3File) {
                $fileName = basename($mp3File);
                $fileSize = filesize($mp3File);

                ?>
                <li class="mp3item">
                    <a href="<?= $mp3File ?>"><?= $fileName ?></a>
					
					<?php

            if ($fileSize < 1024) {
                $fileSize = $fileSize . " b";
            } elseif ($fileSize < 1048576) {
                $fileSize = round($fileSize / 1024, 2) . " kb";
            } else {
                $fileSize = round($fileSize / 1048576, 2) . " mb";
            }
					
		        ?>(<?= $fileSize ?>)
                </li>
                <?php
            }
            $txtfiles = glob("*.txt");
            sort($txtfiles);

            foreach ($txtfiles as $txtfile) {
                $playlistName = basename($txtfile);
                ?>
                <li class="playlistitem">
                    <a href="<?= $txtfile ?>"><?= $playlistName ?></a>
                </li>
                <?php
            }
        }
        ?>
    </ul>
</div>
</body>
</html>
