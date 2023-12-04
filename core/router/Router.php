<?php

namespace core\router;

class Router
{
  protected array $routes = [];

  public function execute(
    Object $object
  ) {
    $reflection = new \ReflectionClass($object);
    $methods = $reflection->getMethods();
    foreach ($methods as $method) {
      $attributes = $method->getAttributes(
        \core\attributes\Route::class,
        \ReflectionAttribute::IS_INSTANCEOF
      );
      foreach ($attributes as $attribute) {
        $instance = $attribute->newInstance();
        $this->routes[$instance->method][$instance->path] = [$object, $method->getName()];
      }
    }
  }

  public function get_routes()
  {
    return $this->routes;
  }
}
