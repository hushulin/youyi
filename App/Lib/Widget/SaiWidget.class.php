<?php
/**
 * 晒物
 */
 class SaiWidget extends Widget
 {
 	public function render($data)
 	{
 		$model = D('Showorder');
 		$list = $model->order("`create_time` desc")->limit(4)->select();
 		$data['list'] = $list;
 		$content = $this->renderFile('Sai',$data);
        return $content; 
 	}
 } 
 ?>