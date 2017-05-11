<?php
namespace Home/Controller;
use Home/Controller;
class LoginController extends Controller{
	
	public function login_list()
	{
		 if(IS_POST)
		 {
			   //接受帐号和密码
			   $user=I("post.user");
			   $pass=I("pass");
			   $yzm=I("yzm");
			   if($yzm=="")
			   {
				     $this->assign("验证码不正确");
			   }
			   if($user=="")
			   {
				     alert("帐号不正确");
				    //$this-assign("帐号不能为空");
				     return false;
			   }
			   if($pass=="")
			   {
				       $this-assign("密码不能为空");
				   
			   }
			   
		 }
		 
		 
		 $this->display();
	}
}


?>