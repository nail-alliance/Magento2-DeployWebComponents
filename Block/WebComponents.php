<?php
namespace Nailalliance\WebComponents\Block;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Model\Layer\Resolver as CatalogLayerResolver;

class WebComponents extends \Nailalliance\EcomSwitch\Block\IpDetector
{
    protected $storeManager;
    protected $catalogLayer;

    public function __construct(
        Template\Context $context,
        StoreManagerInterface $storeManager,
        CatalogLayerResolver $catalogLayerResolver,
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->catalogLayer = $catalogLayerResolver->get();
        parent::__construct($context, $data);
    }

    public function checkAllowed()
    {
        return $this->isAllowed();
    }

    public function getTxtFiles()
    {
        return $this->getData('txtfiles');
    }

    public function getCurrentStoreId()
    {
        return $this->storeManager->getStore()->getId();
    }

    public function getCurrentBaseUrl()
    {
        return $this->storeManager->getStore()->getBaseUrl();
    }

    public function getCurrentCategoryId()
    {
        try {
            if ($category = $this->catalogLayer->getCurrentCategory()) {
                return $category->getId();
            }
        } catch (\Exception $e) {
            return null;  // Handle the situation when the category is not available
        }
        return null;
    }
}
?>
