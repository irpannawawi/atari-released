<?php $n =0; foreach($history as $row ){ $n++;?>
					<tr>
						<td><?=$n?></td>
						<td><?=$row->nama_barang?></td>
						<td><?=$row->nama_cust?></td>
						<td><?=$row->warna?></td>
						<td><?=$row->tanggal_input?></td>
						<td><?=$row->jenis_input?></td>
						<td><?=$row->qty?></td>
					</tr>
				<?php } ?>
