<?php

interface CommentServiceInterface
{
    public function addComment(string $commentText, int $idArticle, int $idClient): bool;

    public function editComment(Comment $comment, string $commentText, int $connectedUserId): bool;

    public function removeComment(Comment $comment, int $connectedUserId): bool;

    public function findComment($id): ?Comment;

    public function getComments($idArticle): array;

    public function getCommentsTotalOfArticle($idArticle): int;
}

?>