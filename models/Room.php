<?php

namespace app\models;

use app\core\DbModel;

class Room extends DbModel
{

    public static function tableName(): string
    {
        return 'room';
    }
    public static function ViewName(): string
    {
        return 'roomv';
    }

    public function attributes(): array
    {
        return ['shipId', 'typeId'];
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function rules(): array
    {
        return
            [
                'shipId' => [self::RULE_REQUIRED],
                'typeId' =>[self::RULE_REQUIRED]
            ];

    }

    public function labels(): array
    {
        return [];
    }
}