<?php $n =0; foreach($barang_masuk as $row ){ $n++;?>
					<tr>
						<td><?=$n?></td>
						<td><?=$row->part_no?></td>
						<td><?=$row->nama_barang?></td>
						<td><?=$row->nama_cust?></td>
						<td><?=$row->ct?></td>
						<td><?=$row->cav?></td>
						<td><?=$row->bruto?></td>
						<td><?=$row->netto?></td>
						<td><?=$row->warna?></td>
						<td><?=$row->bahan?></td>
						<td><?=$row->qty?></td>
					</tr>
				<?php } ?>
