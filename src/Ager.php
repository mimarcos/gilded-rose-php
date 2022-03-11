<?php

declare(strict_types=1);

namespace GildedRose;

abstract class Ager {
    protected abstract function shouldProcessItem(Item $item);
    protected abstract function updateQuality(Item $item);

    public function processItem(Item $item) {
        if($this->shouldProcessItem($item)) {
            $this->updateQuality($item);
            $this->checkQualityMinBounds($item);
            $this->checkQualityMaxBounds($item);
            $this->ageItem($item);
            return True;
        }
        return False;
    }

    protected function checkQualityMinBounds(Item $item) {
        if($item->quality < 0) {
            $item->quality = 0;
        }
    }

    protected function checkQualityMaxBounds(Item $item) {
        if($item->quality > 50) {
            $item->quality = 50;
        }
    }

    public function getPriority()  {
        return 30;
    }

    protected function ageItem(Item $item) {
        $item->sell_in -= 1;
    }
}