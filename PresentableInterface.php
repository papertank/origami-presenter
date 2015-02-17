<?php namespace Origami\Presenter;

interface PresentableInterface {

    /**
     * Prepare a new or cached presenter instance
     *
     * @return mixed
     */
    public function present();

}