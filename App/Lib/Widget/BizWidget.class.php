<?php
/**
 * 明星商户
 */
 class BizWidget extends Widget
 {
 	public function render($data)
 	{
 		$model = D();
 		$list = $model->table('fanwe_supplier_location')->order("`total_point` desc")->limit(4)->select();
 		foreach ($list as $key => $value) {
 			$list[$key]['preview'] = str_replace('./', C('UEC_HOST').'/', $value['preview']);
 		}
 		$data['list'] = $list;
 		$content = $this->renderFile('Biz',$data);
        return $content; 
 	}
 } 
 ?>