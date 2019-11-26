<?php

namespace ishop;

class Cache
{
    public $container;
    public function set($key, $data, $second = 3600)
    {
        $this->container['data'] = $data;
        $this->container['time'] = time() + $second;
        $file = ROOT . CACHE . '/' . md5(md5($key)) . '.txt';

        if (file_exists($file)) {
            if (filesize($file) > 0) {
                NULL;
            } else {
                $line = str_replace("!", ".", $this->container['data'])
                    . '!' . $this->container['time'];
                file_put_contents($file, $line);
            }
        } else {
            $line = str_replace("!", ".", $this->container['data'])
                . '!' . $this->container['time'];
            file_put_contents($file, $line);
        }
    }
    public function get($key)
    {

        $file = ROOT . CACHE . '/' . md5(md5($key)) . '.txt';
        if (file_exists($file)) {

            $container = explode("!", file_get_contents($file));

            if (time() > $container[1]) {
                unlink($file);
            } else {

                return $container[0];
            }
        }
    }
    public function delete($key)
    { 
        unlink(ROOT . CACHE . '/' . md5(md5($key)) . '.txt');
    }
}
