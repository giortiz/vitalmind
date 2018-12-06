<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutors".
 *
 * @property string $id
 * @property string $name
 * @property string $lastname
 * @property string $email
 * @property string $password
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
            [['id', 'name', 'lastname', 'email', 'password', 'birthdate'], 'required'],
            [['birthdate'], 'safe'],
            [['id'], 'string', 'max' => 10],
            [['name', 'lastname', 'password'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 30],
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
            'name' => 'Name',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'password' => 'Password',
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
