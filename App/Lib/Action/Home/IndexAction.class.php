<?php 
/**
* 主页
*/
class IndexAction extends EmptyAction
{
	// 首页
	public function index()
	{
		// 车品分类
		$cate = D('Cargoodscate')->order("`sort` desc")->select();
		// 首页大图广告
		$adv_big = D('Adv')->where("`position` = 1")->find();
		// 首页banner广告
		$adv_banner1 = D('Adv')->where("`id` = 3")->find();
		// 首页banner广告
		$adv_banner2 = D('Adv')->where("`id` = 4")->find();
		
		// 可能你会感兴趣
		$chepin_xq = $this->getChepin(1,4);
		// 本地活动1
		$chepin_active1 = $this->getChepin(2,2);
		// 本地活动2
		$chepin_active2 = $this->getChepin(2,3);
		// 爱车中心
		$chepin_aiche = $this->getChepin(3,4);
		// 车品推荐
		$chepin_tj = $this->getChepin(4,4);
		// 发现精彩...
		$chepin_fx = $this->getChepin(5,4);
		// 汽车后市场的那点知识
		$knowlege_asc = D('Article')->where("`cate_id` = 8")->order("`click` asc")->limit(5)->select();
		$knowlege_desc = D('Article')->where("`cate_id` = 8")->order("`click` desc")->limit(5)->select();

		$this->assign('adv_big',$adv_big);
		$this->assign('adv_banner1',$adv_banner1);
		$this->assign('adv_banner2',$adv_banner2);
		$this->assign('cate',$cate);
		$this->assign('chepin_xq',$chepin_xq);
		$this->assign('chepin_active1',$chepin_active1);
		$this->assign('chepin_active2',$chepin_active2);
		$this->assign('chepin_aiche',$chepin_aiche);
		$this->assign('chepin_tj',$chepin_tj);
		$this->assign('chepin_fx',$chepin_fx);
		$this->assign('knowlege_asc',$knowlege_asc);
		$this->assign('knowlege_desc',$knowlege_desc);

		$this->display();
	}

	// 列表页
	public function lists()
	{
		$type_id = I('get.type_id');
		$cate_id = I('get.cate_id');
		$model = D('Cargoods');
		if (!empty($type_id)) {
			$where['type_id'] = $type_id;
		}
		if (!empty($cate_id)) {
			$where['cate_id'] = $cate_id;
		}

		import('ORG.Util.Page');// 导入分页类

		$count = $model->where($where)->order("`create_time` desc")->count();
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$list = $model->where($where)->order("`create_time` desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach ($list as $key => $value) {
			$list[$key]['type_name'] = D('Type')->getFieldById($value['type_id'],'name');
			$list[$key]['good_number'] = D('Worth')->where("`goods_id` = {$value['id']}")->count();
			$list[$key]['comment_number'] = D('Comment')->where("`goods_id` = {$value['id']}")->count();
			$list[$key]['collection_number'] = D('Collection')->where("`goods_id` = {$value['id']}")->count();

			$list[$key]['comment_list'] = D('Comment')->where("`goods_id` = {$value['id']}")->select();
		}
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('cate_name',D('Cargoodscate')->where("`id` = {$cate_id}")->getField('title'));
		// 车品分类
		$cate = D('Cargoodscate')->order("`sort` desc")->limit(8)->select();
		$this->assign('cate',$cate);
		// TYPE
		$cc = D('Type')->select();
		$this->assign('cc',$cc);
		$this->display();
	}

	// 详细
	public function detail()
	{
		$id = I('get.id');
		$model = D('Cargoods');
		$goods = $model->find($id);
		$goods_prev = $model->where("`id` < {$id}")->order("`id` desc")->find();
		$goods_next = $model->where("`id` > {$id}")->order("`id` asc")->find();
		$goods['type_name'] = D('Type')->getFieldById($goods['type_id'],'name');
		$goods['good_number'] = D('Worth')->where("`goods_id` = {$goods['id']}")->count();
		$goods['comment_number'] = D('Comment')->where("`goods_id` = {$goods['id']}")->count();
		$goods['collection_number'] = D('Collection')->where("`goods_id` = {$goods['id']}")->count();

		$goods['comment_list'] = D('Comment')->where("`goods_id` = {$goods['id']}")->select();
		$this->assign('head_title','车品详细');
		$this->assign('goods',$goods);
		$this->assign('goods_prev',$goods_prev);
		$this->assign('goods_next',$goods_next);
		$this->display();
	}

	// 文章内容
	public function article()
	{
		$id = I('get.id');
		$model = D('Article');
		$article = $model->find($id);
		$article_prev = $model->where("`id` < {$id}")->order("`id` desc")->find();
		$article_next = $model->where("`id` > {$id}")->order("`id` asc")->find();
		$this->assign('article',$article);
		$this->assign('article_prev',$article_prev);
		$this->assign('article_next',$article_next);
		$this->assign('head_title','文章详细');
		$this->display();
	}

	// 取文章
	private function getArticle($type='', $limit = 3)
	{
		return D('Article')->where("`cate_id` = {$type}")->order("`click` desc")->limit($limit)->select();

	}

	// 取车品
	private function getChepin($type='', $limit = 4)
	{
		$tipslist = D('tipslist');
		$cargoods_id_list = $tipslist->where("`position_id` = {$type}")->select();
		foreach ($cargoods_id_list as $key => $value) {
			$cargoods_ids[] = $value['cargoods_id'];
		}
		$cargoods_ids_clear = array_unique($cargoods_ids);
		$cargoods = D('cargoods');
		$where['id'] = array('IN',$cargoods_ids_clear);
		$list = $cargoods->where($where)->order("`create_time` desc")->limit($limit)->select();
		foreach ($list as $key => $value) {
			$list[$key]['type_name'] = D('Type')->getFieldById($value['type_id'],'name');
			$list[$key]['good_number'] = D('Worth')->where("`goods_id` = {$value['id']}")->count();
			$list[$key]['comment_number'] = D('Comment')->where("`goods_id` = {$value['id']}")->count();
			$list[$key]['collection_number'] = D('Collection')->where("`goods_id` = {$value['id']}")->count();

			$list[$key]['comment_list'] = D('Comment')->where("`goods_id` = {$value['id']}")->select();
		}
		return $list;
	}
}
 ?>