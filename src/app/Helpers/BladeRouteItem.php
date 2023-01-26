<?php

namespace App\Helpers;

class BladeRouteItem
{
    public readonly RoutesTypesEnum $type;
    public readonly string $route;
    public readonly ?string $title;

    /**
     * @param RoutesTypesEnum $type
     * @param string $route
     * @param ?string $title
     */
    public function __construct(RoutesTypesEnum $type, string $route, ?string $title = null)
    {
        $this->type = $type;
        $this->route = $route;
        $this->title = $title;
    }

    /**
     * @param array<string, mixed> $config
     * @return mixed
     */
    public function select(array $config, mixed $default = null): mixed
    {
        return $config[$this->type->value] ?? $default;
    }
}
