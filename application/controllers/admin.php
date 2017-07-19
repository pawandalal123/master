<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_AppController {	
	function __construct(){
    	parent::__construct();
		//load the model
		$this->load->model("admin_model");
}	
//index() action is the default action of this controller, it is executed at first
public function index(){
	 if($this->session->userdata('isLoggedIn') ) {
	 //if session is set redirect to dashboard
       redirect('/admin/dashboard');
    } else {
       $this->show_login(false);
    }
}
//	validateAdmin() action redirect to login page if session is not set
public function validateAdmin()
	{
	 if(!$this->session->userdata('isLoggedIn') ) {
     redirect('/admin');
    }
}

//login  process start from here
//updated date 18/04/2014 
// updated by Arun Kumar
public function login(){
     //if session is set then it redirect to dashboard
	 if($this->session->userdata('isLoggedIn') ) {     
        redirect('/admin/dashboard');
     }	
		$this->form_validation->set_rules('login_id', 'Login Id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('login_password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
	 // if any feild is got empty then redirect to login page and show message
	if($this->form_validation->run() == FALSE) {          
		$this->data['view_file']  = 'admin/login';
		$this->load->view('layouts/admin/admin_blank', $this->data); 
	}else{
		// Login Id and password from the form POST
		$login_id = $this->input->post('login_id');
		$pass  = md5($this->input->post('login_password'));
     // If the user is valid, redirect to the dashboard
	if( $login_id && $pass && $this->admin_model->validate_user($login_id,$pass)) {
		 redirect('/admin/dashboard');	   
	}else{
		  // Otherwise show the login screen with an error message.
			$this->show_login(true);
		}
	}
}	
// show_login function load the error on the login view	
function show_login( $show_error = false ) {
    $this->data['error'] = $show_error;
    $this->data['view_file']  = 'admin/login';
	$this->load->view('layouts/admin/admin_blank', $this->data); 
}
// logout function unset the user session and redirect to login
function logout() {
         //remove all session data
         $this->session->unset_userdata('isLoggedIn');
         $this->session->sess_destroy();
         redirect('/admin');
 }
// load the dashboard view on default layout 
public function dashboard(){
	  
		$this->data['view_file']  = 'admin/dashboard';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}

//login  process end here server_process





	
// admin all action/process start from here
//updated date 18/04/2014 
// updated by Arun Kumar
// view_admin function load the respective view on default layout
public function view_admin(){
	 $this->validateAdmin();
		
	 $where=array('member_type'=>1);
     $adminData=$this->admin_model->select_data('admin','*',$where);
	 $this->data['rows']  = $adminData;
	 $this->data['view_file']  = 'admin/view_admin';
	 $this->load->view('layouts/admin/admin_default', $this->data); 
}
	 
//add_admin function add the admin details 	 
public function add_admin(){
		
		$this->form_validation->set_rules('fname', 'firstname', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lname', 'lasttname', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
	// if any feild is got empty then redirect to view_admin page and show validation message
	//  otherwise add admin details  with success message
	// add_data function taking two parameter 1.table name & 2 value to be inserted in array format
 	if($this->form_validation->run() == FALSE) {
		
		$this->data['view_file']  = 'admin/view_admin';
		$this->load->view('layouts/admin/admin_default', $this->data);
    } else {
			$rdate=date('d-m-Y  h:i:s');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$mobile  = $this->input->post('mobile');
			$country=$this->input->post('country');
		    $insData=array('firstname' => $fname,
							'lastname' => $lname,
							'email' => $email,
							'country' => $country,
							'mobile' => $mobile,
							'password' => $password,
							'registration_date'=>$rdate,
							'member_type'=>1,
							'status'=>1
			   );
			
			$lastId=$this->admin_model->add_data('admin',$insData);
			//if inseted successfully then we get last insert id
			if($lastId){
			  $msg="Inserted successfully";
			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
			  redirect('/admin/view_admin','refresh');
			
			}
			  
	  }
}
// deleteAdmin delete the row of given parameter 
//parameter is Id of the record to be deleted
public function deleteAdmin($adminId = false)
	{
	
	  $adminArray=array("user_id" => $adminId);
	  $deletionStatus=$this->admin_model->delete_db('admin',$adminArray);
	  //if deleted
	 if($deletionStatus){
		  $msg="Record Deleted successfully";
		  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'suc'));
		  redirect('/admin/view_admin','refresh');
	  }else{			  
		  $msg="Record not deleted!";
		  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'err'));
		  redirect('/admin/view_admin','refresh');
	  }
}
// activeDeactiveAdmin active or deactive the row of given parameter depending on status_mode
//parameter is Id of the record to be active or deactive
public function activeDeactiveAdmin($adminId = false,$status_mode=false)
	{
	  $where=array("user_id"=>$adminId);
	if($status_mode=='deActive'){
	    $cols=array("status"=>1);
		$msgStatus='Activated';
	 } else if($status_mode=='Active'){
		 $cols=array("status"=>0);
		 $msgStatus='Deactivated';
	 }
	  $affected_row=$this->admin_model->active_deactive_db('admin',$cols,$where);
	 if($affected_row){
			  $msg="$msgStatus Successfully";
			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
			  redirect('/admin/view_admin','refresh');
	 }else{
			  
              $msg=" Status Not Changed !";
			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
			  redirect('/admin/view_admin','refresh');
	 }
}


// changePassword  function change the password of admin

public function changePassword(){
		
		
		$this->form_validation->set_rules('npassword', 'New Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
 	  if($this->form_validation->run() == FALSE) {
		
			$this->data['view_file']  = 'admin/dashboard';
			$this->load->view('layouts/admin/admin_default', $this->data);
      } else {
			
			$password = sha1($this->input->post('npassword'));
			 $id=$this->session->userdata('id');
		  if($id){
				$updData=array('password' => $password);
				$where=array('user_id'=>$id);		 
			  
			 $last_id=$this->admin_model->change_password('admin',$updData,$where);
			  if($last_id){
			   $msg=" Password Changed successfully";
			   $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
			   redirect('/admin/dashboard','refresh');
					  
			  }else{
			  
			  $msg="Password Not Changed!";
			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
			  redirect('/admin/dashboard','refresh');
			  }
		 }  
	  }
}
// changePic() function changed the admin profile picture 
public function changePic(){
            $user_id = $this->input->post('user_id'); 
            $image = $_FILES['image']['name'];
		 //if $image is not empty	
		 if($image!=""){
		    $action='/admin/view_admin'; // it is the page where redirect if file type not match
			$cols='profile_image';
			$up_path= 'profile_img';
			$input_name='image';
			$image_name=$this->upload_image($up_path,$input_name,$image,$action);
			//$image_name is the unique name return by upload image function;
			$where=array('user_id'=>$user_id);
		    $upData=array('profile_image' => $image_name);
			//$update_status is the effected row
			$update_status=$this->admin_model->update_data('admin',$upData,$where);
			if($update_status){
			  
				  $msg="Changed Successfully";
				  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
				  redirect('/admin/view_admin','refresh');	 
			
			}else{	
				  $msg="Not Changed ";
				  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
				  redirect('/admin/view_admin','refresh');	  
		        }
	     } else{
		  $msg="Please Select New Photo ? ";
		  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
		  redirect('/admin/view_admin','refresh');
	 
	   }
 }
// admin all action/process end here
//upload_image() is common function used to upload images in given parameter
//parameter:$path is the path where user want to upload
//parameter $feild_name is the input tag name
//parameter $img_name is the image name to be uploaded
public function upload_image($path,$feild_name,$img_name,$page=false)
	{
		$config['upload_path'] = 'upload/'.$path.'/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '10000';
		$config['file_name'] = time().'_'.$img_name;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
	if (!$this->upload->do_upload($feild_name))
	 {
	    // if not uploaded show the error message
		   $error = array('error' => $this->upload->display_errors());
		   $msg=$error['error'];
		   $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
		   redirect($page,'refresh');
	 }
	 else
	 {
		$upload_data = $this->upload->data();
		$filename=$upload_data['file_name'];
		return $filename;
		
      }
}
	
	
//	popup() function is commonly used everywhere to open popup form
public function popup(){
	     
		$dataArray = $this->input->post();
		$id=$dataArray['id'];
		$part=$dataArray['part'];
	if($part=='editCategoy'){
		$table='category';
		$col_id='cat_id';
		$content='modal_content';
	}else if($part=='profile'){
		$table='admin';
		$col_id='user_id';
		$content='profile_content';
	}else if($part=='editSubCategoy'){
		$table='subcategory';
		$col_id='sub_cat_id';
		$content='modal_sub_category';
		
	}else if($part=='readPage'){
		$table='page_content';
		$col_id='page_id';
		$content='modal_page_content';
		$cols='content';
	}else if($part=='leadReq'){
		$table='buy_leads';
		$col_id='lead_id';
		$content='modal_leads';
		$cols='requirment';
		
	}else if($part=='editAds'){
		$table='display_adds';
		$col_id='image_id';
		$content='modal_ads';
		
	}else if($part=='profilePic'){
		$table='admin';
		$col_id='user_id';
		$content='modal_photo';
	
	}
if($id){
		
	  $where=array($col_id=>$id);
	if($part=='editSubCategoy'){
		$secondTbl='category';
		$cols='cat_id,category';
		$catRow=$this->admin_model->select_data($secondTbl,$cols);
		$catArray=$this->admin_model->select_data($table,'*',$where);
		$this->data['catd'] = $catRow;
		$this->data['res'] = $catArray[0];
		$this->data['view_file']  = 'admin/'.$content;
		$this->load->view('layouts/empty', $this->data);
	} else if($part=='readPage'){
	    $catArray=$this->admin_model->select_data($table,$cols,$where);
		$this->data['res'] = $catArray[0];
		$this->data['view_file']  = 'admin/'.$content;
		$this->load->view('layouts/empty', $this->data);
	
	}else{
		$catArray=$this->admin_model->select_data($table,'*',$where);
		$this->data['res'] = $catArray[0];
		$this->data['view_file']  = 'admin/'.$content;
		$this->load->view('layouts/empty', $this->data);
		 }
	}
}


public function addPopup(){
	    $dataArray = $this->input->post();
		$part=$dataArray['part'];	
	
  if($part=='add_subcat'){
		$table='category';
		$cols="cat_id,category";
		$content='modal_add_subcategory';
  }else if($part=='upload_subcat_excel'){
		$table='category';
		$cols="cat_id,category";
		$content='upload_subcat_excel';
	}
	   
	if($part){   
	if($part=='add_subcat'){
			$catArray=$this->admin_model->select_data($table,$cols);
			
			$this->data['rows'] = $catArray;
			$this->data['view_file']  = 'admin/'.$content;
			$this->load->view('layouts/empty', $this->data);
	}else if($part=='upload_subcat_excel'){
			$catArray=$this->admin_model->select_data($table,$cols);
			
			$this->data['rows'] = $catArray;
			$this->data['view_file']  = 'admin/'.$content;
			$this->load->view('layouts/empty', $this->data);
		}
	}
}
	 
// category all actions start
// updated date 18/04/2014 
// updated by Arun Kumar
// category() function load the respective view on default layout
public function category(){
	    $this->validateAdmin();
	    $catData=$this->admin_model->select_data('category');
		$this->data['rows']  = $catData;
		$this->data['view_file']  = 'admin/view_category';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
//add_category() function add the category details	
public function add_category(){
		
		$this->form_validation->set_rules('cat', 'Category Name', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
 	  if($this->form_validation->run() == FALSE) {
			$this->data['view_file']  = 'admin/view_category';
			$this->load->view('layouts/admin/admin_default', $this->data);
      } else {
			$status=1;
			$cat = $this->input->post('cat');
			$image = $_FILES['image']['name'];
		//if $image is not empty
		 if($image!=""){
		        $action='/admin/category'; // it is the page where redirect if file type not match
				$name=$image;
				$up_path= 'catImage';
				$input_name='image';
				$image_name=$this->upload_image($up_path,$input_name,$name,$action);
		  } else{
			    $image_name=0;
			    }

		  $insData=array('category' => $cat,
		  'image' => $image_name,
		  'status'=>$status
           );
			 
			 $lastId=$this->admin_model->add_data('category',$insData);
				  if($lastId){
					  $msg="Inserted successfully";
					  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
					  redirect('/admin/category','refresh');
			       }
			 
	        }
}

//deleteCat() action delete the specified category	
public function deleteCat($catId = false)
	{
		 $where=array("cat_id"=>$catI);
		 $affected_row=$this->admin_model->delete_db('category',$where);
	  if($affected_row){
			  $msg="Record Deleted successfully";
			  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
			  redirect('/admin/category','refresh');
		}else{
			  
              $msg=" Record not deleted !";
			  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
			  redirect('/admin/category','refresh');
		}
}
//activeDeactiveCategory() action active or deactive the specified category on the basis of $status_mode	
public function activeDeactiveCategory($catId = false,$status_mode=false)
	{
	  $where=array("cat_id"=>$catId);
	 if($status_mode=='deActive'){
			$cols=array("status"=>1);
			$msgStatus='Activated';
	   } else if($status_mode=='Active'){
			 $cols=array("status"=>0);
			 $msgStatus='Deactivated';
		}
	      $affected_row=$this->admin_model->active_deactive_db('category',$cols,$where);
	     if($affected_row){
				  $msg="$msgStatus Successfully";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
				  redirect('/admin/category','refresh');
			}else{
			  
				  $msg=" Status Not Changed !";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
				  redirect('/admin/category','refresh');
			  }
 }

//update_category() action update the specified category	
public function update_category()
	{
	
	    $this->form_validation->set_rules('cat', 'Category Name', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
 	  if($this->form_validation->run() == FALSE) {
		
		    $this->data['view_file']  = 'admin/view_category';
		    $this->load->view('layouts/admin/admin_default', $this->data);
        } else {
			
			 $cat = $this->input->post('cat');
			 $cat_id = $this->input->post('cat_id');
			 $image = $_FILES['image']['name'];
		   if($image!=""){
		        
				
				$action='/admin/category'; // it is the page where redirect if file type not match	
				$name=$image;
				$up_path= 'catImage';
				$input_name='image';
				
				$image_name=$this->upload_image($up_path,$input_name,$name,$action);
			
		   } else{
			    $image_name=false;
			    }
			
		    if($image_name!=""){
			     //$image_name is not empty
		         $upData=array('category' => $cat,
		            'image' => $image_name
			         );
				
			  } else{
			       //$image_name is empty
			       $upData=array('category' => $cat);
			       }
			   
			   $where=array("cat_id"=>$cat_id);
			  // print_r($insData);
			   $update_status=$this->admin_model->update_data('category',$upData,$where);
				 if($update_status){
					  $msg=" Updated successfully";
					  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
					  redirect('/admin/category','refresh');
				 }else{	
					  $msg="Updation error";
					  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
					  redirect('/admin/category','refresh');	  
			         }
			 
	        }
}

// category all actions end here//
	
// Subcategory all actions start
// updated date 18/04/2014 
// updated by Arun Kumar
// subcategory() function load the respective view on default layout
/*public function subcategory(){
	 $this->validateAdmin();
	  $subCategoryData = $this->db->select('subcategory.sub_cat_id,subcategory.status,subcategory.subcategory,category.cat_id,category.category')
									 ->join('subcategory' , 'category.cat_id=subcategory.cat_id','left')
									 ->get('category')
									 ->result();
			                       //pr($subCategoryData);die;					
		 							  
		      $categoryData = array_map("filterUniqueCategory", $subCategoryData);	
		      $tmp = array();
              foreach ($categoryData as $item) {
			      //Doing unique the $categoryData array
				  if (!in_array($item['cat_id'], $tmp)) {
				  $uniqueCat[] = $item;
				  $tmp[] = $item['cat_id'];
			  	  }
               }				
	   
		$this->data['catrow'] = $uniqueCat;
	    $this->data['rows']  = $subCategoryData;
		$this->data['view_file']  = 'admin/view_sub_category';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}*/

public function subCatListDataTables(){
			$this->load->library('Datatables');
			$activateUrl = '<img src="'.WEBROOT_PATH_IMAGES.'green_icon.png" alt="Activated" title="Active" />';
			$deactivateUrl = '<img src="'.WEBROOT_PATH_IMAGES.'red_icon.png" alt="Activated" title="Deactive" />';
			$this->datatables
					->select("tbl_subcategory.sub_cat_id, tbl_subcategory.subcategory, tbl_category.cat_id, tbl_category.category, if(tbl_subcategory.status=1, '$activateUrl' ,'$deactivateUrl') as status,if(tbl_subcategory.status=1,'Active','deActive') as statusValue" , false)
					->from('tbl_subcategory as tbl_subcategory')
					->join('tbl_category as tbl_category' , ' tbl_category.cat_id = tbl_subcategory.cat_id','left')
					->unset_column('tbl_subcategory.sub_cat_id')
					->unset_column('tbl_category.cat_id')
					->unset_column('statusValue')
					->add_column('action', "<a href='#modal-regular2' data-toggle='modal' title='Edit' class='btn btn-xs btn-default editSubCat' rel='$1'><i class='fa fa-pencil'></i></a><a href='deleteSubCat/$1' onclick='return confirm(\"Are You Sure to delete\")' data-toggle='tooltip' title='Delete' class='btn btn-xs btn-danger'><i class='fa fa-times'></i></a><a href='".SITE_URL."admin/activeDeactiveSubCategory/$1/$2'  title='Change Status' class='btn btn-xs btn-default chgStatus'>Change</a>", "tbl_subcategory.sub_cat_id,statusValue" );
	
	
   echo $this->datatables->generate();

}


public function subcategory(){	  
	    $this->validateAdmin();	
		$this->data['view_file']  = 'admin/datatable_view';
		$this->load->view('layouts/admin/admin_datatable', $this->data);  
}

//addexcel() action add the upload subcategory excel sheet details	
public function addexcel(){
	$this->load->library('excel');
	$this->form_validation->set_rules('cat', 'Category Name', 'trim|required|xss_clean');
	$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
    if($this->form_validation->run() == FALSE) {
			//if any feild got empty the redirect 
			$this->data['view_file']  = 'admin/datatable_view';
		    $this->load->view('layouts/admin_datatable', $this->data);
     } else {
	
			if($_FILES['excelfile']['size'] > 0){
			
			$filename = $_FILES['excelfile']['tmp_name']; 
			$objPHPExcel = PHPExcel_IOFactory::load($filename);
			$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
			$cat = $this->input->post('cat');
			$status = 1;
			unset($sheetData[0]);
			
			 foreach($sheetData as $sdata){
			 if($sdata[0]=="") continue;
			
				    $subcat=trim(addslashes($sdata[0]));
				    $insData=array('cat_id' => $cat,
							 'subcategory' => $subcat,
							 'status' => $status
							   );
							 $last_id=$this->admin_model->add_data('subcategory',$insData);
						
				} 
						if($last_id){
							 $msg="Inserted successfully";
							 $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
							 redirect('/admin/subcategory','refresh');
						}
	      }
     }
}
//addSubCategory() action add the  subcategory  details	
public function addSubCategory(){
	
	$this->form_validation->set_rules('cat', 'Category Name', 'trim|required|xss_clean');
	$this->form_validation->set_rules('subcat', 'Sub Category', 'trim|required|xss_clean');
	$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
 	   if($this->form_validation->run() == FALSE) {
			//if any feild got empty the redirect 
			$this->data['view_file']  = 'admin/datatable_view';
		    $this->load->view('layouts/admin/admin_datatable', $this->data);
       } else {
			  $cat = $this->input->post('cat');
			  $subcat = $this->input->post('subcat');
			  $status = 1;
			  $insData=array('cat_id' => $cat,
			         'subcategory' => $subcat,
					 'status' => $status
		               );
			   			   
			
			  $lid=$this->admin_model->add_data('subcategory',$insData);
				if($lid){
					  $msg="Inserted successfully";
					  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
					  redirect('/admin/subcategory','refresh');
				}else{
					  $msg="Not Inserted !";
					  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
					  redirect('/admin/subcategory','refresh');
				  }
			 
	        }
}


	
//deleteSubCat() action delete the specified subcategory details			
public function deleteSubCat($subCatId = false)
{
	 $where=array("sub_cat_id"=>$subCatId);
	 $affected_row=$this->admin_model->delete_db('subcategory',$where);
	      if($affected_row){
				  $msg=" Record Deleted successfully";
				  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
				  redirect('/admin/subcategory','refresh');
			}else{
			  
				  $msg="Record not deleted !";
				  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
				  redirect('/admin/subcategory','refresh');
			}
}

//activeDeactiveSubCategory() action active or deactive the specified subcategory details on the basis $status_mode
public function activeDeactiveSubCategory($subCatId = false,$status_mode=false)
{
	 $where=array("sub_cat_id"=>$subCatId);
	   if($status_mode=='deActive'){
			 $cols=array("status"=>1);
			 $msgStatus='Activated';
	    } else if($status_mode=='Active'){
			 $cols=array("status"=>0);
			 $msgStatus='Deactivated';
		}
	    $affected_row=$this->admin_model->active_deactive_db('subcategory',$cols,$where);
	     if($affected_row){
			  $msg="$msgStatus Successfully";
			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
			  redirect('/admin/subcategory','refresh');
			}else{
			  
              $msg=" Status Not Changed !";
			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
			  redirect('/admin/subcategory','refresh');
			}
}
//activeDeactiveSubCategory() action update the specified subcategory details
public function updateSubCategory()
{
	
	$this->form_validation->set_rules('cat', 'Category Name', 'trim|required|xss_clean');
	$this->form_validation->set_rules('subcat', 'Sub Category', 'trim|required|xss_clean');
	$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
       if($this->form_validation->run() == FALSE) {
		
			$this->data['view_file']  = 'admin/datatable_view';
		    $this->load->view('layouts/admin_datatable', $this->data);
       } else {
			
			$cat = $this->input->post('cat');
			$subcat = $this->input->post('subcat');
			$sub_cat_id = $this->input->post('sub_cat_id');
		
			$upData=array('cat_id' => $cat,
				 'subcategory' => $subcat
				   );
					   
			  $where=array("sub_cat_id"=>$sub_cat_id);
				 
			 $last_id=$this->admin_model->update_data('subcategory',$upData,$where);
				if($last_id){
					  $msg="Updated successfully!";
					  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
					  redirect('/admin/subcategory','refresh');
				}else{
					  $msg=" Not Updated !";
					  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
					  redirect('/admin/subcategory','refresh');
				  
			    }
			 
	      }
}

// Subcategory all actions end here

// user all actions start from here
// updated date 18/04/2014 
// updated by Arun Kumar
// users() action load the respective view on default layout	
public function userdatatable(){
			$this->load->library('Datatables');
			$activateUrl ='<a  class="suc" href="'.SITE_URL."admin/activeDeactiveUser/id/Active".'" title="Activated" ></a>';
			$deactivateUrl ='<a  class="suc" href="'.SITE_URL."admin/activeDeactiveUser/id/Pending".'" title="Deactivated" ></a>';
			$this->datatables->select('id,email_id , mobile_no,permanent_address,email_status,mobile_status,profile_status')
			         ->from('user_signup')
					 
					 ->add_column('action', "<div class='btn-group'><a href='userwiseProduct/$1'  class='btn btn-xs btn-default'><img src='".WEBROOT_PATH_IMAGES.'user_product.png'."' title='View Product Of This User'  alt='product'/></a>
<a href='".SITE_URL.'admin/deleteUser/$1'."' onclick='return confirm('Are you sure to delete ?')' data-toggle='tooltip' title='Delete' class='btn btn-xs btn-danger' rel=''><i class='fa fa-times'></i></a>
</div>", "id" );
    echo $this->db->last_query();
					
   echo $this->datatables->generate();

}
	public function users(){
		 $this->validateAdmin();
		 $this->data['view_file']  = 'admin/view_user';
		 $this->load->view('layouts/admin/admin_datatable', $this->data); 
	 }
	 
	 	 
//deleteUser() action delete the specified user details
public function deleteUser($userId = false)
{
	
	 $userArray=array("id" => $userId);
	 $deletionStatus=$this->admin_model->delete_db('user_signup',$userArray);
		  if($deletionStatus){
			  $msg="Record Deleted successfully";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'suc'));
			  redirect('/admin/users','refresh');
		  }else{			  
			  $msg="Record not deleted!";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'err'));
			  redirect('/admin/users','refresh');
		  }
}
//activeDeactiveUser() action active or deactive the specified user details on the basis of $status_mode
public function activeDeactiveUser($user_id = false,$status_mode=false)
{
	 $where=array("id"=>$user_id);
	 if($status_mode=='deActive'){
			 $cols=array("profile_status"=>'Active');
			 $msgStatus='Unblocked';
	   } else if($status_mode=='Active'){
			 $cols=array("profile_status"=>'Blocked');
			 $msgStatus='Blocked';
		}
		
	  $affected_row=$this->admin_model->active_deactive_db('user_signup',$cols,$where);
	  if($affected_row){
			  $msg="User $msgStatus Successfully";
			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
			  redirect('/admin/users','refresh');
	  }else{
			  
             $msg="User Status Not Changed !";
			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
			  redirect('/admin/users','refresh');
			}
}

	
// user all actions end here//

//product all action start	
// updated date 18/04/2014 
// updated by Arun Kumar
// products() action load the respective view on default layout		
public function products(){
	$this->validateAdmin();
	

	 $productData = $this->db->select('product_details.*,user_signup.id')
									 ->join('user_signup' , 'user_signup.id=product_details.user_id','left')
									 ->get('product_details')
									 ->result();
									 
								 
	 $this->data['rows']  = $productData;
	 $this->data['view_file']  = 'admin/view_product';
	 $this->load->view('layouts/admin/admin_default', $this->data); 
}
//deleteProduct() action delete the specified product details 
public function deleteProduct($productId = false)
{
	
	 $userArray=array("product_id" => $productId);
	 $deletionStatus=$this->admin_model->delete_db('product_details',$userArray);
		  if($deletionStatus){
			  $msg="Record Deleted successfully";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'suc'));
			  redirect('/admin/products','refresh');
		  }else{			  
			  $msg="Record not deleted!";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'err'));
			  redirect('/admin/products','refresh');
		  }
}
	
//activeDeactiveProduct() action approved/not approved the specified product details on the basis of $status_mode 
public function activeDeactiveProduct($prod_id = false,$status_mode=false)
{
	 $where=array("product_id"=>$prod_id);
	 if($status_mode=='deActive'){
			$cols=array("Status"=>'Approved');
			$msgStatus='Approved';
	   } else if($status_mode=='Active'){
			 $cols=array("Status"=>'Pending');
			 $msgStatus='Pending';
		}
		
	  $affected_row=$this->admin_model->active_deactive_db('product_details',$cols,$where);
	  if($affected_row){
				  $msg="Product $msgStatus !";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
				  redirect('/admin/products','refresh');
	  }else{
			  
                $msg="Product Status Not Changed !";
			    $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
			    redirect('/admin/products','refresh');
		   }
}
	
//userwiseProduct() action show the all products details of specified users 
public function userwiseProduct($id=false){
	$this->validateAdmin();
	$productData = $this->db->select('product_details.*,user_signup.id')
									 ->join('product_details' , "user_signup.id=product_details.user_id where tbl_product_details.user_id='$id'")
									 ->get('user_signup')
									 ->result();
								
							 
	 $this->data['rows']  = $productData;
	 $this->data['view_file']  = 'admin/view_userwise_product';
	 $this->load->view('layouts/admin/admin_default', $this->data); 
 }
//deleteUserWise() action delete the specified products details of specified users 
public function deleteUserWise($user_id=false,$productId = false)
{
	
	 $userArray=array("product_id" => $productId);
	 $deletionStatus=$this->admin_model->delete_db('product_details',$userArray);
		  if($deletionStatus){
			  $msg="Record Deleted successfully";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'suc'));
			  redirect("/admin/userwiseProduct/$user_id",'refresh');
		  }else{			  
			  $msg="Record not deleted!";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'err'));
			  redirect("/admin/userwiseProduct/$user_id",'refresh');
		  }
}
//activeDeactiveUserWiseProduct() action approved/not approved the  specified products details of specified users 
//on the basis of $status_mode
public function activeDeactiveUserWiseProduct($user_id=false,$prod_id = false,$status_mode=false)
{
		
	 $where=array("product_id"=>$prod_id);
		 if($status_mode=='deActive'){
				$cols=array("Status"=>'Approved');
				$msgStatus='Approved';
			} else if($status_mode=='Active'){
					 $cols=array("Status"=>'Pending');
					 $msgStatus='Pending';
				}
		
	  $affected_row=$this->admin_model->active_deactive_db('product_details',$cols,$where);
	  if($affected_row){
				  $msg="Product $msgStatus !";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
				  redirect("/admin/userwiseProduct/$user_id",'refresh');
		   }else{
				  
				 $msg="Product Status Not Changed !";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
				  redirect("/admin/userwiseProduct/$user_id",'refresh');
			   }
	}
	
// end  product  action	 here//

// user enquiry actions start from here
// updated date 18/04/2014 
// updated by Arun Kumar
// enquiry() action load the respective view on default layout		
public function enquiry(){
	 $this->validateAdmin();
     $userData=$this->admin_model->select_data('enquiry');
	 $this->data['rows']  = $userData;
	 $this->data['view_file']  = 'admin/view_enquiry';
	 $this->load->view('layouts/admin/admin_default', $this->data); 
 }
	 
	 	 
//deleteEnquiry() action delete the specified enquiry details  
public function deleteEnquiry($enq_id = false)
{
	
	 $userArray=array("enq_id" => $enq_id);
	 $deletionStatus=$this->admin_model->delete_db('enquiry',$userArray);
		  if($deletionStatus){
			  $msg="Record Deleted successfully";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'suc'));
			  redirect('/admin/enquiry','refresh');
		  }else{			  
			  $msg="Record not deleted!";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'err'));
			  redirect('/admin/enquiry','refresh');
		  }
}
	// user enquiry actions end here 
	
	
	
// user sell product actions start here 
// updated date 18/04/2014 
// updated by Arun Kumar
// selProducts() action load the respective view on default layout
// it is the product posted by user to sell on OLX		
public function selProducts(){
	   $this->validateAdmin();
	
	 $productData = $this->db->select('sell_product.*,user_signup.id')
									 ->join('user_signup' , 'user_signup.id=sell_product.user_id','left')
									 ->get('sell_product')
									 ->result();
									
								 
	 $this->data['rows']  = $productData;
	 $this->data['view_file']  = 'admin/sell_product';
	 $this->load->view('layouts/admin/admin_default', $this->data); 
}
//deleteSelProduct() action delete the specified SelProduct details  
 public function deleteSelProduct($productId = false)
{
	
	 $userArray=array("product_id" => $productId);
	 $deletionStatus=$this->admin_model->delete_db('sell_product',$userArray);
		  if($deletionStatus){
			  $msg="Record Deleted successfully";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'suc'));
			  redirect('/admin/selProducts','refresh');
		  }else{			  
			  $msg="Record not deleted!";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'err'));
			  redirect('/admin/selProducts','refresh');
		  }
}
	
//activeDeactiveSelProduct() action approved/not approved the specified SelProduct details 
//on the basis of $status_mode 	
public function activeDeactiveSelProduct($prod_id = false,$status_mode=false)
{
		
	 $where=array("product_id"=>$prod_id);
	 if($status_mode=='deActive'){
			$cols=array("status"=>'Approved');
			$msgStatus='Approved';
	   } else if($status_mode=='Active'){
			 $cols=array("status"=>'Pending');
			 $msgStatus='Pending';
		}
		
	$affected_row=$this->admin_model->active_deactive_db('sell_product',$cols,$where);
	  if($affected_row){
				  $msg="Product $msgStatus !";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
				  redirect('/admin/selProducts','refresh');
			  }else{
			  
				  $msg="Product Status Not Changed !";
				  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
				  redirect('/admin/selProducts','refresh');
			  }
}
	
// user sell product actions end here// 

// Buy Lead  all action Start from here
// updated date 18/04/2014 
// updated by Arun Kumar
// leads() action load the respective view on default layout
public function leads(){
	$this->validateAdmin();
	
	 $productData = $this->db->select('buy_leads.*,user_signup.id')
									 ->join('user_signup' , 'user_signup.id=buy_leads.user_id','left')
									 ->get('buy_leads')
									 ->result();
									 
								 
	 $this->data['rows']  = $productData;
	 $this->data['view_file']  = 'admin/view_leads';
	 $this->load->view('layouts/admin/admin_default', $this->data); 
 }
 
//deleteLead() action delete the specified lead details  
public function deleteLead($lead_id = false)
{
	
	 $userArray=array("lead_id" => $lead_id);
	 $deletionStatus=$this->admin_model->delete_db('buy_leads',$userArray);
		  if($deletionStatus){
			  $msg="Record Deleted successfully";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'suc'));
			  redirect('/admin/leads','refresh');
		  }else{			  
			  $msg="Record not deleted!";
			  $this->session->set_userdata( array('msg'=>$msg , 'class' => 'err'));
			  redirect('/admin/leads','refresh');
		  }
}
	
//activeDeactiveLead() Approved/not Approved  the specified lead details
//on the basis of $status_mode  	
public function activeDeactiveLead($lead_id = false,$status_mode=false)
{
		
	 $where=array("lead_id"=>$lead_id);
	 if($status_mode=='deActive'){
			$cols=array("status"=>'Approved');
			$msgStatus='Approved';
	   } else if($status_mode=='Active'){
			 $cols=array("status"=>'Pending');
			 $msgStatus='Pending';
		}
		
	  $affected_row=$this->admin_model->active_deactive_db('buy_leads',$cols,$where);
	  if($affected_row){
			  $msg="Lead $msgStatus !";
			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
			  redirect('/admin/leads','refresh');
		}else{
			  
             $msg="Lead Status Not Changed !";
			  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
			  redirect('/admin/leads','refresh');
		   }
}
// buy lead action end here//
	
	
// Page Content all actions start from here
// updated date 18/04/2014 
// updated by Arun Kumar
// pageContent() action load the respective view on default layout
public function pageContent(){
	    $this->validateAdmin();
	   
	    $pageData=$this->admin_model->select_data('page_content');
		
	    $this->data['rows']  = $pageData;
		$this->data['view_file']  = 'admin/view_page_content';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
// addPage() action load the respective view on default layout
public function addPage(){
	    $this->validateAdmin();
	    $this->data['view_file']  = 'admin/add_page';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
//addPageContent() action add the page content details  	
public function addPageContent(){
		
		$this->form_validation->set_rules('title', 'Page Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('menu_label', 'Menu Label', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content', 'Page Content', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
			if($this->form_validation->run() == FALSE) {
				$this->data['view_file']  = 'admin/add_page';
				$this->load->view('layouts/admin/admin_default', $this->data);
		    } else {
				 $status=1;
				 $title = $this->input->post('title');
				 $menu_label = $this->input->post('menu_label');
				 $page_url = str_replace('&','and',str_replace(' ','-', strtolower($this->input->post('menu_label'))));
				 $position = $this->input->post('position');
				 $content = $this->input->post('content');
				
				
						$insData=array('page_title' => $title,
						'menu_label' => $menu_label,
						'page_url' => $page_url,
						'content' => $content,
						'position' => $position,
						'status'=>$status
				   );
				 
			   $lastId=$this->admin_model->add_data('page_content',$insData);
				   if($lastId){
						  $msg="Inserted successfully";
						  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
						  redirect('/admin/pageContent','refresh');
					} else {
						  $msg="Insertion Error";
						  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
						  redirect('/admin/pageContent','refresh');
					} 
				
		  }
}


	
//deletePage() action delete the specified content details  	
public function deletePage($pageId = false)
	{
	 $where=array("page_id"=>$pageId);
	 $affected_row=$this->admin_model->delete_db('page_content',$where);
	  if($affected_row){
			  $msg="Record Deleted successfully";
			  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
			  redirect('/admin/pageContent','refresh');
		}else{
			  
              $msg=" Record not deleted !";
			  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
			  redirect('/admin/pageContent','refresh');
		}
	}
//activeDeactivePage() Active/Deactive  the specified content details
//on the basis of $status_mode  	
public function activeDeactivePage($pageId = false,$status_mode=false)
{
		
	 $where=array("page_id"=>$pageId);
	 if($status_mode=='deActive'){
			$cols=array("status"=>1);
			$msgStatus='Activated';
	   } else if($status_mode=='Active'){
			 $cols=array("status"=>0);
			 $msgStatus='Deactivated';
		}
	     $affected_row=$this->admin_model->active_deactive_db('page_content',$cols,$where);
			 if($affected_row){
					  $msg="$msgStatus Successfully";
					  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
					  redirect('/admin/pageContent','refresh');
				}else{
				  
					  $msg=" Status Not Changed !";
					  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
					  redirect('/admin/pageContent','refresh');
				}
}
// editPage() action load the respective view on default layout with specific record to be edited
public function editPage($page_id=false){
	    $this->validateAdmin();
		$where=array('page_id'=>$page_id);
		$pageData=$this->admin_model->select_data('page_content','*',$where);
		
	    $this->data['rows']  = $pageData[0];
	    $this->data['view_file']  = 'admin/edit_page';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
//updatePage() action Update the specified page content details  
public function updatePage()
{
	
	    $this->form_validation->set_rules('title', 'Page Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('menu_label', 'Menu Label', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content', 'Page Content', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
			if($this->form_validation->run() == FALSE) {
				$this->data['view_file']  = 'admin/edit_page';
				$this->load->view('layouts/admin/admin_default', $this->data);
		    } else {
				 $status=1;
				 $title = $this->input->post('title');
				 $menu_label = $this->input->post('menu_label');
				 $page_url = str_replace('&','and',str_replace(' ','-', strtolower($this->input->post('menu_label'))));
				 $position = $this->input->post('position');
				 $content = $this->input->post('content');
				 $page_id = $this->input->post('page_id'); 
				
				
						$upData=array('page_title' => $title,
						'menu_label' => $menu_label,
						'page_url' => $page_url,
						'content' => $content,
						'position' => $position,
						'status'=>$status
				   );
				   
				  $where=array("page_id"=>$page_id);
				  // print_r($insData);
				  $update_status=$this->admin_model->update_data('page_content',$upData,$where);
					 if($update_status){
						  $msg=" Updated successfully";
						  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
						  redirect('/admin/pageContent','refresh');
					 }else{	
						  $msg="Updation error";
						  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
						  redirect('/admin/pageContent','refresh');	  
				  		}
				 
		    }
}

// Page Content all actions end here//
	
		
// Page Contact Details all actions start
// updated date 18/04/2014 
// updated by Arun Kumar
// contactDetails() action load the respective view on default layout
public function contactDetails(){
	    $this->validateAdmin();
	   
	   $pageData=$this->admin_model->select_data('contactus');
		
	    $this->data['rows']  = $pageData;
		$this->data['view_file']  = 'admin/view_contact';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
// addContact() action load the respective view on default layout
public function addContact(){
	    $this->validateAdmin();
	    $this->data['view_file']  = 'admin/add_contact';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
//addContactAddress() action add the contact us details  
public function addContactAddress(){
		
		$this->form_validation->set_rules('company', 'Comapny Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Contact Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'LandLine No', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
 	      if($this->form_validation->run() == FALSE) {
				$this->data['view_file']  = 'admin/add_contact';
				$this->load->view('layouts/admin/admin_default', $this->data);
            } else {
				 $status=1;
				 $company_name = $this->input->post('company');
				 $contact_email = $this->input->post('email');
				 $contact_no = $this->input->post('phone');
				 $mobile = $this->input->post('mobile');
				 $executive_name = $this->input->post('executive');
				 $address = $this->input->post('address');
				
						$insData=array('company_name' => $company_name,
						'contact_email' => $contact_email,
						'contact_no' => $contact_no,
						'mobile' => $mobile,
						'executive_name' => $executive_name,
						'address' => $address,
						'status'=>$status
				   );
				 
			   $lastId=$this->admin_model->add_data('contactus',$insData);
				   if($lastId){
						  $msg="Inserted successfully";
						  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
						  redirect('/admin/contactDetails','refresh');
					} else {
						  $msg="Insertion Error";
						  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
						  redirect('/admin/contactDetails','refresh');
					} 
		
	       }
}


	
//deleteContact() action delete the specified contact us address 
public function deleteContact($id = false)
	{
	 $where=array("id"=>$id);
	 $affected_row=$this->admin_model->delete_db('contactus',$where);
	  if($affected_row){
			  $msg="Record Deleted successfully";
			  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
			  redirect('/admin/contactDetails','refresh');
		}else{
			  
              $msg=" Record not deleted !";
			  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
			  redirect('/admin/contactDetails','refresh');
		}
}
//activeDeactiveContact() Active/Deactive  the specified contact us details
//on the basis of $status_mode 
public function activeDeactiveContact($id = false,$status_mode=false)
{
		
	 $where=array("id"=>$id);
		 if($status_mode=='deActive'){
				$cols=array("status"=>1);
				$msgStatus='Activated';
		   } else if($status_mode=='Active'){
				 $cols=array("status"=>0);
				 $msgStatus='Deactivated';
			}
			 $affected_row=$this->admin_model->active_deactive_db('contactus',$cols,$where);
				 if($affected_row){
					  $msg="$msgStatus Successfully";
					  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
					  redirect('/admin/contactDetails','refresh');
					}else{
					  
					  $msg=" Status Not Changed !";
					  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
					  redirect('/admin/contactDetails','refresh');
					}
}
// editContact() action load the respective view on default layout with showing specified record to be edited
public function editContact($id=false){
	    $this->validateAdmin();
		$where=array('id'=>$id);
		$contactData=$this->admin_model->select_data('contactus','*',$where);
		
	    $this->data['rows']  = $contactData[0];
	    $this->data['view_file']  = 'admin/edit_contact';
		$this->load->view('layouts/admin/admin_default', $this->data); 
}
//updateContact() action Update the specified record  
public function updateContact()
	{
	    $this->form_validation->set_rules('company', 'Comapny Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Contact Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'LandLine No', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
 	     if($this->form_validation->run() == FALSE) {
		
		  redirect("/admin/editContact/".$this->input->post('contact_id'),'refresh');
        } else {
			 $status=1;
			 $company_name = $this->input->post('company');
			 $contact_email = $this->input->post('email');
			 $contact_no = $this->input->post('phone');
			 $mobile = $this->input->post('mobile');
			 $executive_name = $this->input->post('executive');
		   	 $address = $this->input->post('address');
			 $id = $this->input->post('contact_id');
			
		            $upData=array('company_name' => $company_name,
		            'contact_email' => $contact_email,
					'contact_no' => $contact_no,
					'mobile' => $mobile,
					'executive_name' => $executive_name,
					'address' => $address,
			        'status'=>$status
			   );
			   
			   $where=array("id"=>$id);
			  // print_r($insData);
			   $update_status=$this->admin_model->update_data('contactus',$upData,$where);
				 if($update_status){
					  $msg=" Updated successfully";
					  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
					  redirect('/admin/contactDetails','refresh');
				 }else{	
					  $msg="Updation error";
					  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
					  redirect('/admin/contactDetails','refresh');	  
			  }
			 
	  }
}
//  Contact Details all actions end here//
	
	
// Ads Image Details all actions start
// updated date 18/04/2014 
// updated by Arun Kumar
// advertisement() action load the respective view on default layout 
public function advertisement(){
	    $this->validateAdmin();
	   
	   $pageData=$this->admin_model->select_data('display_adds');
		
	    $this->data['rows']  = $pageData;
		$this->data['view_file']  = 'admin/advertisement';
		$this->load->view('layouts/admin/admin_default', $this->data); 
	}


// addAds() action add the ads image details
public function addAds(){
		
		$this->form_validation->set_rules('type', 'Ads Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('position', 'Display Position', 'trim|required|xss_clean');
		$this->form_validation->set_rules('end_date', 'Valid till', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
			if($this->form_validation->run() == FALSE) {
				$pageData=$this->admin_model->select_data('display_adds');
				
				$this->data['rows']  = $pageData;
				$this->data['view_file']  = 'admin/advertisement';
				$this->load->view('layouts/admin/admin_default', $this->data);
		    } else {
				 $status=1;
				 $image_for = $this->input->post('type');
				 $position = $this->input->post('position');
				 $end_date = $this->input->post('end_date');
				 
				$image = $_FILES['image']['name'];
				if($image!=""){
				    $action='/admin/advertisement'; // it is the page where redirect if file type not match	
					$name=$image;
					$up_path= 'ads_image';
					$input_name='image';
					$image_name=$this->upload_image($up_path,$input_name,$name,$action);
				
				
				 }else{
				    $image_name=0;
				 }
				
						$insData=array('image_for' => $image_for,
						'image_name' => $image_name,
						'position' => $position,
						'end_date' => $end_date,
						'status'=>$status
				   );
				
				  $lastId=$this->admin_model->add_data('display_adds',$insData);
					if($lastId){
						  $msg="Inserted successfully";
						  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
						  redirect('/admin/advertisement','refresh');
					}else{
						  $msg="Not Inserted";
						  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
						  redirect('/admin/advertisement','refresh');
					  
					  }
			  }
}



	
// deleteAds() action delete the specified ads image details	
public function deleteAds($image_id = false)
	{
	 $where=array("image_id"=>$image_id);
	 $affected_row=$this->admin_model->delete_db('display_adds',$where);
	  if($affected_row){
			  $msg="Record Deleted successfully";
			  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
			  redirect('/admin/advertisement','refresh');
		}else{
			  
              $msg=" Record not deleted !";
			  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
			  redirect('/admin/advertisement','refresh');
		}
}
// activeDeactiveAds() action active/deactive the specified ads image details
//on the basis of $status_mode
public function activeDeactiveAds($image_id = false,$status_mode=false)
{
		
	 $where=array("image_id"=>$image_id);
	 if($status_mode=='deActive'){
			$cols=array("status"=>1);
			$msgStatus='Activated';
	   } else if($status_mode=='Active'){
			 $cols=array("status"=>0);
			 $msgStatus='Deactivated';
		}
	     $affected_row=$this->admin_model->active_deactive_db('display_adds',$cols,$where);
			 if($affected_row){
					  $msg="$msgStatus Successfully";
					  $this->session->set_userdata( array('msg'=>$msg,'class' => 'suc'));
					  redirect('/admin/advertisement','refresh');
				}else{
				  
					  $msg=" Status Not Changed !";
					  $this->session->set_userdata( array('msg'=>$msg,'class' => 'err'));
					  redirect('/admin/advertisement','refresh');
				}
}

// updateAds() action update the specified ads image details
public function updateAds()
	{
	    $this->form_validation->set_rules('type', 'Ads Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('position', 'Display Position', 'trim|required|xss_clean');
		$this->form_validation->set_rules('end_date', 'Valid till', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="req">', '</p>');
 	     if($this->form_validation->run() == FALSE) {
		    $pageData=$this->admin_model->select_data('display_adds');
		
			$this->data['rows']  = $pageData;
			$this->data['view_file']  = 'admin/advertisement';
			$this->load->view('layouts/admin/admin_default', $this->data);
         } else {
				 $status=1;
				 $image_for = $this->input->post('type');
				 $position = $this->input->post('position');
				 $end_date = $this->input->post('end_date');
				 $image_id=$this->input->post('image_id');
				 $image = $_FILES['image']['name'];
				if($image!=""){
				    $action='/admin/advertisement'; // it is the page where redirect if file type not match	
					$name=$image;
					$up_path= 'ads_image';
					$input_name='image';
					$image_name=$this->upload_image($up_path,$input_name,$name,$action);
				
				}else{
				  $image_name=0;
				}
			
		            $upData=array('image_for' => $image_for,
		            'image_name' => $image_name,
					'position' => $position,
					'end_date' => $end_date,
			        'status'=>$status
			   );
			   
		 $where=array("image_id"=>$image_id);
		 $update_status=$this->admin_model->update_data('display_adds',$upData,$where);
			 if($update_status){
				  $msg=" Updated successfully";
				  $this->session->set_userdata( array('msg'=>$msg,'class'=>'suc'));
				  redirect('/admin/advertisement','refresh');
			 }else{	
				  $msg="Updation error";
				  $this->session->set_userdata( array('msg'=>$msg,'class'=>'err'));
				  redirect('/admin/advertisement','refresh');	  
		       }
			 
	  }
}
	//  Ads Slider/image all actions end

	
	
	
} // controller end here 