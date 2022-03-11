<?php
namespace GildedRose;

class BrieAger extends Ager {
    public function getPriority() {
        return 20;
    }

    public function shouldProcessItem(Item $item) {
        return $item->name == "Aged Brie";
    }

    public function updateQuality(Item $item) {
        if($item->sell_in > 0) {
            $item->quality += 1;
        }
        else {
            $item->quality += 2;
        }
    }
}