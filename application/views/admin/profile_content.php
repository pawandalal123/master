<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header text-center">
<h2 class="modal-title"><i class="fa fa-pencil"></i> Admin Profile</h2>
</div>
<div class="modal-body">
<table align="center" width="80%" cellspacing="4" cellpadding="4">
<tr>
<td >Full Name</td>
<td width="30%" >&nbsp;</td>
<td ><?php echo $res->firstname." ".$res->lastname;?></td>
</tr>

<tr>
<td >Email Id</td>
<td width="30%" >&nbsp;</td>
<td ><?php echo $res->email;?></td>
</tr>
<tr>
<td >Contact No</td>
<td width="30%" >&nbsp;</td>
<td ><?php echo $res->mobile;?></td>
</tr>
<tr>
<td >Country</td>
<td width="30%" >&nbsp;</td>
<td ><?php echo $res->country;?></td>
</tr>
<tr>
<td >Registration Date</td>
<td width="30%" >&nbsp;</td>
<td ><?php echo $res->registration_date;?></td>
</tr>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
</div>

</div>
</div>
