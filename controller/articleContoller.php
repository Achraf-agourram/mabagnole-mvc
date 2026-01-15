<?php

class ArticleController
{
    private ArticleServiceInterface $articleService;
    private TagServiceInterface $tagService;

    public function __construct(ArticleServiceInterface $articleService, TagServiceInterface $tagService)
    {
        $this->articleService = $articleService;
        $this->tagService = $tagService;
    }

    public function addArticle (): void
    {
        $title = $_POST['title'];
        $image = $_FILES['image']['name'];
        $tags = $_POST['tags'];
        $content = $_POST['paragraph'];
        $theme = $_POST['theme'];

        if ($tags)
        {
            $tags = explode(" ", str_replace("#", "", $tags));
            foreach($tags as $tag) if (!$this->tagService->existTag($tag)) $this->tagService->addTag($tag);

        }else $tags = null;

        if ($this->articleService->addArticle($title, $image, $tags, $content, $theme, $connectedUser->id)) echo "Article added successfully, wait until our support approuve it";
        else echo "Adding article failed, please try again";
    }

    public function editArticle (): void
    {
        $title = $_POST['title'];
        $image = $_FILES['image']['name'];
        $tags = $_POST['tags'];
        $content = $_POST['paragraph'];
        $theme = $_POST['theme'];
        $articleToEdit = $this->articleService->getArticleById($_GET['edit']);

        if ($tags)
        {
            $tags = explode(" ", str_replace("#", "", $tags));
            foreach($tags as $tag) if (!$this->tagService->existTag($tag)) $this->tagService->addTag($tag);

        }else $tags = null;

        if ($this->articleService->editArticle($articleToEdit, $title, $image, $tags, $content, $theme, $connectedUser->id))
        {
            echo "edited successfully, wait until admin approuve it";
            header("location: explore.php");
            exit;

        }else echo "unable to edit this article, please try again later";
    }

    public function removeArticle (): void
    {
        $articleToRemove = $this->articleService->getArticleById($_GET['deleteArticle']);

        if($this->articleService->removeArticle($articleToRemove, $connectedUser->id)) echo "article deleted successfully";

        header("location: explore.php");
        exit;

    }

    function showArticle (): void
    {
        $article = $this->articleService->getArticleById($_GET['showArticle']);
        require_once "sections/viewArticleSection.php";
    }
}

?>