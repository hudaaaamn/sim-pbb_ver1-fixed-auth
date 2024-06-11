<table class="table table-bordered">
	<thead>
		<tr>
		<?php 
		foreach (array_keys($data[0]) as $key => $value) {
			echo "<th>$value</th>";
		}
		?>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($data as $key => $value) {
			echo '<tr>';
			foreach ($value as $key_d => $value_d) {
				$value_d = is_numeric($value_d) && $key_d!='NOP' ? '<td style="text-align:right">'.number_format($value_d,0,'','.').'</td>' : "<td>$value_d</td>";
				echo $value_d;
			}
			echo '</tr>';
		}
		?>
	</tbody>
</table>