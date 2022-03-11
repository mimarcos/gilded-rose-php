<?php
namespace GildedRose;

class BackstagePassAger extends Ager {
    public function getPriority() {
        return 10;
    }

    public function shouldProcessItem(Item $item) {
        return str_starts_with($item->name, "Backstage pass");
    }

    public function updateQuality(Item $item) {
        if($item->sell_in > 10) {
            $item->quality += 1;
        }
        else if($item->sell_in > 5) {
            $item->quality += 2;
        }
        else if($item->sell_in > 0) {
            $item->quality += 3;
        }
        else {
            $item->quality = 0;
        }
    }
}