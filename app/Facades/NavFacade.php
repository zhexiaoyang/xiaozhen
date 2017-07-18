<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class NavFacade extends Facade
{
    protected static function getFacadeAccessor(){
        return 'NavRepository';
    }
}