<?php

namespace app\models;

use app\core\Application;
use app\core\DbModel;

class Passage extends DbModel
{
    public $idCruise = '';
    public $idPort = '';

    public static function tableName(): string
    {
        return 'passage';
    }

    public function attributes(): array
    {
        return ['idCruise', 'idPort'];
    }

    public static function primaryKey(): string
    {
        return '';
    }

    public function rules(): array
    {
        return
            [
                'idCruise' => self::RULE_REQUIRED,
                'idPort' => self::RULE_REQUIRED
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