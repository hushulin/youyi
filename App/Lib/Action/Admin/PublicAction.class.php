<?php
// 本类由系统自动生成，仅供测试用途
class PublicAction extends Action {
    public function login(){
    	if(is_login()){
    		$this->redirect("/Admin/Index/index");
    	}
    	if(IS_POST){
    		$username = I("post.username","","trim,stripslashes,strip_tags");
    		$pwd = I("post.pwd","","trim,stripslashes,strip_tags");
    		$chkcode = I("post.chkcode","","trim,stripslashes,strip_tags");
    		if($_SESSION['verify'] != md5($chkcode)) {
			   $this->error('验证码错误！');
			}
    		$uid = $this->dologin($username, $pwd);
    		if($uid > 0) {
    			$this->success('登录成功！', "/Admin/Index/index");
    		}else{
    			if($uid == -1) {$this->error('用户名密码不对!');}
    			else if($uid == -2) {$this->error('密码不对!');}
    			else {$this->error('未知错误!');}
    		}
    	}else{
    		$this->display();
    	}
    }

    public function logout(){
        $this->dologout();
        $this->success('退出登录成功！', "/Admin/Public/login");
    }

    Public function verify(){
	    import('ORG.Util.Image');
	    Image::buildImageVerify();
	}

    public function dologin($username = "", $pwd = ""){
        $user = M()->query("select * from app_admin where uname = '{$username}'");
        if($user){
            $user = $user[0];
            if(md5($pwd) == $user["pwd"]){
                session("auid",$user["id"]);
                session("auname",$user["auname"]);
                return $user["id"]; 
            }else{
                return -2; //密码不对
            }
        }else{
            return -1;//用户名密码不对
        }
    }

    public function dologout(){
        session('auid',null);
        session('[destroy]');
    }

    public function img(){
        
        import("ORG.Util.Image");
        $pic = I("get.pic","","trim,stripslashes,strip_tags");
        $width = I("get.w","","trim,stripslashes,strip_tags,intval");
        $height = I("get.h","","trim,stripslashes,strip_tags,intval");
        $file_info  = pathinfo($pic);
        if((!empty($width)) and (!empty($height))){
            $thumb_img = $file_info["dirname"]."/".$file_info["filename"]."_{$width}_{$height}.".$file_info["extension"];
            if(!file_exists($thumb_img)){
                $Image = new Image();
                Image::thumb2($pic, $thumb_img, "", $width, $height);               
            }
            $fileres = file_get_contents($thumb_img); //FALSE if 404     
        }else{
            $fileres = file_get_contents($pic); //FALSE if 404            
        }
        header('Content-type: image/jpeg');
        echo $fileres;
    }
}