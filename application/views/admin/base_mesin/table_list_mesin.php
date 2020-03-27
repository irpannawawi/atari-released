<table class="table table-bordered table-striped table-hover">
     				<thead class="thead-dark">
     					<tr>
		 					<th>No</th>
		 					<th>No. Mesin</th>
		 					<th>Brand</th>
		 					<th>Tonase</th>
		 					<th>Action</th>
		 				</tr>
     				</thead>
     				<tbody>
     					<?php $n =0; foreach($list_mesin as $mesin){$n++; ?>
     						<tr>
     							<td align="center">
		 							<?=$n?>
		 						</td>
		 						<td>
		 							<?=$mesin->no_mesin?>
		 						</td>
		 						<td>
		 							<?=$mesin->nama_mesin?>
		 						</td>
		 						<td>
		 							<?=$mesin->tonase?>
		 						</td>
		 						<td align="center" nowrap>
		 							<button 
		 								type="button" 
		 								class="btn btn-warning" 
		 								onclick="fill_edit('<?=$mesin->id_mesin?>','<?=$mesin->no_mesin?>','<?=$mesin->nama_mesin?>','<?=$mesin->tonase?>')"
		 								data-toggle="modal"
		 								data-target="#edit_modal"
		 								>Edit</button>
		 							<button 
		 								type="button" 
		 								class="btn btn-danger" 
		 								onclick="delete_mesin('<?=$mesin->id_mesin?>')"
		 								>Hapus</button>
		 						</td>
     						</tr>
     					<?php } ?>
     				</tbody>
     			</table>