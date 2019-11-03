<?php

namespace Delegate;

use Model\PersonModel;

class PersonWriterDelegate
{
    public function writeName(PersonModel $p)
    {
        print $p->getName() . "\n";
    }

    public function writeAge(PersonModel $p)
    {
        print $p->getAge() . "\n";
    }
}