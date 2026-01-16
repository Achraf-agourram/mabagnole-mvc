<?php

class ArticleService implements ArticleServiceInterface
{
    private ArticleRepository $articleRepository;
    private TagServiceInterface $tagService;

    public function __construct(ArticleRepository $articleRepository, TagServiceInterface $tagService)
    {
        $this->articleRepository = $articleRepository;
        $this->tagService = $tagService;
    }

    public function addArticle(string $title, string $image, ?array $tags, string $paragraph, int $idTheme, int $idClient): bool
    {
        try
        {
            if ($image) {
                move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
            } else {
                $image = "unavailable.png";
            }

            $this->articleRepository->insert($title, $image, $paragraph, $idTheme, $idClient);

            $articleId = $this->articleRepository->getLastArticle();

            if ($tags) {
                foreach ($tags as $tag) {
                    $tagId = $this->tagService->getTagId($tag);
                    $this->articleRepository->linkArticleWithTag($articleId, $tagId);
                }
            }

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function editArticle(Article $article, string $title, string $image, ?array $tags, string $paragraph, int $idTheme, int $connectedUserId): bool
    {
        try {
            if ($connectedUserId != $article->idClient) {
                return false;
            }

            if ($image) {
                move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
            } else {
                $image = "unavailable.png";
            }

            $this->articleRepository->update($article->articleId, $title, $image, $paragraph, $idTheme);

            $this->articleRepository->removeLink($article->articleId);

            if ($tags) {
                foreach ($tags as $tag) {
                    $tagId = $this->tagService->getTagId($tag);
                    $this->articleRepository->linkArticleWithTag($articleId, $tagId);
                }
            }

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function approuveArticle(Article $article): bool
    {
        try {
            $this->articleRepository->approve($article->articleId);
            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function removeArticle(Article $article, int $connectedUserId): bool
    {
        try {
            if ($connectedUserId != $article->idClient) {
                return false;
            }

            $this->articleRepository->remove($article->articleId);
            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function getArticleById(int $id): object
    {
        $article = $this->articleRepository->findById($id);
        return $this->tagService->linkTagsWithArticles([$article])[0];
    }

    public function getAllArticles(): array
    {
        $articles = $this->articleRepository->findAll();
        return $this->tagService->linkTagsWithArticles($articles);
    }

    public function getArticlesOnTheme(int $idTheme): array
    {
        $articles = $this->articleRepository->findByTheme($idTheme);
        return $this->tagService->linkTagsWithArticles($articles);
    }

    public function getArticlesOnTag(int $idTag): array
    {
        $articleIds = $this->articleRepository->getOnTag($idTag);

        $articles = [];
        foreach ($articleIds as $row) {
            $articles[] = $this->getArticleById($row->article_id);
        }

        return $articles;
    }

    public function searchArticle(string $title): array
    {
        $articles = $this->articleRepository->search($title);
        return $this->tagService->linkTagsWithArticles($articles);
    }
}

?>