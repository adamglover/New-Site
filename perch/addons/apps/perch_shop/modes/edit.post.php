<?php
   
    
    # Side panel
    echo $HTML->side_panel_start();
    echo $HTML->para('Edit your product here.');
    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start(); 
    include('_subnav.php');
    
        echo $HTML->heading1($heading1);


        if ($message) echo $message;    
    
        echo $HTML->heading2('Product details');
    
        echo $Form->form_start('content-edit', 'magnetic-save-bar');
    
            echo $Form->text_field('productTitle', 'Title', isset($details['productTitle'])?$details['productTitle']:false);
            
            echo $Form->text_field('productPrice', 'Price', isset($details['productPrice'])?$details['productPrice']:false, true);
            
            echo $Form->text_field('productCode', 'Code', isset($details['productCode'])?$details['productCode']:false, true);

    		echo $Form->text_field('productCount', 'Quantity in stock', isset($details['productCount'])?$details['productCount']:false, true);

    		echo $Form->textarea_field('productDescRaw', 'Details', isset($details['productDescRaw'])?$details['productDescRaw']:false);
    		
    		
    		
    		if(is_object($Product)) {
		    	echo $Form->text_field('productSlug', 'URL Slug', isset($details['productSlug'])?$details['productSlug']:false);
		    }
    		
		
    		echo $Form->fields_from_template($Template, $details, $Products->static_fields);
    		
    		

			$values = array();
            $opts   = array();
            if(is_array($categories)) {
            	foreach($categories as $Category) {
            		PerchUtil::debug($Category);
            		$opts[] = array('label'=>$Category->categoryTitle(),'value'=>$Category->id());
            	}
            }
            echo $Form->checkbox_set('cat_ids', 'Categories', $opts, isset($details['cat_ids'])?$details['cat_ids']:array());

    		
    		
    		$opts = array();
    		$opts[] = array('label'=>'Draft', 'value'=>'Draft');
    		$opts[] = array('label'=>'Live', 'value'=>'Live');
    		    		
    		echo $Form->select_field('productStatus', 'Status', $opts, isset($details['productStatus'])?$details['productStatus']:'Published');
    		
    		//product options?
    		if(is_object($Product)) {
    			
    			echo '<h2>Product options</h2>';
                echo '<div class="helptext">';
    			echo '<p>Options set here will create a select box on the product page so the user can pick a value. For example an option of "Size" might have a list of values S, M, L, XXL. These values will turn into a select list and the selected value be passed to PayPal.</p>';
    			echo '</div>';

    			$options = $Product->get_product_options();
    			if(is_array($options)) {
    				foreach($options as $row) {
    					?>
    					<fieldset>
    						<legend>Product option:</legend>
    						<?php echo $Form->text_field('optionKey_'.$row['optionID'], 'Option', $row['optionKey']); ?>
    						<?php echo $Form->text_field('optionValues_'.$row['optionID'], 'Values (comma separated)', $row['optionValues']); ?>
    						<div class="del"><?php echo $Form->checkbox('delete_'.$row['optionID'], "true", false); ?> <label for="delete_<?php echo $row['optionID'];?>">Delete option</label></div>
    					</fieldset>
    					<?php 
    				}
    			}
    			
    			?>
    			<fieldset>
    				<legend>Add new product option:</legend>
    						<?php echo $Form->text_field('optionKey', 'Option', ''); ?>
    						<?php echo $Form->text_field('optionValues', 'Values (comma separated)', ''); ?>
    				</fieldset>
    			<?php 
    		}
    		
		
            echo $Form->hidden('productID', isset($details['productID'])?$details['productID']:false);

            echo $Form->submit_field('btnSubmit', 'Save', $API->app_path());

        echo $Form->form_end();
    
        
    echo $HTML->main_panel_end();

    
?>