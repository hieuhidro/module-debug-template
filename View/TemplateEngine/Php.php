<?php

namespace Hidro\DebugTemplate\View\TemplateEngine;

use Magento\Framework\View\Element\BlockInterface;
use Magento\Framework\ObjectManagerInterface;
use Psr\Log\LoggerInterface;

class Php extends \Magento\Framework\View\TemplateEngine\Php
{
    protected $logger;

    /**
     * @param ObjectManagerInterface $helperFactory
     * @param LoggerInterface        $logger
     */
    public function __construct(
        ObjectManagerInterface $helperFactory,
        LoggerInterface $logger
    )
    {
        parent::__construct($helperFactory);
        $this->logger = $logger;
    }

    /**
     * Render output
     *
     * Include the named PHTML template using the given block as the $this
     * reference, though only public methods will be accessible.
     *
     * @param BlockInterface           $block
     * @param string                   $fileName
     * @param array                    $dictionary
     * @return string
     * @throws \Exception
     */
    public function render(BlockInterface $block, $fileName, array $dictionary = [])
    {
        ob_start();
        try {
            $tmpBlock = $this->_currentBlock;
            $this->_currentBlock = $block;
            extract($dictionary, EXTR_SKIP);
            include $fileName;
            $this->_currentBlock = $tmpBlock;
        } catch (\Exception $exception) {
            ob_end_clean();
            throw $exception;
        }
        /** Get output buffer. */
        $output = ob_get_clean();
        return $output;
    }
}
