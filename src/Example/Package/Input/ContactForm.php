<?php
namespace Example\Package\Input;

use Aura\Input\Form;

class ContactForm extends Form
{
    public function init()
    {
        // the options object injected via constructor
        $options = $this->getOptions();

        $states = $options->getStates();

        // set input fields
        // hint the view layer to treat the first_name field as a text input,
        // with size and maxlength attributes
        $this->setField('name', 'text')
             ->setAttribs(array(
                'size' => 20,
                'maxlength' => 20,
             ));

        // hint the view layer to treat the state field as a select, with a
        // particular set of options (the keys are the option values, and the values
        // are the displayed text)
        $this->setField('state', 'select')
             ->setOptions($states);

        $this->setField('message', 'textarea')
            ->setAttribs([
                'cols' => 40,
                'rows' => 5,
            ]);

         $this->setField('send', 'submit')
            ->setAttribs(['value' => 'send']);
        // etc.

        // set input filters
        $filter = $this->getFilter();
        $filter->addSoftRule('name', $filter::IS, 'string');
        $filter->addSoftRule('name', $filter::IS, 'strlenMin', 4);
        $filter->addSoftRule('state', $filter::IS, 'inKeys', $states);
        $filter->addSoftRule('message', $filter::IS, 'string');
        $filter->addSoftRule('message', $filter::IS, 'strlenMin', 6);
    }
}

