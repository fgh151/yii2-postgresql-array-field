<?php
/**
 * Created by PhpStorm.
 * User: fgorsky
 * Date: 07.10.16
 * Time: 14:18
 */

namespace fgh151\PostgresqlJsonb\models;

use yii\base\DynamicModel as YiiDynamicModel;

class DynamicModel extends YiiDynamicModel
{
    /**
     * @inheritdoc
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->{$property};
        } else {
            $this->addRule($property, 'safe');
            $this->$property = new DynamicModel();
            return $this->$property;
        }
    }

    /**
     * @inheritdoc
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}