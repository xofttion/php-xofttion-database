<?php

namespace Xofttion\Database\Sql\Utils;

use Xofttion\Kernel\Structs\Json;

class Row extends Json
{
    public function __construct(?array $data = null)
    {
        parent::__construct($data, true);
    }

    protected function map(array $data): bool
    {
        if (!is_array_json($data)) {
            return false;
        }

        $keys = array_keys($data);

        foreach ($keys as $key) {
            if (is_string($key)) {
                $this[$key] = static::getValue($data[$key]);
            }
        }

        return true;
    }
}
