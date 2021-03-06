<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Customer
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Customer resource setup model
 *
 * @category   Mage
 * @package    Mage_Customer
 */
class Mydons_Customer_Model_Entity_Setup extends Mage_Customer_Model_Entity_Setup
{

    /**
     * Prepare customer attribute values to save
     *
     * @param array $attr
     * @return array
     */
    protected function _prepareValues($attr)
    {
        $data = parent::_prepareValues($attr);
        $data = array_merge($data, array(
            'is_visible'                => $this->_getValue($attr, 'visible', 1),
            'is_visible_on_front'       => $this->_getValue($attr, 'visible_on_front', 0),
            'input_filter'              => $this->_getValue($attr, 'input_filter', ''),
            'lines_to_divide_multiline' => $this->_getValue($attr, 'lines_to_divide', 0),
            'min_text_length'           => $this->_getValue($attr, 'min_text_length', 0),
            'max_text_length'           => $this->_getValue($attr, 'max_text_length', 0)
        ));
        return $data;
    }

    public function getDefaultEntities()
    {
        return array(
            'customer' => array(
                'entity_model'          =>'customer/customer',
                'table'                 => 'customer/entity',
                'increment_model'       => 'eav/entity_increment_numeric',
                'increment_per_store'   => false,
                'additional_attribute_table' => 'customer/eav_attribute',
                'entity_attribute_collection' => 'customer/attribute_collection',
                'attributes' => array(
//                    'entity_id'         => array('type'=>'static'),
//                    'entity_type_id'    => array('type'=>'static'),
//                    'attribute_set_id'  => array('type'=>'static'),
//                    'increment_id'      => array('type'=>'static'),
//                    'created_at'        => array('type'=>'static'),
//                    'updated_at'        => array('type'=>'static'),
//                    'is_active'         => array('type'=>'static'),

                    'website_id' => array(
                        'type'          => 'static',
                        'label'         => 'Associate to Website',
                        'input'         => 'select',
                        'source'        => 'customer/customer_attribute_source_website',
                        'backend'       => 'customer/customer_attribute_backend_website',
                        'sort_order'    => 10,
                    ),
                    'store_id' => array(
                        'type'          => 'static',
                        'label'         => 'Create In',
                        'input'         => 'select',
                        'source'        => 'customer/customer_attribute_source_store',
                        'backend'       => 'customer/customer_attribute_backend_store',
                        'visible'       => false,
                        'sort_order'    => 20,
                    ),
                    'created_in' => array(
                        'type'          => 'varchar',
                        'label'         => 'Created From',
                        'sort_order'    => 30,
                    ),
                    'prefix' => array(
                        'label'         => 'Prefix',
                        'required'      => false,
                        'sort_order'    => 37,
                    ),
                    'firstname' => array(
                        'label'         => 'First Name',
                        'sort_order'    => 40,
                    ),
                    'middlename' => array(
                        'label'         => 'Middle Name/Initial',
                        'required'      => false,
                        'sort_order'    => 43,
                    ),
                    'lastname' => array(
                        'label'         => 'Last Name',
                        'sort_order'    => 50,
                    ),
                    'suffix' => array(
                        'label'         => 'Suffix',
                        'required'      => false,
                        'sort_order'    => 53,
                    ),
                    'email' => array(
                        'type'          => 'static',
                        'label'         => 'Email',
                        'class'         => 'validate-email',
                        'sort_order'    => 60,
                    ),
                    'group_id' => array(
                        'type'          => 'static',
                        'input'         => 'select',
                        'label'         => 'Group',
                        'source'        => 'customer/customer_attribute_source_group',
                        'sort_order'    => 70,
                    ),
                    'dob' => array(
                        'type'          => 'datetime',
                        'input'         => 'date',
                        'backend'       => 'eav/entity_attribute_backend_datetime',
                        'required'      => false,
                        'label'         => 'Date Of Birth',
                        'sort_order'    => 80,
                    ),
                    'password_hash' => array(
                        'input'         => 'hidden',
                        'backend'       => 'customer/customer_attribute_backend_password',
                        'required'      => false,
                    ),
                    'default_billing' => array(
                        'type'          => 'int',
                        'visible'       => false,
                        'required'      => false,
                        'backend'       => 'customer/customer_attribute_backend_billing',
                    ),
                    'default_shipping' => array(
                        'type'          => 'int',
                        'visible'       => false,
                        'required'      => false,
                        'backend'       => 'customer/customer_attribute_backend_shipping',
                    ),
                    'taxvat' => array(
                        'label'         => 'Tax/VAT Number',
                        'visible'       => true,
                        'required'      => false,
                    ),
                    'confirmation' => array(
                        'label'         => 'Is Confirmed',
                        'visible'       => false,
                        'required'      => false,
                    ),
                    'created_at' => array(
                        'type'          => 'static',
                        'label'         => 'Created At',
                        'visible'       => false,
                        'required'      => false,
                        'input'         => 'date',
                    ),
					'mobile' => array( 
						'type'          => 'static',
                        'label'         => 'Mobile',
                        'visible'       => true,
                        'required'      => true,
                        'input'         => '80',
					),
                ),
            ),

            'customer_address'=>array(
                'entity_model'  =>'customer/customer_address',
                'table' => 'customer/address_entity',
                'additional_attribute_table' => 'customer/eav_attribute',
                'entity_attribute_collection' => 'customer/address_attribute_collection',
                'attributes' => array(
//                    'entity_id'         => array('type'=>'static'),
//                    'entity_type_id'    => array('type'=>'static'),
//                    'attribute_set_id'  => array('type'=>'static'),
//                    'increment_id'      => array('type'=>'static'),
//                    'parent_id'         => array('type'=>'static'),
//                    'created_at'        => array('type'=>'static'),
//                    'updated_at'        => array('type'=>'static'),
//                    'is_active'         => array('type'=>'static'),

                    'prefix' => array(
                        'label'         => 'Prefix',
                        'required'      => false,
                        'sort_order'    => 7,
                    ),
                    'firstname' => array(
                        'label'         => 'First Name',
                        'sort_order'    => 10,
                    ),
                    'middlename' => array(
                        'label'         => 'Middle Name/Initial',
                        'required'      => false,
                        'sort_order'    => 13,
                    ),
                    'lastname' => array(
                        'label'         => 'Last Name',
                        'sort_order'    => 20,
                    ),
                    'suffix' => array(
                        'label'         => 'Suffix',
                        'required'      => false,
                        'sort_order'    => 23,
                    ),
                    'company' => array(
                        'label'         => 'Company',
                        'required'      => false,
                        'sort_order'    => 30,
                    ),
                    'street' => array(
                        'type'          => 'text',
                        'backend'       => 'customer_entity/address_attribute_backend_street',
                        'input'         => 'multiline',
                        'label'         => 'Street Address',
                        'sort_order'    => 40,
                    ),
                    'city' => array(
                        'label'         => 'City',
                        'sort_order'    => 50,
                    ),
                    'country_id' => array(
                        'type'          => 'varchar',
                        'input'         => 'select',
                        'label'         => 'Country',
                        'class'         => 'countries',
                        'source'        => 'customer_entity/address_attribute_source_country',
                        'sort_order'    => 60,
                    ),
                    'region' => array(
                        'backend'       => 'customer_entity/address_attribute_backend_region',
                        'label'         => 'State/Province',
                        'class'         => 'regions',
                        'sort_order'    => 70,
                    ),
                    'region_id' => array(
                        'type'          => 'int',
                        'input'         => 'hidden',
                        'source'        => 'customer_entity/address_attribute_source_region',
                        'required'      => 'false',
                        'sort_order'    => 80,
                        'label'         => 'State/Province'
                    ),
                    'postcode' => array(
                        'label'         => 'Zip/Postal Code',
                        'sort_order'    => 90,
                    ),
                    'telephone' => array(
                        'label'         => 'Telephone',
                        'sort_order'    => 100,
                    ),
                    'fax' => array(
                        'label'         => 'Fax',
                        'required'      => false,
                        'sort_order'    => 110,
                    ),
                ),
            ),
        );
    }

}
