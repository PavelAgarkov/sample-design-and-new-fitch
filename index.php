<?php

use Delegate\PersonWriterDelegate;
use Model\PersonModel;
use Model\AddressModel;
use Delegate\Somes\Some;
use Delegate\Somes\Ones\One;
use Connecting\CurlConnect;

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





