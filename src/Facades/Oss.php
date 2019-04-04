<?php
namespace Kd\Oss\Facades;
use Illuminate\Support\Facades\Facade;
class Oss extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'oss';
    }
}