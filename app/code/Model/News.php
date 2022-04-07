<?php

declare(strict_types=1);

namespace Model;

use Core\ModelAbstract;

class News extends ModelAbstract
{
    const TABLE = 'news';

    private string $title;

    private string $content;

    private int $authorId;

    private int $active;

    private int $views;

    private string $slug;

    private string $image;

    private string $createdAt;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }
    /**
     * @param int $authorId
     */
    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }
    /**
     * @return int
     */
    public function getActive(): int
    {
        return $this->active;
    }
    /**
     * @param int $active
     */
    public function setActive(int $active): void
    {
        $this->active = $active;
    }

    public function getViews(): int
    {
        return $this->views;
    }
    /**
     * @param int $views
     */
    public function setViews(int $views): void
    {
        $this->views = $views;
    }
    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }
    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }
    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function loadBySlug(string $slug): ?News
    {
        $sql = $this->select();
        $sql->cols(['*'])->from('news')->where('slug = :slug');
        $sql->bindValue('slug', $slug);
        if ($rez = $this->db->get($sql)) {
            $this->id = (int)$rez['id'];
            $this->title = $rez['title'];
            $this->content = $rez['content'];
            $this->authorId = (int)$rez['author_id'];
            $this->createdAt = $rez['created_at'];
            $this->active = (int) $rez['active'];
            $this->views = (int) $rez['views'];
            $this->slug = $rez['slug'];
            $this->image = $rez['image'];
            return $this;
        } else {
            return null;
        }
    }
    public function load($id): ?News
    {
        $sql = $this->select();
        $sql->cols(['*'])->from('news')->where('id = :id');
        $sql->bindValue('id', $id);
        if ($rez = $this->db->get($sql)) {
            $this->id = (int)$rez['id'];
            $this->title = $rez['title'];
            $this->content = $rez['content'];
            $this->authorId = (int)$rez['author_id'];
            $this->createdAt = $rez['created_at'];
            $this->active = (int)$rez['active'];
            $this->views = (int)$rez['views'];
            $this->slug = $rez['slug'];
            $this->image = $rez['image'];
            return $this;
        } else {
            return null;
        }
    }
    public function assignData(): void
    {
        $this->data = [
            'title' => $this->title,
            'content' => $this->content,
            'author_id' => $this->authorId,
            'active' => $this->active,
            'views' => $this->views,
            'slug' => $this->slug,
            'image' => $this->image
        ];
    }
}
