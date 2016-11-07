<?php 

namespace Origami\Presenter;

use Illuminate\Support\Str;

abstract class Presenter {

    protected $entity;

    /**
     * @param $entity
     */
    function __construct($entity)
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
        $camel = Str::camel($property);

        if ( method_exists($this, $camel) ) {
            $value = $this->{$camel}();
        } else {
            $value = $this->entity->{$camel};
        }

        return $value;
    }

}