<?php $n =0; foreach($material as $row ){ $n++;?>
					<tr>
						<td><?=$n?></td>
						<td><?=$row->nama_barang?></td>
						<td><?=$row->nama_supplier?></td>
						<td><?=$row->deskripsi?></td>
						<td><?=$row->qty?></td>
					</tr>
				<?php } ?>
