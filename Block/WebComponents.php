<?php
namespace Nailalliance\WebComponents\Block;

class WebComponents extends \Nailalliance\EcomSwitch\Block\IpDetector
{
    public function checkAllowed()
    {
        return $this->isAllowed();
    }

    public function getTxtFiles()
    {
        return $this->getData('txtfiles');
    }
}
