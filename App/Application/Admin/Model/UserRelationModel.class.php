<?php

//定义用户与角色关联模型
class UserRelationModel extends RelationModel{

    //定义主表名称
    protected $tableName = 'user';

    //定义关联
    protected $_link = array(
        //定义副表名称
        'role' => array(    //(关联1)
            //定义关联关系
            'mapping_type' => MANY_TO_MANY,
            //定义中间表
            'relation_table' => 'ningbo_role_user',
            //定义主表外键
            'foreign_key' => 'user_id',
            //定义副表外键
            'relation_key' => 'role_id',
            //关联要查询的字段
            'mapping_fields' => 'id,name,remark',
        )
    );
}