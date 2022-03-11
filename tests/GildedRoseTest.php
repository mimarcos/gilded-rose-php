<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\NormalAger;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testNormalAging(): void
    {
        $items = [
            [ new Item('Normal Item', 3, 10), 9 ],
            [ new Item('Low Quality', 3, 1), 0 ],
            [ new Item('High Quality', 3, 50), 49 ],
            [ new Item('Too High Quality', 3, 51), 50 ],
            [ new Item('About to Expire', 1, 10), 9 ],
            [ new Item('Expired', 0, 10), 0 ]
        ];

        $ager = new NormalAger();
        foreach($items as $item) {
            if($ager->shouldProcessItem($item[0])) {
                $ager->processItem($item[0]);
            }
            $this->assertSame($item[0]->quality, $item[1]);
        }
    }

    // additional test coverage not available due to
    // moving on to other features.
}