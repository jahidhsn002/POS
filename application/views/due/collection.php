<?php $this->load->view("partial/header"); ?>
<br />
<h2>Due Collection</h2>
<hr/>
<h4>Due amount of your Customer</h4>
<p><br/></p>
<div id="home_module_list">
	<table class="tablesorter tablesorter-default" id="sortable_table" role="grid">
	<thead>
		<tr role="row" class="tablesorter-headerRow">
			<th data-column="0" class="tablesorter-header sorter-false tablesorter-headerUnSorted" tabindex="0" scope="col" role="columnheader" aria-disabled="true" unselectable="on" aria-sort="none" style="-webkit-user-select: none;">
				
			</th>
			<th data-column="1" class="tablesorter-header tablesorter-headerAsc" tabindex="0" scope="col" role="columnheader" aria-disabled="false" aria-controls="sortable_table" unselectable="on" aria-sort="ascending" aria-label="UPC/EAN/ISBN: Ascending sort applied, activate to apply a descending sort" style="-webkit-user-select: none;">
				<div class="tablesorter-header-inner">ID</div>
			</th>
			<th data-column="3" class="tablesorter-header tablesorter-headerUnSorted" tabindex="0" scope="col" role="columnheader" aria-disabled="false" aria-controls="sortable_table" unselectable="on" aria-sort="none" aria-label="Category: No sort applied, activate to apply an ascending sort" style="-webkit-user-select: none;">
				<div class="tablesorter-header-inner">User</div>
			</th>
			<th data-column="4" class="tablesorter-header tablesorter-headerUnSorted" tabindex="0" scope="col" role="columnheader" aria-disabled="false" aria-controls="sortable_table" unselectable="on" aria-sort="none" aria-label="Company Name: No sort applied, activate to apply an ascending sort" style="-webkit-user-select: none;">
				<div class="tablesorter-header-inner">Due Amount</div>
			</th>
			<th data-column="5" class="tablesorter-header tablesorter-headerUnSorted" tabindex="0" scope="col" role="columnheader" aria-disabled="false" aria-controls="sortable_table" unselectable="on" aria-sort="none" aria-label="Cost Price: No sort applied, activate to apply an ascending sort" style="-webkit-user-select: none;">
				<div class="tablesorter-header-inner">Paid Amount</div>
			</th>
			<th data-column="6" class="tablesorter-header tablesorter-headerUnSorted" tabindex="0" scope="col" role="columnheader" aria-disabled="false" aria-controls="sortable_table" unselectable="on" aria-sort="none" aria-label="Retail Price: No sort applied, activate to apply an ascending sort" style="-webkit-user-select: none;">
				<div class="tablesorter-header-inner">Total Amount</div>
			</th>
			<th data-column="8" class="tablesorter-header sorter-false tablesorter-headerUnSorted" tabindex="0" scope="col" role="columnheader" aria-disabled="true" unselectable="on" aria-sort="none" style="-webkit-user-select: none;">
				<div class="tablesorter-header-inner">Actions</div>
			</th>
		</tr>
	</thead>
	<tbody aria-live="polite" aria-relevant="all">
	<?php
		foreach($query->result() as $fached){
		?>
		<tr role="row" style="cursor: pointer;">
			<td class=""></td>
			<td class=""><?php echo $fached->due_id;?></td>
			<td class=""><?php echo $fached->person_id;?></td>
			<td class=""><?php echo $fached->due_amount;?></td>
			<td class=""><?php echo $fached->paid_amount;?></td>
			<td class=""><?php echo ($fached->paid_amount + $fached->due_amount);?></td>
			<td class="">
			<?php
				$this->load->helper('form');
				echo form_open('sales/select_customer');
				echo form_hidden('customer', $fached->person_id);
				echo form_submit('mysubmit', 'Pay', 'class=small_button');
				echo form_close();
			?>
			</td>
		</tr>
		<?php
		} 
	?>
	</tbody>
	</table>
</div>
<?php $this->load->view("partial/footer"); ?>