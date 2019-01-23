<?php

namespace Deployee\Components\Config;

interface ConfigInterface
{
    /**
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function get($name, $default = null);

    /**
     * @param string $name
     * @param mixed $value
     */
    public function set(string $name, $value);
}