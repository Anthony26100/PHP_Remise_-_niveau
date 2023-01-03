<?php
$search_pages = filter_input(INPUT_GET, 'page', FILTER_DEFAULT);

    if($search_pages == 'contenu')
    {
        include 'pages/contenu.php';
    }
    elseif ($search_pages == 'footer')
    {
        include 'pages/footer.php';
    }
    elseif ($search_pages == 'header')
    {
        include 'pages/header.php';
    }
    else
    {
        include 'pages/error404.php';
    }
