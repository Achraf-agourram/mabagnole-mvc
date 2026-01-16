<?php

class CommentService implements CommentServiceInterface
{
    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function addComment(string $commentText, int $idArticle, int $idClient): bool
    {
        try {
            $this->commentRepository->insert($commentText, $idArticle, $idClient);
            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function editComment(Comment $comment, string $commentText, int $connectedUserId): bool
    {
        try {
            if ($connectedUserId != $comment->idClient) {
                return false;
            }

            $this->commentRepository->update($commentText, $comment->commentId);
            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function removeComment(Comment $comment, int $connectedUserId): bool
    {
        try {
            if ($connectedUserId != $comment->idClient) {
                return false;
            }

            $this->commentRepository->remove($comment->commentId);
            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function findComment(int $id): ?Comment
    {
        $result = $this->commentRepository->findById($id);

        if (!$result) {
            return null;
        }

        $comment = $result[0];

        return new Comment($comment->commentId, $comment->commentText, $comment->idArticle, $comment->idClient);
    }

    public function getComments($idArticle): array
    {
        return $this->commentRepository->get($idArticle);
    }

    public function getCommentsTotalOfArticle($idArticle): int
    {
        $result = $this->commentRepository->getTotal($idArticle);
        return $result[0]->total;
    }
}
