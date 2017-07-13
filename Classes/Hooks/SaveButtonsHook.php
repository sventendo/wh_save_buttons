<?php

namespace Widerheim\WhSaveButtons\Hooks;

use TYPO3\CMS\Backend\Template\Components\Buttons\InputButton;
use TYPO3\CMS\Backend\Template\Components\Buttons\SplitButton;
use TYPO3\CMS\Core\Exception;
use Widerheim\WhSaveButtons\Exception\NoSaveButtonsFoundException;

/**
 * Add an extra save and close button at the end
 *
 * Class SaveButtonHook
 * @package Widerheim\WhSaveButtons\Hooks
 */
Class SaveButtonsHook
{
    /**
     * @var int
     */
    protected $splitButtonIndex = 0;

    /**
     * @param array $params
     * @param $ref
     * @throws Exception
     * @return array
     */
    public function revertSaveButtons($params, &$ref)
    {
        if (!isset($params['buttons']['left'])) {
            // something is wrong here, bail.
            return $params['buttons'];
        }
        $buttons = $params['buttons']['left'];

        try {
            $secondarySaveButtons = $this->getSecondarySaveButtons($buttons);
            array_splice(
                $params['buttons']['left'],
                $this->splitButtonIndex,
                1,
                [$secondarySaveButtons]
            );
        } catch(NoSaveButtonsFoundException $e) {
        }

        return $params['buttons'];
    }

    /**
     * @param array $buttonClusters
     * @return InputButton
     * @throws NoSaveButtonsFoundException
     */
    private function getSecondarySaveButtons($buttonClusters)
    {
        try {
            $index = 0;
            foreach ($buttonClusters as $buttonCluster) {
                /** @var array $buttonCluster */
                foreach ($buttonCluster as $button) {
                    if ($button instanceof SplitButton) {
                        $subButtons = $button->getButton();

                        /** @var InputButton $primaryButton */
                        $primaryButton = $subButtons['primary'];

                        if ($primaryButton->getName() === '_savedok') {
                            $this->splitButtonIndex = $index;
                            return array_merge([$primaryButton], $subButtons['options']);
                        }
                    }
                }
                $index++;
            }
        } catch (Exception $e) {
            throw new NoSaveButtonsFoundException('Could not parse button structure.');
        }
        throw new NoSaveButtonsFoundException('No Save buttons Found.');
    }
}
