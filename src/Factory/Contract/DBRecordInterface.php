<?php

interface DBRecordInterface
{
    public function __construct(int $id, array $fields);

    public function getId(): int;

    public function getField(string $name): mixed;
}