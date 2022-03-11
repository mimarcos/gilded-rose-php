<?php
namespace GildedRose;

class NormalAger extends Ager {
    public function shouldProcessItem(Item $item) {
        return True;
    }

    public function updateQuality(Item $item) {
        if($item->sell_in > 0)
        {
            $item->quality -= 1;
        }
        else
        {
            $item->quality -= 2;
        }
    }
}