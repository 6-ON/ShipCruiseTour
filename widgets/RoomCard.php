<?php

namespace app\widgets;

use app\core\Model;

class RoomCard
{

    public Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function __toString(): string
    {
        return '';
    }
}