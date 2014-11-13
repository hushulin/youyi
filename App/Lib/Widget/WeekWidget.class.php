<?php
/**
 * 每周榜单
 */
 class WeekWidget extends Widget
 {
 	public function render($data)
 	{
 		$content = $this->renderFile('Week',$data);
        return $content; 
 	}
 } 
 ?>