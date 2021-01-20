<?php


class Redirect {
    public static function redirectTo($url = null) {
        if ($url === null) {
            $url = 'index.php';
            $link = 'Homepage';
        }
        header("Location:$url");
        exit();
    }
}