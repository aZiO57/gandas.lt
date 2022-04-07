<?php

namespace Controller;

use Core\ControllerAbstract;
use Model\Collections\News;
use Service\GetNewsFromApi\WebitNews;

class Api extends ControllerAbstract
{

    public function getall()
    {

        $obj = new WebitNews();
        $obj->exec();
    }
}
