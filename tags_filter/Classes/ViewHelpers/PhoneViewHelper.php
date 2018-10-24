<?php


namespace Divae\TagsFilter\ViewHelpers;


class PhoneViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    public function initializeArguments()
    {
        $this->registerArgument('phone', 'string', '');
    }

    public function render()
    {

        $phone = $this->arguments['phone'];
        return preg_replace('/(\(|\)|-|\s)/', '', $phone);

    }

}