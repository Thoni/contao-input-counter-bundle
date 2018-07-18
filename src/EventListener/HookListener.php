<?php

namespace HeimrichHannot\InputCounterBundle\EventListener;

use Contao\CoreBundle\Framework\ContaoFrameworkInterface;
use HeimrichHannot\RequestBundle\Component\HttpFoundation\Request;

class HookListener
{
    /**
     * @var ContaoFrameworkInterface
     */
    private $framework;

    /**
     * @var Request
     */
    private $request;

    /**
     * HookListener constructor.
     */
    public function __construct(ContaoFrameworkInterface $framework, Request $request)
    {
        $this->framework = $framework;
        $this->request = $request;
    }

    public function addInputCount($buffer, $template)
    {
        $table = $this->request->getGet('table');
        $id = $this->request->getGet('id');

        if (!isset($GLOBALS['HUH_INPUT_COUNT']) || !is_array($GLOBALS['HUH_INPUT_COUNT']) || !$table || !$id)
        {
            return $buffer;
        }

        foreach ($GLOBALS['HUH_INPUT_COUNT'] as $config)
        {
            if ($config['table'] === $table)
            {
                $buffer = str_replace('<body', '<body data-input-count="' . htmlspecialchars(\json_encode($config['fields']), ENT_QUOTES, 'UTF-8') . '"', $buffer);

                break;
            }
        }

        return $buffer;
    }
}