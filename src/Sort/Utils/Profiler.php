<?php

namespace Vasoft\Examples\Sort\Utils;

use ReflectionMethod;

final class Profiler
{
    private array $cases = [];

    /**
     * @param class-string $className
     * @throws \ReflectionException
     */
    public function __construct(string $className)
    {
        $reflection = new \ReflectionClass($className);
        $methods = $reflection->getMethods();
        array_walk($methods, [$this, 'fillProfiledMethod']);
    }

    public function fillProfiledMethod(ReflectionMethod $method): void
    {
        $matches = [];
        preg_match('#@title (.+)#', $method->getDocComment(), $matches);
        if (count($matches) === 2) {
            $this->cases[$method->getName()] = new ProfileCase($method, $matches[1]);
        }
    }

    public function run(mixed ...$props): Profiler
    {
        array_walk($this->cases, static fn(ProfileCase $case) => $case->run(...$props));
        return $this;
    }

    public function echo(): Profiler
    {
        uasort($this->cases, [$this, 'sort']);
        array_walk($this->cases, [$this, 'echoCase']);
        return $this;
    }

    private function echoCase(ProfileCase $case): void
    {
        echo sprintf('%s %0.4f', $case->getTitle(), $case->getExecutionTime());
        $statInfo = $case->getStatInfo();
        if ($statInfo !== '') {
            echo ' ', $statInfo;
        }
        echo PHP_EOL;
    }

    private function sort(ProfileCase $a, ProfileCase $b): int
    {
        return $a->getExecutionTime() <=> $b->getExecutionTime();
    }
}