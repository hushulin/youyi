<?php
/**
 * 活动
 */
 class ActWidget extends Widget
 {
 	public function render($data)
 	{
 		$list = getChepin(6,4);
 		$data['list'] = $list;
 		$content = $this->renderFile('Act',$data);
        return $content; 
 	}
 } 
 ?>