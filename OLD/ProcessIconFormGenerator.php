<?php

namespace main;
require_once "src/ProcessManager.php";

class ProcessIconFormGenerator
{
    public $icon;
    public $form;

    public function __construct(string $command, string $iconOK = null, string $iconError = null)
    {
        $processManager = new ProcessManager();
        if ($processManager->show($command) == 3) {
            $this->icon = $iconOK;
            $this->form = '<form action="ProcessManager" method="post">
            <input type="hidden" name="action" value="kill">
            <input type="hidden" name="command" value="' . $command . '">
            <a type="submit" onclick="this.closest(\'form\').submit();return false;" style="cursor:pointer">
            Stop service</a></form>';

        } else {
            $this->icon = $iconError;
            $this->form = '<form action="ProcessManager" method="post">
            <input type="hidden" name="action" value="run">
            <input type="hidden" name="command" value="' . $command . '">
            <a type="submit" onclick="this.closest(\'form\').submit();return false;" style="cursor:pointer">
            Start service</a></form>';
        }
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public function getForm(): string
    {
        return $this->form;
    }
}