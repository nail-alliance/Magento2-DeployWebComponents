How to use:

CMS
{{block class="Nailalliance\WebComponents\Block\WebComponents" template="Nailalliance_WebComponents::eb-wc.phtml" txtfiles="entitybeauty-homepage.txt|entitybeauty-blah.txt"}}

PHTML
<?php
$layout = $block->getLayout();
$customBlock = $layout->createBlock(
    \Nailalliance\WebComponents\Block\WebComponents::class,
    'custom.webcomponents.block',
    ['data' => ['template' => 'Nailalliance_WebComponents::eb-wc.phtml']]
);
$customBlock->setData('txtfiles', 'entitybeauty-homepage.txt|entitybeauty-blah.txt');
echo $customBlock->toHtml();
?>
