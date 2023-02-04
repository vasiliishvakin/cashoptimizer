<?php

namespace App\Utils;


use App\Enums\RouteTypeEnum;
use IteratorAggregate;
use Traversable;

/**
 * @method self list(string $route, ?string $title = null)
 * @method self view(string $route, ?string $title = null)
 * @method self create(string $route, ?string $title = null)
 * @method self edit(string $route, ?string $title = null)
 * @method self store(string $route, ?string $title = null)
 * @method self update(string $route, ?string $title = null)
 * @method self destroy(string $route, ?string $title = null)
 * @method self return (string $route, ?string $title = null)
 * @method self cansel (string $route, ?string $title = null)
 *
 * @property-read BladeRouteItem list
 * @property-read BladeRouteItem view
 * @property-read BladeRouteItem create
 * @property-read BladeRouteItem edit
 * @property-read BladeRouteItem store
 * @property-read BladeRouteItem update
 * @property-read BladeRouteItem destroy
 * @property-read BladeRouteItem return
 * @property-read BladeRouteItem cansel
 */
class BladeRoutesConfig implements IteratorAggregate
{
    public readonly int|string|object|null $id;

    /** @var  array<string, BladeRouteItem> */
    private array $items = [];


    public function __construct(int|string|object|null $id = null)
    {
        $this->id = $id;
    }

    public function __call(string $name, array $arguments): self
    {
        if (method_exists($this, $name)) {
            return $this->{$name}(...$arguments);
        }
        if (!RouteTypeEnum::tryFrom($name)) {
            throw new \InvalidArgumentException(sprintf('Route type %s is not instance %s', $name, RouteTypeEnum::class));
        }
        if (!empty($arguments)) {
            $this->setRoute($name, $arguments[0], $arguments[1] ?? null);
        }
        return $this;
    }

    public function __get(string $name)
    {
        if (!isset($this->items[$name])) {
            if (!RouteTypeEnum::tryFrom($name)) {
                throw new \InvalidArgumentException(sprintf('Route type %s is not instance %s', $name, RouteTypeEnum::class));
            }
            throw new \InvalidArgumentException('Route %s is not exist', $name);
        }
        return $this->items[$name];
    }

    /**
     * @param string $name
     * @param bool $strictCheck
     * @return BladeRouteItem|null
     */
    private function getRoute(string $name): ?BladeRouteItem
    {
        if (!isset($this->items[$name])) {
            if (!RouteTypeEnum::tryFrom($name)) {
                throw new \InvalidArgumentException(sprintf('Route type %s is not instance %s', $name, RouteTypeEnum::class));
            }
            return null;
        }
        return $this->items[$name];
    }

    private function setRoute(string $name, string $route, ?string $title = null): void
    {
        if (null === $type = RouteTypeEnum::tryFrom($name)) {
            throw new \InvalidArgumentException(sprintf('Route type %s is not instance %s', $name, RouteTypeEnum::class));
        }
        $this->items[$name] = new BladeRouteItem($type, $route, $title);
    }

    /**
     * @return Traversable
     * @psalm-return array<string, BladeRouteItem>
     */
    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->items);
    }
}
