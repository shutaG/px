<?php
namespace app\common\validate;
use think\Validate;

class Card extends Validate
{
    protected $rule =   [
        'card_no'  => 'require',
        'card_pwd'   => 'require',
		'card_money'   => 'require',
        'card_point'   => 'require',
    ];

    protected $message  =   [
        'card_no.require' => 'validate/require_no',
        'card_pwd.require'   => 'validate/require_pass',
		'card_money.require'   => '面值必须',
        'card_point.require'   => '点数必须',
    ];

    protected $scene = [
        'add'=> ['card_no','card_pwd','card_money','card_point'],
        'edit'=> ['card_no','card_pwd','card_money','card_point'],
    ];
}