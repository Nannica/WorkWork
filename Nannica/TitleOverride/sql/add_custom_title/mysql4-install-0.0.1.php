<?php
$this->startSetup();
$this->addAttribute('catalog_category', 'title_override', array(
    'group'				=> 'General Information',
    'input'				=> 'text',
    'type'					=> 'varchar',
    'label'				=> 'Custom h1',
    'backend'			=> '',
    'visible'				=> true,
    'required'			=> false,
    'visible_on_front'	=> true,
    'global'				=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
 
$this->endSetup();