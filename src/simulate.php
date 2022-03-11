<?php

namespace GildedRose;

include_once('Item.php');
include_once('GildedRose.php');
include_once('Ager.php');
include_once('agers/BrieAger.php');

$items = [
    new Item('Aged Brie', 10, 40),
    new Item('Ham Sandwich', 10, 20),
    new Item('Sulfuras, Hand of Ragnaros', 10, 40),
];
$gildedRose = new GildedRose($items);

// day 1-30
for ($i = 0; $i < 10; $i++) {
    echo "Day $i\n";
    $gildedRose->updateQuality();
    echo implode("\n", $items) . "\n";
    echo "--------------------------------\n";
}