<?php
class Nannica_ProdWidget_Model_Options {
/**
  * Provide available options as a value/label array
  *
  * @return array
  */
  public function toOptionArray() {
    return array(
		array(),
		array('value' => 'quantity', 'label' => 'Lagerantal'),
		array('value' => 'stock_status', 'label' => 'Lagerstatus'),
		array('value' => 'delivery', 'label' => 'Leveranstid'),
		array('value' => 'manual', 'label' => 'Manual'),
		array('value' => 'assembly', 'label' => 'Monteringsanvisning'),
		array('value' => 'productsheet', 'label' => 'Produkblad'),
    );
  }
}