<?php
require_once 'lib/master-data.php';
$code = isset($_GET['code'])?$_GET['code']:NULL;
$key = isset($_GET['key'])?$_GET['key']:NULL;
$page = isset($_GET['page'])?$_GET['page']:NULL;
$inbox = inbox_muat_data($code,$key,NULL, NULL,null, $page, $dataPerPage = 6);
?>
<header><h3>Inbox</h3></header>

            	<table class="tablesorter" cellspacing="0" id="sms"> 
			<thead> 
				<tr> 
   				
    				<th>Tanggal</th> 
    				<th>Pengirim</th> 
    				<th>Isi</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
        
			    <? if($inbox['total']!='0'){
			  foreach ($inbox['list'] as $key => $row){?>
				<tr><td><?=deletetime($row['ReceivingDateTime'])?></td> 
    				<td><?=$row['SenderNumber']?></td> 
    				<td><?
					$pecah  = str_split($row['TextDecoded'], 50);
					echo $pecah[0];
					?> </td> 
    				<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
				</tr> 
			<? } ?>
		
          
       <?
	  }
	  else{
	  ?>
      <tr><td colspan="4"><div align="center">Data Masih Kosong</div></td></tr>
	  <?
	  }
	  ?>
      	</tbody> 
			</table><br/>
                <div align="center">
                        <?
	  $inbox['paging'];?>
                         <br/>
                  
                </div>
