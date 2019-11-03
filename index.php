<?php

use Delegate\PersonWriterDelegate;
use Model\PersonModel;
use Model\AddressModel;
use Delegate\Somes\Some;
use Delegate\Somes\Ones\One;
use Connecting\CurlConnect;
use Call\ProcessSale;
use Call\Product;
use Call\Totalizer;

include "autoload.php";

function writePerson()
{
    $One = new One();
    $Writer = new PersonWriterDelegate();
    $Some = new Some();
    $Person = new PersonModel($Writer);
    $Person->writeName();
}

function adress()
{
    $Adress = new AddressModel("441b Bakers Streer");
    print "{$Adress->streetAdress}\n";

    $Adress = new AddressModel("441b", "Bakers Streer");
    print "{$Adress->streetAdress}\n";

    $Adress->streetAdress = "43, West 24th Avenue";
    print "{$Adress->streetAdress}\n";
}

function curlConnect()
{
    $CURl = new CurlConnect("https://www.php.net");
    $connect = $CURl -> getPrivateConnect();
    var_dump($CURl);
}

function callback()
{
    $logger = function ($product) {
        print "Записываем ({$product -> name} {$product -> price})\n";
    };

    $Processor = new ProcessSale();
    $Processor -> registerCallback($logger);
    $Processor -> sale(new Product("Туфли", 6));

    print "<br>" . PHP_EOL;

    $Processor -> sale(new Product("Кофе", 6));
}

function totalizer()
{
    $Processor = new ProcessSale();
    $Processor -> registerCallback(Totalizer::warnAmount(8));

    $Processor -> sale(new Product("Туфли", 6));
    print "<br>";
    $Processor -> sale(new Product("Кофе", 7));
}




