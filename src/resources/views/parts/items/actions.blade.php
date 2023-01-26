<?php /** @var \App\Helpers\BladeRoutesConfig $routes */ ?>

<?php

use App\Helpers\RoutesTypesEnum;
use App\Helpers\BootstrapColorsEnum;

$colorsConfig = [
    RoutesTypesEnum::List->value => BootstrapColorsEnum::Primary,
    RoutesTypesEnum::View->value => BootstrapColorsEnum::Info,
    RoutesTypesEnum::Create->value => BootstrapColorsEnum::Primary,
    RoutesTypesEnum::Edit->value => BootstrapColorsEnum::Warning,
    RoutesTypesEnum::Store->value => BootstrapColorsEnum::Success,
    RoutesTypesEnum::Update->value => BootstrapColorsEnum::Success,
    RoutesTypesEnum::Destroy->value => BootstrapColorsEnum::Danger,
    RoutesTypesEnum::Return->value => BootstrapColorsEnum::Primary,
    RoutesTypesEnum::Cansel->value => BootstrapColorsEnum::Secondary,
];

$iconsConfig = [
    RoutesTypesEnum::List->value => 'fa-solid fa-table-list',
    RoutesTypesEnum::View->value => 'fa-solid fa-eye',
    RoutesTypesEnum::Create->value => 'fa-solid fa-file-circle-plus',
    RoutesTypesEnum::Edit->value => 'fa-solid fa-pen-to-square',
    RoutesTypesEnum::Store->value => 'fa-solid fa-floppy-disk',
    RoutesTypesEnum::Update->value => 'fa-solid fa-floppy-disk',
    RoutesTypesEnum::Destroy->value => 'fa-solid fa-trash',
    RoutesTypesEnum::Return->value => 'bi bi-arrow-90deg-up',
    RoutesTypesEnum::Cansel->value => 'fa-solid fa-xmark',
]
?>

@foreach($routes as $name => $route)
    @if(RoutesTypesEnum::from($name) === RoutesTypesEnum::Destroy)
        <form method="post" action="{{route($route->route, $routes->id)}}" class="d-inline-block">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-{{$size ?? 'no_size'}} btn-outline-{{$route->select($colorsConfig)}}">
                <i class="{{$route->select($iconsConfig)}}"></i>
                {{$route->title}}
            </button>
        </form>
    @elseif(RoutesTypesEnum::from($name) === RoutesTypesEnum::Store || RoutesTypesEnum::from($name) === RoutesTypesEnum::Update)
        <button type="submit" class="btn btn-{{$size ?? 'no_size'}} btn-outline-{{$route->select($colorsConfig)}}">
            <i class="{{$route->select($iconsConfig)}}"></i>
            {{$route->title}}
        </button>
    @else
        <a href="{{route($route->route, $routes->id)}}" role="button" class="btn btn-{{$size ?? 'no_size'}} btn-outline-{{$route->select($colorsConfig)}}">
            <i class="{{$route->select($iconsConfig)}}"></i>
            {{$route->title}}
        </a>
    @endif
@endforeach
