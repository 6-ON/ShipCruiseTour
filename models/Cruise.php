<?php

namespace app\models;

use app\core\Application;
use app\core\DbModel;

class Cruise extends DbModel
{

    public $shipId = '';
    public $image = '';
    public $nombreNuits = '';
    public $startDate = '';
    public $startPort = '';
    public $label = '';

    public static function tableName(): string
    {
        return 'cruise';
    }

    public static function ViewName(): string
    {
        return 'CruiseV';
    }

    public function attributes(): array
    {
        return ['shipId', 'image', 'nombreNuits', 'startDate', 'startPort', 'label'];
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function rules(): array
    {
        return [
            'shipId' => [self::RULE_REQUIRED],
            'image' => [self::RULE_REQUIRED],
            'nombreNuits' => [self::RULE_REQUIRED],
            'startDate' => [self::RULE_REQUIRED],
            'startPort' => [self::RULE_REQUIRED],
            'label' => [self::RULE_REQUIRED]
        ];
    }


    public function labels(): array
    {
        return [];
    }
}