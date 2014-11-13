<?php
class MenuModel extends Model{
	protected $_validate = array(
		array('title','require','标题必须填写！'), //默认情况下用正则进行验证
		array('url','require','链接必须填写！'), //默认情况下用正则进行验证
		array('pid','require','父级菜单必须填写！'), //默认情况下用正则进行验证
		array('sort','require','排序必须填写！'), //默认情况下用正则进行验证
	);

}