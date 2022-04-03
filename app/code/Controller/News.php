<?php

namespace Controller;

use Core\ControllerAbstract;

class News extends ControllerAbstract
{
    public function show(string $slug)
    {
        $new = new \Model\News();
        $new->loadBySlug($slug);
        echo $this->twig->render('news/single.html', ['new' => $new]);
    }

    public function index()
    {
        $newsObj = new \Model\News();
        $news = $newsObj->getAllArticles();
        foreach ($news as &$new) {
            $new["short_content"] = mb_strimwidth($new["content"], 0, 100, "...");
        }
        echo $this->twig->render('news/all.html', ['news' => $news]);
    }
}
