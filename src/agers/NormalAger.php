<?php
namespace GildedRose;

class NormalAger implements Ager {
    public function getPriority() {
        return 30;
    }

    public function shouldProcessItem(Item $item) {
        return True;
    }

    public function processItem(Item $item) {
        if($item->sell_in > 0) {
            $item->quality -= 1;
        }
        else {
            $item->quality -= 2;
        }
    }
}