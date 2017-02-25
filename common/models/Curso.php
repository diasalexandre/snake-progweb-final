<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property integer $id
 * @property string $nome
 * @property string $sigla
 * @property string $descricao
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'sigla', 'descricao'], 'required', 'message' => 'Campo obrigatorio'],
            [['descricao'], 'string'],
            [['nome'], 'string', 'max' => 45, 'message' => 'Maximo 45 caracteres'],
            [['sigla'], 'string', 'max' => 4, 'message' => 'Maximo 4 caracteres'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'sigla' => 'Sigla',
            'descricao' => 'Descricao',
        ];
    }
}
