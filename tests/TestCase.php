<?php

namespace WSW\SimpleUpload;

use PHPUnit_Framework_TestCase;
use Faker\Factory;
use Faker\Generator;

/**
 * Class TestCase
 * @package WSW\SimpleUpload
 */
class TestCase extends PHPUnit_Framework_TestCase
{
    private $faker;

    /**
     * @return Generator
     */
    public function getFaker()
    {
        if (!$this->faker instanceof Generator) {
            $this->faker = Factory::create();
        }

        return $this->faker;
    }

    /**
     * @return array
     */
    public function getFileExample()
    {
        return [
            'name' => 'php.png',
            'type' => 'image/png',
            'tmp_name' => __DIR__ . DIRECTORY_SEPARATOR . 'Files' . DIRECTORY_SEPARATOR . 'php.png',
            'error' => 0,
            'size' => 94762
        ];
    }

    public function getUploadError()
    {
        $arr = $this->getFileExample();
        $arr['error'] = 2;
        return $arr;
    }

    public function getArrayFile()
    {
        return [
            'path'      => $this->getFileExample()['tmp_name'],
            'timestamp' => (new \DateTime())->getTimestamp(),
            'size'      => $this->getFileExample()['size'],
            'mimetype'  => $this->getFileExample()['type'],
        ];
    }

    protected function path()
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'Files' . DIRECTORY_SEPARATOR;
    }
}
