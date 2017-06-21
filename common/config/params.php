<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,

    'examType' => [
    	['id' => 0,'name' => '单选题'],
    	['id' => 1,'name' => '多选题'],
    	['id' => 2,'name' => '填空题'],
    	['id' => 3,'name' => '应用题'],
        ['id' => 2099,'name' => '未定义'],
    ],
    'examDif' => [
    	['id' => 0,'name' => '易'],
    	['id' => 1,'name' => '较易'],
    	['id' => 2,'name' => '中等'],
    	['id' => 3,'name' => '较难'],
    	['id' => 4,'name' => '难'],
    ],
];
