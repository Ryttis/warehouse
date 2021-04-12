<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Advisor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'advisor';
    }
}
