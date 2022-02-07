<?php
    // Controller 
    include('./controllers/postController.php');
    include('./controllers/commentController.php');
    $postController = new postController();
    $commentController = new commentController();

    // Actions to select route
    $action = $_POST['action'] ?? $_GET['action'];

    // Routes
    if($action == 'publishPost'){
        $response = $postController->makePost($_POST['newPost_title'], $_POST['newPost_content']);
        echo(json_encode($response));
    }elseif ($action == 'getPosts') {
        $response = $postController->getPosts();
        echo(json_encode($response));
    }elseif ($action == 'publishComment') {
        $response = $commentController->makeComment($_POST['newComment_authorName'], $_POST['newComment_content'], $_POST['newComment_postId']);
        echo(json_encode($response));
    }