<?php

namespace entity;

class Entity
{
    public function troncateText(string $text, int $charNb = 300)
    {
        $output = '';
        $i = 0;
        while (isset($text[$i]) && (($i < $charNb) || ($text[$i] != ' '))) {
            $output .= $text[$i];
            $i++;
        }
        return $output . ' ...';
    }
}
