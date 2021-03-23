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
        if ($i < strlen($text)) {
            $output .= ' ...';
        }
        return $output;
    }

    public function getIndexinArrayWithId(array $products, $id)
    {
        $i = 0;
        foreach ($products as $product) {
            if ($product->id_p == $id) {
                return $i;
            }
            $i++;
        }
        return FALSE;
    }
}
