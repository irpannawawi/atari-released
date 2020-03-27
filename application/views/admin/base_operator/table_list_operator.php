<table class="table table-bordered table-striped table-hover">
     				<thead class="thead-dark">
     					<tr>
		 					<th>No</th>
		 					<th>Nama</th>
		 					<th>Action</th>
		 				</tr>
     				</thead>
     				<tbody>
     					<?php $n =0; foreach($list_operator as $op){$n++; ?>
     						<tr>
     							<td align="center">
		 							<?=$n?>
		 						</td>
		 						<td>
		 							<?=$op->nama_operator?>
		 						</td>
		 						<td align="center" nowrap="">
		 							<button 
		 								type="button" 
		 								class="btn btn-warning" 
		 								onclick="fill_edit('<?=$op->id_operator?>','<?=$op->nama_operator?>')"
		 								data-toggle="modal"
		 								data-target="#edit_modal"
		 								>Edit</button>
		 							<button 
		 								type="button" 
		 								class="btn btn-danger" 
		 								onclick="delete_operator('<?=$op->id_operator?>')"
		 								>Hapus</button>
		 						</td>
     						</tr>
     					<?php } ?>
     				</tbody>
     			</table>