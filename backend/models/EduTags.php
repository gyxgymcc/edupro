<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_tags".
 *
 * @property integer $id
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $lvl
 * @property string $name
 * @property string $icon
 * @property integer $icon_type
 * @property integer $active
 * @property integer $selected
 * @property integer $disabled
 * @property integer $readonly
 * @property integer $visible
 * @property integer $collapsed
 * @property integer $movable_u
 * @property integer $movable_d
 * @property integer $movable_l
 * @property integer $movable_r
 * @property integer $removable
 * @property integer $removable_all
 */
class EduTags extends \kartik\tree\models\Tree
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['root', 'lft', 'rgt', 'lvl', 'icon_type', 'active', 'selected', 'disabled', 'readonly', 'visible', 'collapsed', 'movable_u', 'movable_d', 'movable_l', 'movable_r', 'removable', 'removable_all'], 'safe'],
            [['lft', 'rgt', 'lvl', 'name'], 'safe'],
            [['name'], 'string', 'max' => 60],
            [['icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            // 'id' => '默认编号',
            // 'root' => 'Root',
            // 'lft' => 'Lft',
            // 'rgt' => 'Rgt',
            // 'lvl' => 'Lvl',
            // 'name' => '分类名称',
            // 'icon' => 'Icon',
            // 'icon_type' => 'Icon Type',
            // 'active' => 'Active',
            // 'selected' => 'Selected',
            // 'disabled' => 'Disabled',
            // 'readonly' => 'Readonly',
            // 'visible' => 'Visible',
            // 'collapsed' => 'Collapsed',
            // 'movable_u' => 'Movable U',
            // 'movable_d' => 'Movable D',
            // 'movable_l' => 'Movable L',
            // 'movable_r' => 'Movable R',
            // 'removable' => 'Removable',
            // 'removable_all' => 'Removable All',
            'id' => '默认编号',
            'root' => '上级分类',
            'lft' => '分类名称',
            'rgt' => '序号',
            'lvl' => 'Lvl',
            'name' => '名称',
            'icon' => '图标',
            'icon_type' => '图标类型',
            'active' => '启用',
            'selected' => '默认选择',
            'disabled' => '禁用',
            'readonly' => '只读',
            'visible' => '可见',
            'collapsed' => '默认折叠',
            'movable_u' => '升级',
            'movable_d' => '降级',
            'movable_l' => '左移动',
            'movable_r' => '右移动',
            'removable' => '可删除',
            'removable_all' => '删除全部',
        ];
    }

    /**
     * @inheritdoc
     * @return EduTagsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduTagsQuery(get_called_class());
    }
}
