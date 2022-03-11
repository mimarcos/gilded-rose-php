<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function priority_sort($a, $b) {
        return $a->getPriority() - $b->getPriority();
    }

    public function __construct(array $items)
    {
        $this->items = $items;
        $this->agers = [];

        foreach (glob('src/agers/*.php') as $file) {
            include_once $file;

            // get the file name of the current file without the extension
            // which is essentially the class name
            $class = "GildedRose\\".basename($file, '.php');
            if (class_exists($class)) {
                echo("Loading class " . $class);
                $obj = new $class;
                array_push($this->agers, $obj);
            }
            else {
                echo("Class does not exist " . $class);
            }
        }
        usort($this->agers, array("GildedRose\GildedRose", "priority_sort"));

    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            foreach ($this->agers as $ager) {
                if($ager->shouldProcessItem($item)) {
                    $ager->processItem($item);
                    break;
                }
            }
        }
    }
}
