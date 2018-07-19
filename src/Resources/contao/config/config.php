<?php

/**
 * Configuration
 */
$GLOBALS['HUH_INPUT_COUNT'] = [];

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseBackendTemplate']['addInputCount'] = ['huh.input_count.listener.hooks', 'addInputCount'];

/**
 * Assets
 */
if (\Contao\System::getContainer()->get('huh.utils.container')->isBackend()) {
    $GLOBALS['TL_JAVASCRIPT']['contao-input-counter-bundle'] = 'bundles/heimrichhannotcontaoinputcounter/input-counter-bundle.js|static';
}