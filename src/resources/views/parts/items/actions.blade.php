<?php /** @var \App\Utils\BladeRoutesConfig $routes */ ?>

<?php

use App\Enums\BootstrapColorEnum;
use App\Enums\RouteTypeEnum;

$colorsConfig = [
    RouteTypeEnum::List->value => BootstrapColorEnum::Primary,
    RouteTypeEnum::View->value => BootstrapColorEnum::Info,
    RouteTypeEnum::Create->value => BootstrapColorEnum::Primary,
    RouteTypeEnum::Edit->value => BootstrapColorEnum::Warning,
    RouteTypeEnum::Store->value => BootstrapColorEnum::Success,
    RouteTypeEnum::Update->value => BootstrapColorEnum::Success,
    RouteTypeEnum::Destroy->value => BootstrapColorEnum::Danger,
    RouteTypeEnum::Return->value => BootstrapColorEnum::Primary,
    RouteTypeEnum::Cansel->value => BootstrapColorEnum::Secondary,
];

$iconsConfig = [
    RouteTypeEnum::List->value => 'fa-solid fa-table-list',
    RouteTypeEnum::View->value => 'fa-solid fa-eye',
    RouteTypeEnum::Create->value => 'fa-solid fa-file-circle-plus',
    RouteTypeEnum::Edit->value => 'fa-solid fa-pen-to-square',
    RouteTypeEnum::Store->value => 'fa-solid fa-floppy-disk',
    RouteTypeEnum::Update->value => 'fa-solid fa-floppy-disk',
    RouteTypeEnum::Destroy->value => 'fa-solid fa-trash',
    RouteTypeEnum::Return->value => 'bi bi-arrow-90deg-up',
    RouteTypeEnum::Cansel->value => 'fa-solid fa-xmark',
]
?>

@foreach($routes as $name => $route)
    @if(RouteTypeEnum::from($name) === RouteTypeEnum::Destroy)
        <form method="post" action="{{route($route->route, $routes->id)}}" class="d-inline-block">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-{{$size ?? 'no_size'}} btn-outline-{{$route->select($colorsConfig)}}">
                <i class="{{$route->select($iconsConfig)}}"></i>
                {{$route->title}}
            </button>
        </form>
    @elseif(RouteTypeEnum::from($name) === RouteTypeEnum::Store || RouteTypeEnum::from($name) === RouteTypeEnum::Update)
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
