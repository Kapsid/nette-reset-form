<?php

declare(strict_types=1);

namespace App\Presenters;
use App\Model\Reset;
use Nette\Application\UI\Control;
use ResetPasswordControl;

final class ResetPasswordPresenter extends BasePresenter
{
    /** @var Reset @inject */
    public $reset;

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
    public function createComponentReset() : Control {
        return new ResetPasswordControl($this->reset);
    }

}
