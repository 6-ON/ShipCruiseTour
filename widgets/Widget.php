<?php
namespace app\widgets;

use app\core\Model;

class Widget {
    public static function cruiseCard(Model $model)
    {
        return new CruiseCard($model);
    }

}


?>