<?php $n =0; foreach($pengiriman as $row ){ $n++;?>
					<tr>
						<td><?=$n?></td>
						<td><?=$row->nama_barang?></td>
						<td><?=$row->nama_cust?></td>
						<td><?=$row->warna?></td>
						<td><?=$row->tanggal_input?></td>
						<td><?=$row->deskripsi?></td>
						<td><?=$row->qty?></td>
					</tr>
				<?php } ?>
