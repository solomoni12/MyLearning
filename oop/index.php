<?php

    include 'Post.php';
    include 'User.php';
    include 'Comment.php';


    $user = new User("solomon mwalupani");
    $post = new Post('sample post','This sample for post content');
    $comment = new Comment($user, 'Great post');



    // display content
    echo "Post title: " .$post->getTitle() . "<br>";
    echo "Post content: " .$post->getContent() . "<br>";
    echo "Commented by: " .$comment->getUser()->getUsername() . "<br>";
    echo "Comment content: " .$comment->getContent() . "<br>";

?>