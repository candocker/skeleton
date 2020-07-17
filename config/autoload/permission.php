<?php

return [
    //model设置
    'models' => [
        'user' => App\Model\AuthManager::class,
        'permission' => App\Model\AuthPermission::class,
        'role' => App\Model\AuthRole::class,
    ],

    //表名设置
    'table_names' => [
        'roles' => 'auth_role',
        'permissions' => 'auth_permission',
		'resources' => 'auth_resource',
        'model_has_permissions' => 'model_has_permission',
        'model_has_roles' => 'role_manager',
        'role_has_permissions' => 'role_permission',
    ],
    'column_names' => [
        'model_morph_key' => 'model_id', //关联模板的主键
    ],
    'display_permission_in_exception' => false,
    'cache' => [
        'expiration_time' => 86400, //\DateInterval::createFromDateString('24 hours') 86400 已向hyperf提交该PR
        'key' => 'swoolecan.permission.cache',
        'model_key' => 'name',
        'store' => 'default',
    ],
];
