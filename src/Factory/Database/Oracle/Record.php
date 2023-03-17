<?php

namespace Database\Oracle;

class Record implements \DBRecordInterface
{

    public function __construct(private readonly int $id, private readonly array $fields)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getField(string $name): mixed
    {
        if (!array_key_exists($name, $this->fields)) {
            throw new \Exception('Unknown filed ' . $name);
        }
        return $this->fields[$name];
    }
}