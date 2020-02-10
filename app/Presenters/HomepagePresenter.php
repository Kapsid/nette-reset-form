<?php

declare(strict_types=1);

namespace App\Presenters;
use DirSync\DirSync;
use Nette\Application\UI\Control;
use Tracy\Debugger;
use WelcomeControl;

final class HomepagePresenter extends BasePresenter
{
    /**
     * Rendering
     */
	public function renderDefault(): void
	{
	}

    /**
     * Creating component for Homepage content
     * @return Control
     */
    public function createComponentWelcome() : Control {
        return new WelcomeControl();
    }

}
