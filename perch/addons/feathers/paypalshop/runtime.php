<?php
	
PerchSystem::register_feather('PayPalShop');

class PerchFeather_PayPalShop extends PerchFeather
{

	public function get_css($opts, $index, $count)
	{	
		$out = array();

		$out[] = $this->_single_tag('link', array(
					'rel'=>'stylesheet',
					'href'=>$this->path.'/css/shop.css',
					'type'=>'text/css'
				));

		return implode("\n\t", $out)."\n";
	}

	public function get_javascript($opts, $index, $count)
	{	
		$out = array();

		if (!$this->component_registered('minicart')) {
			$out[] = $this->_script_tag(array(
					'src'=>$this->path.'/js/minicart.js'
				));
			$this->register_component('minicart');
		}

		$out[] = $this->_script_tag(array(
					'src'=>$this->path.'/js/paypalshop.js'
				));

		return implode("\n\t", $out)."\n";
	}

}

?>