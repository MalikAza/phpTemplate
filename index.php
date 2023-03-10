<?php
// header
include_once 'header.php';
// main content
if (isset($_GET['page'])) {
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($page == 'page2') {
        include_once './pages/page2.php';
    } elseif ($page == 'page3') {
        include_once './pages/page3.php';
    } elseif ($page == 'contact') {
        include_once './pages/contact.php';
    } else {
        include_once './pages/notfound.php';
    }
} else {
    include_once './pages/home.php';
}
// footer
include_once 'footer.php';
