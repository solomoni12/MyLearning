<?php

include 'Post.php';
include 'User.php';
include 'Comment.php';


$user = new User("solomon mwalupani");
$post = new Post('sample post','This sample for post content');
$comment = new Comment($user, 'Great post');


echo "post title: " .$post->getTitle() . "<br>";
echo "post content: " .$post->getContent() . "<br>";
echo "commented by: " .$comment->getUser()->getUsername() . "<br>";
echo "comment content: " .$comment->getContent() . "<br>";