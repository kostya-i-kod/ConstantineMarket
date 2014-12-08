<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Orders".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $price
 * @property string $time
 * @property integer $inCart
 *
 * @property Products $product
 * @property Users $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'price', 'inCart'], 'required'],
            [['user_id', 'product_id', 'price', 'inCart'], 'integer'],
            [['time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
            'price' => 'Price',
            'time' => 'Time',
            'inCart' => 'In Cart',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
