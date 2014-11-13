<?php 
/**
* 文章模块
*/
class ArticleWidget extends Widget
{
	public function render($data)
 	{
 		$count = $data['count'];
 		// return $count;
 		// 公告文章
		$article_gg = $this->getArticle(5,$count);
		// 入门文章
		$article_rm = $this->getArticle(6,$count);
		// 公益文章
		$article_gy = $this->getArticle(7,$count);

		$data['article_gg'] = $article_gg;
		$data['article_rm'] = $article_rm;
		$data['article_gy'] = $article_gy;
 		
 		$content = $this->renderFile('Article',$data);
        return $content; 
 	}


 	// 取文章
	private function getArticle($type='', $limit = 3)
	{
		return D('Article')->where("`cate_id` = {$type}")->order("`click` desc")->limit($limit)->select();

	}


}
 ?>