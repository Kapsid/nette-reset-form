<?php

use DirSync\DirSync;
use Nette\Application\UI\Control;
use Tracy\Debugger;

class WelcomeControl extends Control {

    // For future usage
    public function __construct() {}

    /**
     * The main render function for the control
     * @throws Exception
     * @throws \DirSync\Exception
     */
    public function render() : void {

        $this->template->setFile(__DIR__.'/WelcomeControl.latte');

        //
        $dirSync = new DirSync();
        $dirSync->setRootDir(__DIR__.'/example');
        $dirSync->fromFile(__DIR__.'/test.json');
        $dirSync->setJsonInput();
        $dirSync->sync();

        $this->template->render();
    }

}