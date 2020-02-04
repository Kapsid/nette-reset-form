<?php

use Nette\Application\UI\Control;

class WelcomeControl extends Control {

    // For future usage
    public function __construct() {}

    /**
     * The main render function for the control
     * @throws Exception
     */
    public function render() : void {

        $this->template->setFile(__DIR__.'/WelcomeControl.latte');
        $this->template->render();
    }

}