<?php


namespace App\Http\Controllers\ApiResponse;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\DataArraySerializer;

class ApiResponse
{
    const BAD_REQUEST = 400;
    const PAGE_NOT_FOUND = 404;
    const VALIDATION_ERROR = 422;
    const UNAUTHORIZED = 401;

    /**
     * @var Manager
     */
    protected $manager;

    /**
     * ApiResponse constructor.
     */
    public function __construct()
    {
        $manager = new Manager();
        $manager->setSerializer(new DataArraySerializer());
        $this->manager = $manager;
    }

    /**
     * @param $item
     * @param $transformer
     * @return mixed
     */
    public function getArray($item, $transformer){
        $item = new Collection($item,$transformer);
        $item = $this->manager->createData($item)->toArray();//
        return $item['data'];
    }

    /**
     * @param $item
     * @param $transformer
     * @return mixed
     */
    public function getItem($item, $transformer){
        $item = new Item($item,$transformer);
        $item = $this->manager->createData($item)->toArray();
        return $item['data'];
    }
}
