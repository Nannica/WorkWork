<?php
class Nannica_ProdWidget_Block_Attribute extends Mage_Catalog_Block_Product_Abstract implements Mage_Widget_Block_Interface {
/**
  * Produce links list rendered as html
  *
  * @return string
  */
	protected function getQuantity($product) {
		$_prodQuantity = number_format($product->getStockItem()->getQty(), 0);
		$html = ''; 
		if($_prodQuantity > 0): 
			$html .= '<p class="quantity"><span class="att_label">Antal:</span> '.$_prodQuantity.' st</p>'; 
		endif;
		
		return $html;
	}

	protected function getStockstatus($product) {
		$html = '';
		
		if ($product->isAvailable()):
			if($product->getStockItem()->getQty() > 0):
				$html .= '<p class="instock"><span class="att_label">Tillg&auml;nglighet:</span> Finns i lager</p>'; 
			else:
				$html .= '<p class="instock"><span class="att_label">Tillg&auml;nglighet:</span> '.$this->__('In stock').'</p>'; 
			endif;	
		else:
			$html .= '<p class="outstock"><span class="att_label">Tillg&auml;nglighet:</span> '.$this->__('Out of stock').'</p>';
		endif;
		
		return $html;
	}

	protected function getManual($product) {
		$html = ''; 
		if ($product->getUrlManual()):
				$html .= '<p class="manual"><a href="'.$product->getUrlManual().'" class="pdf" target="_blank">Manual</a></p>'; 	
		endif;
		
		return $html;
	}

	protected function getAssembly($product) {
		$html = ''; 
		if ($product->getMonteringsanvisningarUrl()):
				$html .= '<p class="assembly"><a href="'.$product->getMonteringsanvisningarUrl().'" class="int" target="_blank">Montering</a></p>'; 	
		endif;
		
		return $html;
	}

	protected function getProductsheet($product) {	
		$html = ''; 
		if ($product->getUrlProductsheet()):
				$html .= '<p class="productsheet"><a href="'.$product->getUrlProductsheet().'" class="pdf" target="_blank">Produktblad</a></p>'; 	
		endif;
		
		return $html;
	}

	protected function getDeliveryTime($product) {	
		$deliveryAttr = $product->getResource()->getAttribute("kvt_levtid");
		$deliveryAttrId = $product->getKvtLevtid();
		$delivery = $deliveryAttr->getSource()->getOptionText($deliveryAttrId);
		$html = ''; 
		if ($delivery):
			$html .= '<p class="delivery"><span class="att_label">Leveranstid:</span> '.$delivery.' </p>'; 
		endif;
		
		return $html;
	}
	
	protected function getAttributeCode($product, $option, $label) {	
		$attribute = $product->getResource()->getAttribute($option);
		$attributeValue = $attribute ->getFrontend()->getValue($product);
		$html = ''; 
		if ($attribute && $label == 1):
			$html .= '<p class="attribute"><span class="att_label">'.$attribute->getFrontendLabel().':</span> '.$attributeValue.' </p>'; 
		elseif ($attribute && $label == 0):
			$html .= $attributeValue;
		endif;
		
		return $html;		
		
	}
  
  
	protected function _toHtml() {
		$product = Mage::registry('current_product');
		$html = '';  
		if (is_array($this->getData()) && $this->getData()) {
			foreach ($this->getData() as $option) {
				switch ($option) {
				case 'quantity':
					return $this->getQuantity($product);
					break;
				case 'stock_status':
					return $this->getStockstatus($product);
					break;
				case 'manual':
					return $this->getManual($product);
					break;
				case 'assembly':
					return $this->getAssembly($product);
					break;
				case 'productsheet':
					return $this->getProductsheet($product);
					break;
				case 'delivery':
					return $this->getDeliveryTime($product);
					break;
				}
			}
			foreach ($this->getData() as $code) {
				switch ($code) {
				default: return $this->getAttributeCode($product, $this->getData('attribute_code'), $this->getData('attribute_label'));
					break;
				}
			}
		}
	}
	
}