<?php

namespace app\modules\brackets\models;

use app\modules\brackets\validator\BracketsValidator;
use Yii;
use yii\base\Model;

/**
 * @property string $data
 */
class DataString extends Model
{
    public $data;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['data', BracketsValidator::class],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'data' => 'Data',
        ];
    }
}
