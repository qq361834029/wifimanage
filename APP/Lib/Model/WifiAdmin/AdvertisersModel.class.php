<?php
class AdvertisersModel extends Model{
	protected $_auto = array (
		array('pid','0'),
		array('password','md5',1,'function'),	//新增时
		array('add_time','time',1,'function'),
		array('update_time','time',3,'function'),
		array('last_loginip','get_client_ip',3,'function'),
		array('last_logintime','time',3,'function'),
	);
	protected $_validate =array(
		array('name','require','用户帐号不能为空',1),
		array('name','','用户账号已经存在！',1,'unique',1), // 新增修改时候验证username字段是否唯一
		array('name','/^[a-zA-Z0-9_]{4,20}$/','用户帐号由4-20位数字，字母或下划线',1,"regex",Model:: MODEL_INSERT),
		array('password','require','用户密码不能为空',1,"",Model:: MODEL_INSERT),
	);


}