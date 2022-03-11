<?php
namespace GildedRose;

class SulfurusAger extends Ager {
    public function getPriority() {
        return 20;
    }

    public function shouldProcessItem(Item $item) {
        return $item->name == "Sulfuras, Hand of Ragnaros";
    }

    public function updateQuality(Item $item) {
        // no-op This legendary stuff never ages.
    }

    public function ageItem(Item $item) {
        // no-op This legendary stuff never ages.
    }

    protected function checkQualityMaxBounds(Item $item) {
        // no-op (quality can be anything, even >50).
    }
}