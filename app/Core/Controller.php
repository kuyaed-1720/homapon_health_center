<?php
class Controller
{
    public function view($view, $data = [])
    {
        $filename = "../app/Views/" . $view . ".php";
        if (file_exists($filename)) {
            extract($data);
            require "../app/Views/partials/html-head.php";
            if (isset($_SESSION['user_id'])) {
                require "../app/Views/partials/sidebar.php";
            }
            require $filename;
            require "../app/Views/partials/html-foot.php";
        } else {
            die("View not found!");
        }
    }
}
