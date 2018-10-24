<?php

namespace Divae\TagsFilter\ViewHelpers;


class RandomViewHelper extends  \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    public function initializeArguments()
    {
        $this->registerArgument('min', 'string', '');
        $this->registerArgument('max', 'string', '');
    }

    public function render()
    {
        return rand($this->arguments['min'], $this->arguments['max']);
    }
}