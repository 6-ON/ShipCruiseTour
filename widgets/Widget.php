<?php

namespace app\widgets;

use app\core\Model;

class Widget
{
    public static function cruiseCard(Model $model)
    {
        return new CruiseCard($model);
    }

    public static function popover()
    {
        return new Popover();
    }

    public static function portCard(Model $model)
    {
        return new PortCard($model);
    }

    public static function shipCard(Model $model)
    {
        return new ShipCard($model);
    }

}


