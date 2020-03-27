<?php foreach ($list_po as $key) {?>
<tr>
	<td nowrap><?=$key->part_no?></td>
	<td nowrap><?=$key->nama_barang?></td>
	<td><?=$key->qty?></td>
	<td><?=$key->warna?></td>
	<td><?=$key->bahan?></td>
	<td nowrap><?=$key->total_mb_name?></td>
	<td align="center"><?=$key->ct?></td>
	<td align="center"><?=$key->cav?></td>
	<td align="center"><?=$key->bruto?></td>
	<td align="center"><?=$key->netto?></td>
	<td><?=$key->komposisi_1?></td>
	<td><?=$key->komposisi_2?></td>
	<td><?=$key->keb_total_m?></td>
	<td><?=$key->keb_mb?></td>
</tr>
<?php } ?>