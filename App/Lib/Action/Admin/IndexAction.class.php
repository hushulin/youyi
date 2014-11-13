<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends AdminAction {
    public function index(){
		$this->display();
    }

    //keditor编辑器上传图片处理
    public function keupload(){
        $type = I("get.dir","","trim,stripslashes,strip_tags");
        /* 返回标准数据 */
        $return  = array('error' => 0, 'info' => '上传成功', 'data' => '');
        if(IS_POST){
            if($type == "image"){
                $img = false;
                $re = uploadImage();
                if($re){
                    $url = $re[0]['savepath'].$re[0]['savename'];
                    $img['fullpath'] = __ROOT__.$url;
                }
            }else if($type == "file"){
                $img = false;
                $re = uploadFile();
                if($re){
                    $url = $re[0]['savepath'].$re[0]['savename'];
                    $img['fullpath'] = __ROOT__.$url;
                }
            }
            
            /* 记录附件信息 */
            if($img){
                $return['url'] = $img['fullpath'];
                unset($return['info'], $return['data']);
            } else {
                $return['error'] = 1;
                $return['message']   = "上传文件错误";
            }            
        }

        /* 返回JSON数据 */
        exit(json_encode($return));
    }
}