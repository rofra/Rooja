<?php
class Wyomind_Orderseraser_Model_Orderseraser extends Varien_Object{
	
	public function _erase($orderId){
		$resource = Mage::getSingleton('core/resource');
		$sql="DELETE FROM  ".$tableSoe." WHERE parent_id = ".$orderId.";";
		$delete->query($sql);
		$sql="DELETE s FROM  ".$tableSoe." s
				 JOIN  ".$tableSoei." si on s.entity_id = si.entity_id
				 JOIN  ".$tableEa." a on si.attribute_id = a.attribute_id
				 WHERE a.attribute_code = 'order_id'
				 AND si.value = ".$orderId.";";
		$delete->query($sql);
		return true;
	}
}
	