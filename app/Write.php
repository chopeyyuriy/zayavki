<?php
/**
 * Created by PhpStorm.
 * User: andyt
 * Date: 05.08.2021
 * Time: 12:14
 */

namespace app;

use LeadGenerator\Lead;

class Write
{
    public static function writeOrders(object $generator, string $category = null)
    {
        $fp = fopen('log.txt', 'w');

        $generator->generateLeads(10000, function (Lead $row) use ($fp, $category) {

            if ($category && is_string($category)) {
                $row->categoryName != $category ? self::writeOneOrder($fp, $row) : '';
            } else {
                self::writeOneOrder($fp, $row);
            }
        });

        fclose($fp);
        sleep(2);
    }

    public static function writeOneOrder($fp, $row)
    {
        fwrite($fp, $row->id . ' | ' . $row->categoryName . ' | ' . date('Y-m-d H:i:s') . PHP_EOL);
    }

}