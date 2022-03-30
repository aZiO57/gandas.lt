<?php

namespace Controller;

use Core\ControllerAbstract;

class News extends ControllerAbstract
{
    public function show(string $slug)
    {
        $new = new \Model\News();
        $new->loadBySlug($slug);
        echo $this->twig->render('single.html', ['new' => $new]);
    }


    public function showArticles(string $slug)
    {
        $new = new \Model\News();
    }
}