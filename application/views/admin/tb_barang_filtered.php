<?php $n =0; foreach($barang as $row ){ $n++;?>
					<tr>
						<td><?=$row->part_no?></td>
						<td><?=$row->nama_barang?></td>
						<td><?=$row->nama_customer?></td>
						<td><?=$row->ct?></td>
						<td><?=$row->cav?></td>
						<td><?=$row->bruto?></td>
						<td><?=$row->netto?></td>
						<td><?=$row->warna?></td>
						<td><?=$row->bahan?></td>
					</tr>
				<?php } ?>
