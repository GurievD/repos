<?php

namespace Tag;

use DOMDocument;

class Doctype {

    static function get($type)
    {
        $html =  "<!DOCTYPE $type>";
        $document = new DOMDocument('1.0', 'utf-8');
        $document->loadHTML($html);

        return $html;
    }
}
