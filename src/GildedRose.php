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

        # Dynamically load all agers from subdirectory (need a better discovery method)
        $this->agers = [];
        foreach (glob('src/agers/*.php') as $file) {
            include_once $file;

            // Use the file name to determine the candidate class name
            $class = "GildedRose\\".basename($file, '.php');
            if (class_exists($class)) {
                array_push($this->agers, new $class);
            }
        }
        # Sort Agers by priority for precedence rules
        usort($this->agers, array("GildedRose\GildedRose", "priority_sort"));
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            foreach ($this->agers as $ager) {
                if($ager->processItem($item)) {
                    break;
                }
            }
        }
    }
}
