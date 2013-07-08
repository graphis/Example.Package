<?php
namespace Example\Package;

class Options
{
    protected $states = array(
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        // ...
    );

    public function getStates()
    {
        return $this->states;
    }
}
