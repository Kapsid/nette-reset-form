<?php

declare(strict_types=1);

namespace App\Presenters;
use App\Factory\ResetPasswordControlFactory;
use Nette\Application\UI\Control;

final class ResetPasswordPresenter extends BasePresenter
{

    /**
     * @var ResetPasswordControlFactory
     */
    private $resetPasswordControlFactory;

    public function __construct(ResetPasswordControlFactory $resetPasswordControlFactory)
    {
        parent::__construct();
        $this->resetPasswordControlFactory = $resetPasswordControlFactory;
    }

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
        return $this->resetPasswordControlFactory->create();
    }

}
