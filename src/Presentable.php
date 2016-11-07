<?php 

namespace Origami\Presenter;

use Origami\Presenter\PresenterException;

trait Presentable {

    /**
     * View presenter instance
     *
     * @var Presenter
     */
    private $presenterInstance;

    /**
     * Prepare a new or cached presenter instance
     *
     * @return Presenter
     * @throws PresenterException
     */
    public function present()
    {
        if ( ! $this->presenter OR ! class_exists($this->presenter) ) {
            throw new PresenterException('Please set the $presenter property to your presenter path.');
        }

        if ( ! $this->presenterInstance ) {
            $this->presenterInstance = new $this->presenter($this);
        }

        return $this->presenterInstance;
    }

}