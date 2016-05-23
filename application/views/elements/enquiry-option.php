<div class="tab-inr-top clearfix">
                        <select name="select" id="select" class="fl">
                        <?php
						if($type=='inbox')
						{
							echo ' <option value="inbox" selected="selected">Inbox</option>';
						}
						else
						{
							echo '<option value="inbox">Inbox</option>';
						}
						if($type=='sentbox')
						{
							echo ' <option value="sentbox" selected="selected">Sent Box</option>';
						}
						else
						{
							echo '<option value="sentbox">Sent Box</option>';
						}
						if($type=='junk')
						{
							echo ' <option value="junk" selected="selected">Junk</option>';
						}
						else
						{
							echo '<option value="junk">Junk</option>';
						}
						if($type=='trash')
						{
							echo ' <option value="trash" selected="selected">Trash</option>';
						}
						else
						{
							echo ' <option value="trash" >Trash</option>';
						}
						?>
                        </select>
                        <ul class="ullist fr">
                        	<li class="top_junk"><a href="#" class="enquirystatus" id="Inbox">Report Inbox</a></li>
                            <li class="top_delete"><a href="#" class="enquirystatus" id="Trash">Delete</a></li>
                            <li class="manage_folders"><a href="#">Manage Folders</a></li>
                            <li class="move_to"><a href="">Move To</a>
                            	<ul class="lidrop">
                                <?php
								if($type=='junk')
								{
									echo '<li><a href="#" class="enquirystatus" id="Inbox">Inbox</a></li>';
								}
								else
								{
									echo '<li><a href="#" class="enquirystatus" id="junk">Junk</a></li>';
								}
								?>
                                	
                                    <li><a href="#" class="enquirystatus" id="Trash">Delete</a></li>
                                </ul>
                            </li>
                        </ul>
                        </div>