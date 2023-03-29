<?php

namespace Vasoft\Examples\Sort\Utils;

use ReflectionMethod;

final class ProfileCase
{
    private float $executionTime = 0;
    private string $statInfo = '';

    public function __construct(
        readonly public ReflectionMethod $method,
        readonly public string           $title
    )
    {
    }

    public function run(mixed ...$props): void
    {
        $hasStat = $this->method->getDeclaringClass()->implementsInterface(HasStatInterface::class);
        if ($hasStat) {
            [$this->method->class, 'resetStatInfo']();
        }
        $start = microtime(true);
        $this->method->invoke(null, ...$props);
        $this->executionTime = microtime(true) - $start;
        if ($hasStat) {
            $this->statInfo = [$this->method->class, 'getStatInfo']();
        }
    }

    public function getExecutionTime(): float
    {
        return $this->executionTime;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getStatInfo(): string
    {
        return $this->statInfo;
    }
}