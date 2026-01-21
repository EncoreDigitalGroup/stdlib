<?php


namespace EncoreDigitalGroup\StdLib\Objects\Support\Traits;

use BadMethodCallException;
use Closure;
use Illuminate\Database\Eloquent\Model;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

/** @experimental */
trait Macroable
{
    protected static array $macros = [];

    public static function macro(string $name, object|callable $macro): void
    {
        static::$macros[$name] = $macro;
    }

    public static function mixin(object $mixin, bool $replace = true): void
    {
        $methods = (new ReflectionClass($mixin))->getMethods(
            ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED
        );

        foreach ($methods as $method) {
            if ($replace || !static::hasMacro($method->name)) {
                static::macro($method->name, $method->invoke($mixin));
            }
        }
    }

    public static function hasMacro(string $name): bool
    {
        return isset(static::$macros[$name]);
    }

    public static function flushMacros(): void
    {
        static::$macros = [];
    }

    protected static function canDeferToLaravel(): bool
    {
        return class_exists(Model::class) &&
            is_subclass_of(static::class, Model::class);
    }

    /**
     * Defer static method call to the parent class's __callStatic for Eloquent models.
     *
     * @return mixed
     */
    protected static function deferToLaravel(string $method, array $parameters, bool $static = false)
    {
        if (static::canDeferToLaravel()) {
            // Defer to the parent class's __callStatic (e.g., Model::__callStatic)
            $parentClass = get_parent_class(static::class);
            if ($parentClass && (new ReflectionClass($parentClass))->hasMethod("__callStatic")) {
                return parent::__callStatic($method, $parameters);
            }
        }

        throw new BadMethodCallException(sprintf("Method %s::%s does not exist.", static::class, $method));
    }

    /**
     * Defer instance method call to the parent class's __call for Eloquent models.
     */
    protected function deferToEloquentInstance(string $method, array $parameters): mixed
    {
        if (static::canDeferToLaravel()) {
            // Defer to the parent class's __call (e.g., Model::__call)
            $parentClass = get_parent_class($this);
            if ($parentClass && (new ReflectionClass($parentClass))->hasMethod("__call")) {
                return parent::__call($method, $parameters);
            }
        }

        throw new BadMethodCallException(sprintf("Method %s::%s does not exist.", static::class, $method));
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     *
     * @throws ReflectionException
     */
    public static function __callStatic($method, $parameters)
    {
        // Check if a macro exists for the method
        if (static::hasMacro($method)) {
            $macro = static::$macros[$method];

            if ($macro instanceof Closure) {
                $macro = $macro->bindTo(null, static::class);
            }

            return $macro(...$parameters);
        }

        // Defer to the parent class's __callStatic if it exists
        $parentClass = get_parent_class(static::class);
        if ($parentClass && (new ReflectionClass($parentClass))->hasMethod("__callStatic")) {
            return parent::__callStatic($method, $parameters);
        }

        // If the class is an Eloquent model, defer to Laravel's handling
        if (static::canDeferToLaravel()) {
            return static::deferToLaravel($method, $parameters, true);
        }

        throw new BadMethodCallException(sprintf("Method %s::%s does not exist.", static::class, $method));
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     *
     * @throws ReflectionException
     */
    public function __call($method, $parameters)
    {
        // Check if a macro exists for the method
        if (static::hasMacro($method)) {
            $macro = static::$macros[$method];

            if ($macro instanceof Closure) {
                $macro = $macro->bindTo($this, static::class);
            }

            return $macro(...$parameters);
        }

        // Defer to the parent class's __call if it exists
        $parentClass = get_parent_class($this);
        if ($parentClass && (new ReflectionClass($parentClass))->hasMethod("__call")) {
            return parent::__call($method, $parameters);
        }

        // If the class is an Eloquent model, defer to Laravel's handling
        if (static::canDeferToLaravel()) {
            return $this->deferToEloquentInstance($method, $parameters);
        }

        throw new BadMethodCallException(sprintf("Method %s::%s does not exist.", static::class, $method));
    }
}