<?php
namespace GildedRose;

class SulfurusAger implements Ager {
    public function getPriority() {
        return 20;
    }

    public function shouldProcessItem(Item $item) {
        return $item->name == "Sulfuras, Hand of Ragnaros";
    }

    public function processItem(Item $item) {
        // no-op This legendary stuff never ages.
    }
}