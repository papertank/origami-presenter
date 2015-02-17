<?php namespace Origami\Presenter;

abstract class Presenter {

    protected $entity;

    /**
     * @param $entity
     */
    function __construct(PresentableInterface $entity)
    {
        $this->entity = $entity;
    }

    /**
     * Allow for property-style retrieval
     *
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        $camel = camel_case($property);

        if ( method_exists($this, $camel) ) {
            $value = $this->{$camel}();
        } else {
            $value = $this->entity->{$camel};
        }

        return $value;
    }

}