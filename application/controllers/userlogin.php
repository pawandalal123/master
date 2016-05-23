<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserLogin extends MY_AppController {	
	function __construct() {
    	parent::__construct();
	}	
	
			public function login()
			{
				
				if($this->input->post('userlogin'))
				{
					$this->CheckUserLogin();
				}
				if($this->input->post('registerwithus'))
				{
					$this->registerwithus();
				}
				$this->data['view_file'] = 'user/login';
				$this->load->view('layouts/logindefault', $this->data); 
			}
			 public function CheckUserLogin()
		     {
			               							
		                    $userLoginDetails = $this->input->post();
							$where="email_id = '".$userLoginDetails['email']."' and password='".md5($userLoginDetails['password'])."'";
							$this->form_validation->set_rules('email', 'email', 'required');
			                $this->form_validation->set_rules('password', 'password', 'required');
		                    $CheckLoginQuery = $this->db->where($where)
					 		                     ->get('user_signup');	
							//echo $this->db->last_query();
							
							$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
			  
                            if ($this->form_validation->run())
			                 {
							 if($CheckLoginQuery->num_rows() > 0)
							{
								$CheckLoginData = $CheckLoginQuery->row();
						       $newdata = array(
                             //  'username'  => 'johndoe',
							   'UserId'     => $CheckLoginData->id,
                               'email'     => $CheckLoginData->email_id,
							   'mobile'    => $CheckLoginData->mobile_no,
							   'emailstatus'     => $CheckLoginData->email_status,
							   'mobilestatus'    => $CheckLoginData->mobile_status,
							   'DisplayName'    => $CheckLoginData->profile_name,
							   'DisplayAddress'    => $CheckLoginData->permanent_address,
                               'logged_in' => TRUE
                                     );

                               $this->session->set_userdata($newdata);
							   redirect(SITE_URL.'user/profile');
		                    
							}
							 else
							 {
								$this->data['err_msg'] = 'Login Details Do Not Match.';  
							  }
							 }
		}
		
			public function registerwithus()
			{
							$userData = $this->input->post();
							@extract($userData );
				$this->form_validation->set_rules('username', 'Name', 'required');
				$this->form_validation->set_rules('useremail', 'Email ', 'required|is_unique[user_signup.email_id]');
							$this->form_validation->set_rules('usermobile', 'Mobile', 'required_numeric');
							$this->form_validation->set_rules('address', 'Address', 'required');
								//echo $this->db->last_query();
					 $this->form_validation->set_error_delimiters('<p class="req">', '</p>');
							if ($this->form_validation->run())
				{
								 $newPass = chr(rand(65,90)).chr(rand(65,90)).rand(89258,28244225);
								 $userData = array('email_id'=>$useremail,
												   'profile_name'=>$username,
												   'mobile_no'=>$usermobile,
												   'permanent_address'=>$address,
												   'password'=>$newPass ,
												   'enroll_date'=>date('Y-m-d'));
								  $insert = $this->db->insert('user_signup',$userData );
								  $userLoginId = $this->db->insert_id();
								  $newdata = array(
								 //  'username'  => 'johndoe',
								   'UserId'     => $userLoginId,
								   'email'     => $useremail,
								   'mobile'    => $usermobile,
								   'emailstatus'     => 'Pending',
								   'mobilestatus'    => $usermobile,
								   'DisplayName'    => $username,
								   'DisplayAddress'    => $address,
								   'logged_in' => TRUE
										 );
	
								   $this->session->set_userdata($newdata);
								   $to=$useremail;
															$from='info@electrical.com';
															$subject='Welcome to Indiabiztrade!!';
															$body='<div style="width:600px; margin:0 auto; height:510px; border:solid 1px #A9A9A9; padding:1%;">
	<span style="float:left;"><img src="'.WEBROOT_PATH_IMAGES.'logo.png" alt="" title="" width="118" height="111" /></span> 
	<div style="float:right; width:50%;">
	<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:16px; padding:10% 0% 0.8% 0.2%; width:80%; color:#000;">Questions?</span>
	<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:20px; padding:0% 0% 0.8% 0.2%; width:100%; color:#78B205;">+91 124 4113661</span>
	<span style="float:right; text-align:right; font-family:"Aller",Arial, Helvetica, sans-serif; font-size:13px; padding:1% 0% 0.8% 0.2%; width:100%; color:#000;">Mon-Sat: 8am - 10pm <a href="mailto:info@indiabiztrade.com" style="color:#71AC05;">info@indiabiztrade.com</a> </span>
	</div>
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#000; text-align:left; padding:7% 0.5% 0.8% 0%;">Dear '.$username.',</span>
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:left; padding:1% 0.5% 0.8% 0%; line-height:19px;">Welcome to Indiabiz Trade (India Largest Market Place). To log in when visiting our site just click <a href="'.SITE_URL.'login'.'" style="color:#71AC05;">Login</a>  at the top of every page, and then enter your e-mail address and password.</span>
	<span style="float:left; width:100%;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:dashed 1px #A9A9A9; padding:1%; margin-top:1%;">
	  <tr>
		<td><span style="float:left; padding:1% 0.5% 0.2% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">Use the following email address when prompted to log in:</span></td>
	  </tr>
	  <tr>
		<td><span style="float:left; padding:1% 0.5% 1% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">E-mail: <a href="#" style="color:#71AC05;">'.$useremail.'</a></span></td>
	  </tr>
	   <tr>
		<td><span style="float:left; padding:1% 0.5% 1% 2%; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">Password: <a href="#" style="color:#71AC05;">'.$newPass.'</a></span></td>
	  </tr>
	</table>
	</span>
	<span style="float:left; padding:2% 0.5% 0% 0%; font-weight:bold; font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#000; text-align:left; width:100%;">When you log in to your account, you will be able to do the following: </span>
	<span style="float:left; width:100%; margin-left:-4%; text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; line-height:19px;">
	<ul>
	<li>Proceed through checkout faster when making a purchase</li>
	<li>Check the status of orders</li>
	<li>View past orders</li>
	<li>Make changes to your account information</li>
	<li>Change your password</li>
	<li>Store alternative addresses (for shipping to multiple family members and friends!)</li>
	</ul>
	</span>
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:left; padding:1% 0.5% 0.8% 0%; line-height:19px;">If you have any questions about your account or any other matter, please feel free to contact us at <a href="#" style="color:#71AC05;">info@indiabiztrade.com</a> or by phone at <em style="color:#71AC05;">+91 124 4113661</em>.</span>
	<span style="clear:both"></span>
	
	<span style="clear:both;"></span><br />
	</div>
	<div style="background:#DFDFDF;  width:614px; margin:0 auto;  height:75px;  padding:0% 0.5% 0.5% 0.5%; border-bottom:solid 1px #A9A9A9; border-left:solid 1px #A9A9A9; border-right:solid 1px #A9A9A9">
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#8D8D8D; text-align:center; padding:1% 0.5% 0.8% 0%; line-height:19px;">Copyright © 2015. Indiabiz Trade . Any other trademarks or trade names are properties of their respective owners. </span>
	<span style="float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#8D8D8D; text-align:center; padding:1% 0.5% 0.8% 0%; line-height:19px;">Indiabiz Trade  | M-23 Sector 14, Gurgaon, India</span>
	</div>';
									$mail=$this->common->sendemail($to,$from,$subject,$body); 
								   //$this->data['register_msg'] = '';  
									redirect(SITE_URL.'user/profile');
				}
			}
			
			public function logout()
			 {
							   $newdata = array(
								 //  'username'  => 'johndoe',
								   'UserId'     => $this->session->userdata('UserId'),
								   'email'     =>$this->session->userdata('email_id'),
								   'mobile'    => $this->session->userdata('mobile_no'),
								   'emailstatus'     =>$this->session->userdata('email_status'),
								   'mobilestatus'    => $this->session->userdata('mobile_status'),
								   'DisplayName'    => $this->session->userdata('profile_name'),
								   'DisplayAddress'    =>$this->session->userdata('permanent_address'),
								   'logged_in' => TRUE
										 );
							  $this->session->unset_userdata($newdata);
							  redirect(SITE_URL);
							  
										 
			}	
	}
?>