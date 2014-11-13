<?php
/**
 * 发现精彩
 */
 class FxWidget extends Widget
 {
 	public function render($data)
 	{
 		$list = getChepin(5,9);
 		$data['list'] = $list;
 		$content = $this->renderFile('Fx',$data);
        return $content; 
 	}


 } 
 ?>