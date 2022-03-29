<?php

namespace Controller;

use Core\ModelAbstract;

class News

{
    public function show($slug)
    {
        echo 'Cia bus logika, kuri uzkrovines straipsni';
        echo 'kurio slog <b>.' . $slug . '</b>';
    }
}
