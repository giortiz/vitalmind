<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutors".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $lastname
 * @property string $birthdate
 *
 * @property Children[] $childrens
 * @property Session[] $sessions
 */
class Tutors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'email', 'password', 'name', 'lastname', 'birthdate'], 'required'],
            [['id'], 'integer'],
            [['birthdate'], 'safe'],
            [['email'], 'string', 'max' => 30],
            [['password', 'name', 'lastname'], 'string', 'max' => 20],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'birthdate' => 'Birthdate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildrens()
    {
        return $this->hasMany(Children::className(), ['tutors_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessions()
    {
        return $this->hasMany(Session::className(), ['tutors_id' => 'id']);
    }
}
