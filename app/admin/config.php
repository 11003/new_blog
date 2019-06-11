<?php
/**
 * User: Administrator
 * Date: 2019/3/10
 * Time: 23:51
 */
return [
    'smtp_setting' => [
        //设置邮件头的From字段
        'from' => 'Ta回复您了！',
        // SMTP 用户名，如果是QQ邮箱申请的则填写QQ邮箱
        'username' => '814029073@qq.com',
        // SMTP 密码，如果是QQ邮箱申请的则填写开通SMTP服务后生成的密码
        'password' => 'jhjvjtavfkytbbfh',
        // SMTP 邮箱地址，如果是QQ邮箱申请的则填写QQ邮箱
        'address'=> '814029073@qq.com',
        // 分享地址
        'link' => 'http://www.liuhai.fun./article',
        // 邮件标题
        "title" => "新的回复！",
        // 邮件内容，{{link}} 为表白链接的占位符，可随意更改位置，系统自动替换为表白链接。
        "body" => "测试",
        // 邮件发送成功返回
        "success" => "邮件发送成功",
        // 邮件发送失败返回
        "failed" => "邮件发送失败！因为当前人数太多，邮件发送频率高被限制，不过系统会在稍后自动重新发送邮件，请放心，联系站长QQ：814029073<br>",
        // 失败的时候是否返回错误的详细信息，英文的信息，带错误码，用于程序调试，不显示就改为false
        "debug" => false
    ],
    //加密串
    'salt' => 'wZPb~yxvA!ir38&Z',

    'auth_config' => [
        'auth_on'           => true,                      // 认证开关
        'auth_type'         => 1,                         // 认证方式，1为实时认证；2为登录认证。
        'auth_group'        => 'auth_group',        // 用户组数据表名
        'auth_group_access' => 'auth_group_access', // 用户-用户组关系表
        'auth_rule'         => 'auth_rule',         // 权限规则表
    ]
];