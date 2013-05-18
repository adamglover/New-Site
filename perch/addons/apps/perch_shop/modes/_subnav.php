<?php
	echo $HTML->subnav($CurrentUser, array(
		array('page'=>array(
					'perch_shop',
					'perch_shop/delete',
					'perch_shop/edit'
			), 'label'=>'Products'),
		array('page'=>array(
					'perch_shop/orders',
					'perch_shop/orders/view'
			), 'label'=>'Orders'),
		array('page'=>array(
					'perch_shop/categories',
					'perch_shop/categories/edit',
					'perch_shop/categories/delete',
					'perch_shop/categories/new'

			), 'label'=>'Categories', 'priv'=>'perch_shop.categories.manage')
	));
?>