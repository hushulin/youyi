<?php 
/**
* 获取基础数据控制器
*/
class GetinfoAction extends Action
{
	public function _initialize()
	{
		$nav = $this->getNav();
		$this->assign('nav',$nav);
		// 标题
		$head_title = "优异车品官方站";
		$this->assign('head_title',$head_title);
		// 关于我们
		$about_us = $this->getArticle(1,3);
		$this->assign('about_us',$about_us);
		// 商户合作
		$hezuo = $this->getArticle(2,3);
		$this->assign('hezuo',$hezuo);
		// 保养维护
		$baoyang = $this->getArticle(3,3);
		$this->assign('baoyang',$baoyang);
		// 车品导购
		$buy = $this->getArticle(4,3);
		$this->assign('buy',$buy);

		// 公告文章
		$article_gg = $this->getArticle(5,3);
		// 入门文章
		$article_rm = $this->getArticle(6,3);
		// 公益文章
		$article_gy = $this->getArticle(7,3);

		$this->assign('article_gg',$article_gg);
		$this->assign('article_rm',$article_rm);
		$this->assign('article_gy',$article_gy);

	}

	// 导航
	private function getNav()
	{
		$model = D('Nav');
		$nav = $model->where("`is_show` = 1")->order("`sort` desc")->select();
		return $nav;
	}

	// 取文章
	private function getArticle($type='', $limit = 3)
	{
		return D('Article')->where("`cate_id` = {$type}")->order("`click` desc")->limit($limit)->select();

	}
}
 ?>