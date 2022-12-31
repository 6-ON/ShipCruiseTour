<?php

namespace app\models;

use app\core\Application;
use app\core\DbModel;

class Passage extends DbModel
{
    public $cruiseId = '';
    public $portId = '';

    public static function tableName(): string
    {
        return 'passage';
    }

    public function attributes(): array
    {
        return ['cruiseId', 'portId'];
    }

    public static function primaryKey(): string
    {
        return '';
    }

    public function rules(): array
    {
        return
            [
                'cruiseId' => self::RULE_REQUIRED,
                'portId' => self::RULE_REQUIRED
            ];
    }

    public function labels(): array
    {
        return [];
    }

    public static function getPorts($cruiseId)
    {
        $sql = 'select p.* from passage pa
         join cruise c on c.id = pa.cruiseId
         join port p on p.id = pa.portId where  c.id = :cruiseId';

        $stmt = Application::$app->db->prepare($sql);
        $stmt->bindValue(':cruiseId', $cruiseId);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Port::class);
    }
}