<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Backend\Block\Widget\Grid\Column\Filter;

/**
 * Country grid filter
 */
class Country extends \Magento\Backend\Block\Widget\Grid\Column\Filter\Select
{
    /**
     * @var \Magento\Directory\Model\Resource\Country\CollectionFactory
     */
    protected $_directoriesFactory;

    /**
     * @param \Magento\Backend\Block\Context $context
     * @param \Magento\Framework\DB\Helper $resourceHelper
     * @param \Magento\Directory\Model\Resource\Country\CollectionFactory $directoriesFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Context $context,
        \Magento\Framework\DB\Helper $resourceHelper,
        \Magento\Directory\Model\Resource\Country\CollectionFactory $directoriesFactory,
        array $data = []
    ) {
        $this->_directoriesFactory = $directoriesFactory;
        parent::__construct($context, $resourceHelper, $data);
    }

    /**
     * @return array
     */
    protected function _getOptions()
    {
        $options = $this->_directoriesFactory->create()->load()->toOptionArray(false);
        array_unshift($options, ['value' => '', 'label' => __('All Countries')]);
        return $options;
    }
}
