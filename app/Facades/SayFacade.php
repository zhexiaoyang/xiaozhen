<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class SayFacade extends Facade
{
    protected static function getFacadeAccessor(){
        return 'SayRepository';
    }
}