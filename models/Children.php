<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "children".
 *
 * @property string $alias
 * @property string $email
 * @property string $password
 * @property string $brithdate
 * @property string $avatar
 * @property string $tutors_id
 * @property string $sexo
 *
 * @property Tutors $tutors
 * @property Progressheight[] $progressheights
 * @property Progressweight[] $progressweights
 * @property Session[] $sessions
 */
class Children extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'children';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'email', 'password', 'brithdate', 'tutors_id', 'sexo'], 'required'],
            [['brithdate'], 'safe'],
            [['alias', 'password'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 30],
            [['avatar'], 'string', 'max' => 40],
            [['tutors_id'], 'string', 'max' => 10],
            [['sexo'], 'string', 'max' => 1],
            [['alias'], 'unique'],
            [['tutors_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tutors::className(), 'targetAttribute' => ['tutors_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'alias' => 'Alias',
            'email' => 'Email',
            'password' => 'Password',
            'brithdate' => 'Brithdate',
            'avatar' => 'Avatar',
            'tutors_id' => 'Tutors ID',
            'sexo' => 'Sexo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutors()
    {
        return $this->hasOne(Tutors::className(), ['id' => 'tutors_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgressheights()
    {
        return $this->hasMany(Progressheight::className(), ['children_alias' => 'alias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgressweights()
    {
        return $this->hasMany(Progressweight::className(), ['children_alias' => 'alias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessions()
    {
        return $this->hasMany(Session::className(), ['children_alias' => 'alias']);
    }
}
