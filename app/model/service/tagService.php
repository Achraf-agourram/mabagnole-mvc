<?php

class TagService implements TagServiceInterface
{
    private tagRepository $tagRepository;

    public function __construct(tagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function addTag(string $tagTitle): void
    {
        if (!$this->existTag($tagTitle)) $this->tagRepository->insert($tagTitle);
    }

    public function editTag(Tag $tag, $tagTitle): void
    {
        $this->tagRepository->update($tagTitle, $tag->tagId);
    }

    public function removeTag(Tag $tag): void
    {
        $this->tagRepository->remove($tag->tagId);
    }

    public function getTags(): array
    {
        return $this->tagRepository->get();
    }

    public function getTagsByArticle(int $articleId): array
    {
        return $this->tagRepository->getByArticle($articleId);
    }

    public function existTag(string $tag): bool
    {
        $tag = $this->tagRepository->exist($tag);
        if ($tag) return true;
        else return false;
    }

    public function getTagId(string $tag): int
    {
        $result = $this->tagRepository->getId($tag);
        return $result[0]->tagId;
    }

    public function linkTagsWithArticles(array $articles): array
    {
        foreach ($articles as $article) {
            $article->tags = $this->getTagsByArticle($article->articleId);
        }
        return $articles;
    }
}
