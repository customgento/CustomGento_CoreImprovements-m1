<?php

class CustomGento_CoreImprovements_Model_ConfigurableSwatches_Observer
{
    public function productListCollectionLoadAfter(Varien_Event_Observer $observer)
    {
        // we do not want to depend on the module Mage_ConfigurableSwatches, so check if it is enabled first
        if (!Mage::helper('core')->isModuleEnabled('Mage_ConfigurableSwatches')) {
            return;
        }

        // the default method only checks if configurable swatches are enabled in general,
        // but not if they are enabled on the category page
        if (empty(Mage::helper('configurableswatches/productlist')->getSwatchAttributeId())) {
            return;
        }

        Mage::getSingleton('configurableswatches/observer')->productListCollectionLoadAfter($observer);
    }
}
