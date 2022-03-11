<?php

declare(strict_types=1);

namespace GildedRose;

interface Ager {
    public function shouldProcessItem(Item $item);
    public function processItem(Item $item);
    public function getPriority(); 
}