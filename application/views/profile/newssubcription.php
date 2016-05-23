<?php 
if($this->session->userdata('UserId')=='')
{
}
$userId=$this->session->userdata('UserId');
$condition=array("user_id"=>$userId);
$UserCatalogList=$this->common->userProductCatalog($condition);
$UsersellCatalogList=$this->common->usersellProductCatalog($condition);
$this->load->view('elements/profilehead');
//echo $this->db->last_query();
?>
  	
  <!-- Inner Navigation End -->
      <div class="main_container clearfix">
        <div class="centralContent">
            <div class="floatfix"></div>
        </div>
          

		<!-- inr left content start -->
        <div class="lhsContent cont-lft">
				
                <!-- ads box start -->
<div class="leftside">
    	<div class="benefits">
        <h3>Company Profile</h3>
        <div class="con_pro_m">
</div>

<?php

$this->load->view('elements/left-nav.php');
?>
        </div>
        
        <div class="satisfied">
        <h4>You may also like to</h4>
			<ul class="left_list2">
                  <li><a href="#">View Latest Buy Leads</a></li>
                  <li><a href="#">Add Products / Offers</a></li>
                </ul>
        </div>
    </div>
<!-- ads box end -->
                
        <div class="floatfix"></div>
      </div>
      <!-- inr left content end -->
      <div class="box_rw">
      <h2>About Industry Newsletters</h2>
      <p>The fortnightly industry newsletters are aimed at keeping global buyers, sellers   and trade enthusiasts posted on the latest news &amp; events, industry trends, best   buy/sell offers and much more. They also keep subscribers updated with   upcoming and important industry trade shows. </p>
      
      <div class="newsletters_box">
       <div class="hdn_nw">Newsletters Subscription</div>
       <div class="nw_fbox">
     
       <input type="text" name="subscriptionEmail" id="subscriptionEmail"   class="nw_fld" placeholder="Enter your email id">
       <button ype="submit" id="submitSubscription" name="submitSubscription" class="nw_btn">Submit</button>
       
       </form>
       </div>
      </div>
      
      <br>

      <h2>Be among the firsts to know about:</h2>
        <ul class="left_list2">
        <li>Business Leads</li>
        <li>Industry News</li>
        <li>Trade Shows</li>
        <li>New Products</li>
        <li>New Suppliers</li>
        <li>Tenders</li>
        </ul>
      
      </div>
      <!-- inr right content start -->
      

  </div>
    
    
    
    
  