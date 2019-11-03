<?php

namespace Call;

class Totalizer
{

    public static function warnAmount($amt)
    {
        $count = 0;
        return function ($product) use ($amt, &$count) {
            $count += $product -> price;
            print " <br> Сумма : $count \n";

            if ($count > $amt) {
                print "<br> Продано товаров на сумму : {$count}";
            }
        };
    }
}