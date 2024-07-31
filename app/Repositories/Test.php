<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Facade;

//Class for fasad
class Test extends Facade{
    protected static function getFacadeAccessor(){
        return "jogfol";
    }
}

?>