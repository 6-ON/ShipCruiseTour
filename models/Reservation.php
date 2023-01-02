<?php

namespace app\models;

use app\core\DbModel;

class Reservation extends DbModel
{

    public $roomId = '';
    public $userId = '';
    public $cruiseId = '';

    public static function tableName(): string
    {
        return 'reservation';
    }
    public static function ViewName(): string
    {
        return 'reservationv';
    }

    public function attributes(): array
    {
        return ['roomId','cruiseId', 'userId'];
    }

    public static function primaryKey(): string
    {
        return 'reservationId';
    }

    public function rules(): array
    {
        return [
            'roomId' => [self::RULE_REQUIRED],
            'userId' => [self::RULE_REQUIRED],
            'cruiseId' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [];
    }
}