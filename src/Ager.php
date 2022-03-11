<?php

declare(strict_types=1);

namespace GildedRose;

abstract class Ager {
    protected abstract function shouldProcessItem(Item $item) : bool;
    protected abstract function updateQuality(Item $item) : void;

    # Used to sort the agers so most specific ones go first.
    public function getPriority() : int
    {
        return 30;
    }

    # Checks to see if item should be processed by this processor instance
    # and then updates the item's quality (ensuring it is between bounds) 
    # and the age of the item
    # returns a boolean indicating whether this processor handled the item
    public function processItem(Item $item) : void
    {
        if($this->shouldProcessItem($item)) 
        {
            $this->updateQuality($item);
            $this->checkQualityMinBounds($item);
            $this->checkQualityMaxBounds($item);
            $this->ageItem($item);
            return True;
        }
        return False;
    }

    # Min/Max Boundary checking is not a universal constraint, so allow overrides.
    protected function checkQualityMinBounds(Item $item)
    {
        if($item->quality < 0) 
        {
            $item->quality = 0;
        }
    }

    protected function checkQualityMaxBounds(Item $item)
    {
        if($item->quality > 50) 
        {
            $item->quality = 50;
        }
    }

    # Item aging is also overrideable, but with default implementation
    protected function ageItem(Item $item)
    {
        $item->sell_in -= 1;
    }
}