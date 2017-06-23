<?php

namespace App\Util;

class Env
{
    private $file;
    private $keys;

    public function __construct($file)
    {
        $this->file = $file;
        $this->readFile();
    }

    private function readFile()
    {
        $lines = file($this->file);

        foreach ($lines as $line) {
            if (!strstr($line, '=')) {
                continue;
            }

            $line  = explode('=', $line);
            $key   = trim($line[0]);
            $value = trim($line[1]);

            $this->keys[$key] = $value;
        }
    }

    public function get($key, $default = '')
    {
        if (!isset($this->keys[$key])) {
            return $default;
        }

        return $this->keys[$key];
    }

    public function getKeys()
    {
        return $this->keys;
    }
}
