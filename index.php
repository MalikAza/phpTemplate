<?php
if (isset($_GET['page'])) {
    if ($_GET['page'] == 2) {
        include_once './pages/page2.php';
    } elseif ($_GET['page'] == 3) {
        include_once './pages/page3.php';
    } else {
        include_once './pages/notfound.php';
    }
} else {
    include_once './pages/home.php';
}
