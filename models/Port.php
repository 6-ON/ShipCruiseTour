<?php

namespace app\models;

use app\core\DbModel;

class Port extends DbModel
{
    public string $label = '';
    public string $image = '';


    public static function tableName(): string
    {
        return 'port';
    }

    public function attributes(): array
    {
        return ['label', 'image'];
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
        ];
    }

    public function labels(): array
    {
        return [
            'label' => 'Label',
            'image' => 'Image'
        ];
    }
}