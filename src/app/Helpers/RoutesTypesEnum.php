<?php

namespace App\Helpers;

enum RoutesTypesEnum: string
{
    case List = 'list';
    case View = 'view';
    case Create = 'create';
    case Edit = 'edit';
    case Store = 'store';
    case Update = 'update';
    case Destroy = 'destroy';
    case Return = 'return';
    case Cansel = 'cansel';
}
