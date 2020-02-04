<?php

declare(strict_types=1);

namespace App\Presenters;
use Nette\Application\UI\Control;
use WelcomeControl;

final class HomepagePresenter extends BasePresenter
{
    /**
     * Rendering
     */
	public function renderDefault(): void
	{
		//
	}

    /**
     * Creating component for Homepage content
     * @return Control
     */
    public function createComponentWelcome() : Control {
        return new WelcomeControl();
    }

}
