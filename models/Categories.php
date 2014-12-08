<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Categories".
 *
 * @property integer $id
 * @property string $name
 * @property string $decription
 *
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'decription'], 'required'],
            [['name'], 'string', 'max' => 128],
            [['decription'], 'string', 'max' => 1024],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'decription' => 'Decription',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['category_id' => 'id']);
    }
}
