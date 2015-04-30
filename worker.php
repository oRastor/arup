<?php

//http://loh/?target=search&event=big&category_id=1&currency=1&gearbox=$self->{cond}->{gear}&s_yers=$self->{cond}->{year_from}&po_yers=$self->{cond}->{year_to}&price_ot=$self->{cond}->{price_from}&price_do=$self->{cond}->{price_to}&custom=0&damage=0&page=$curpage"

use AutoGrabber\QueryBuilder,
    AutoGrabber\QueryOptions\GearboxOption;

require 'vendor/autoload.php';

$ob = new QueryBuilder();

$ob->addOption(new AutoGrabber\QueryOptions\PriceFromOption(5))
        ->setPriceTo(10)
        ->addOption(new GearboxOption(Gearbox::ANY));

var_dump($ob->getQuery());
