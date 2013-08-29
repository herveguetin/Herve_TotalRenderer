<?php
/**
 * @category    Herve
 * @package     Herve_TotalRenderer
 * @copyright   Copyright (c) 2013 Hervé Guétin (http://www.herveguetin.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Herve_TotalRenderer_Block_Tax_Checkout_Shipping extends Mage_Tax_Block_Checkout_Shipping {

    /**
     * Get label for shipping include tax
     *
     * @return string
     */
    public function getIncludeTaxLabel()
    {
        $originalLabel = parent::getIncludeTaxLabel();
        return $originalLabel . $this->getAdditionalLabel();
    }

    /**
     * Get label for shipping exclude tax
     *
     * @return string
     */
    public function getExcludeTaxLabel()
    {
        $originalLabel = parent::getExcludeTaxLabel();
        return $originalLabel . $this->getAdditionalLabel();
    }

    /**
     * Get additional label string
     *
     * @return string
     */
    public function getAdditionalLabel()
    {
        return ' ' . $this->__('(Price from)');
    }

    /**
     * Update total title with our additional string
     *
     * @return void
     */
    protected function _beforeToHtml()
    {
        $originalLabel = $this->getTotal()->getTitle();
        $this->getTotal()->setTitle($originalLabel . $this->getAdditionalLabel());
    }

    /**
     * Add our additional "shipping_free" block
     *
     * @return string
     */
    protected function _toHtml()
    {
        $html = parent::_toHtml();
        $html .= $this->getChildHtml('shipping_free');
        return $html;
    }
}