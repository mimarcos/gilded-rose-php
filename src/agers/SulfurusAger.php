<?php
namespace GildedRose;

class SulfurusAger extends Ager {
    public function getPriority() : int
    {
        return 20;
    }

    public function shouldProcessItem(Item $item) : bool
    {
        return $item->name == "Sulfuras, Hand of Ragnaros";
    }

    public function updateQuality(Item $item) : void
    {
        // no-op This legendary stuff never ages.
    }

    public function ageItem(Item $item) : void
    {
        // no-op This legendary stuff never ages.
    }

    protected function checkQualityMaxBounds(Item $item) : void
    {
        // no-op (quality can be anything, even >50).
    }
}