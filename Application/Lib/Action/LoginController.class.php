<?php
namespace Home/Controller;
use Home/Controller;
class LoginController extends Controller{
	
	public function login_list()
	{
		 if(IS_POST)
		 {
			   //�����ʺź�����
			   $user=I("post.user");
			   $pass=I("pass");
			   $yzm=I("yzm");
			   if($yzm=="")
			   {
				     $this->assign("��֤�벻��ȷ");
			   }
			   if($user=="")
			   {
				     alert("�ʺŲ���ȷ");
				    //$this-assign("�ʺŲ���Ϊ��");
				     return false;
			   }
			   if($pass=="")
			   {
				       $this-assign("���벻��Ϊ��");
				   
			   }
			   
		 }
		 
		 
		 $this->display();
	}
}


?>