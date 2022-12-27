<?php

namespace app\models;

use app\core\DbModel;

class Ship extends DbModel
{
    public string $label = '';
    public string $image = '';
    public $capacity = '';


    public static function tableName(): string
    {
        return 'ship';
    }

    public function attributes(): array
    {
        return ['label', 'image', 'capacity'];
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function rules(): array
    {
        return [
            'label' => [self::RULE_REQUIRED],
            'image' => [self::RULE_REQUIRED],
            'capacity' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'label' => 'Label',
            'image' => 'Image',
            'capacity' => 'Capacity'
        ];
    }
}