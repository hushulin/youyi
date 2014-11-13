<?php 
/**
* 广告组件
*/
class AdvWidget extends Widget
{
	public function render($data)
	{
		$url = $data['url'];
		switch ($url) {
			case C('ADV_LIST_URL_1'):
				$where['id'] = array('IN',C('ADV_LIST_1'));
				break;

			case C('ADV_LIST_URL_2'):
				$where['id'] = array('IN',C('ADV_LIST_2'));
				break;

			case C('ADV_LIST_URL_3'):
				$where['id'] = array('IN',C('ADV_LIST_3'));
				break;

			case C('ADV_LIST_URL_4'):
				$where['id'] = array('IN',C('ADV_LIST_4'));
				break;
			
			default:
				$where['id'] = array('IN',C('ADV_LIST_1'));
				break;
		}
		$adv_list = D('Adv')->where($where)->limit(3)->select();
		$data['adv_list'] = $adv_list;
		$content = $this->renderFile('Adv',$data);
        return $content;
	}
}
 ?>