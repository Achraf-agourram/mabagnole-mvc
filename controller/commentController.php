<?php

class CommentController
{
    private CommentServiceInterface $commentService;

    public function __construct(CommentServiceInterface $commentService)
    {
        $this->commentService = $commentService;
    }

    public function addComment (): void
    {
        $comment = $_POST['comment'];
        $articleToComment = $_POST['addComment'];
        
        if(!$this->commentService->addComment($comment, $articleToComment, $connectedUser->id)) echo "comment failed to add, please try again";

    }

    public function editComment (): void
    {
        $commentToEdit = $this->commentService->findComment($_POST['editComment']);
        $editedComment = $_POST['editedComment'];

        if ($this->commentService->editComment($commentToEdit, $editedComment, $connectedUser->id)) echo "Comment edited";
    }

    public function removeComment (): void
    {
        $commentToDelete = $this->commentService->findComment($_POST['deleteComment']);

        if ($this->commentService->removeComment($commentToEdit, $connectedUser->id)) echo "Comment deleted";
    }
}

?>