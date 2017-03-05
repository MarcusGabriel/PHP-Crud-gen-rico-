<?php

namespace Acme\Interfaces;

Interface Imodel{

    public function create($attributes);

    public function read();

    public function update($id, $attritubes);

    public function delete($name, $value);

    public function findBy($name, $value);


}