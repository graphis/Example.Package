<?php
namespace Example\Package\Web\Greet;

use Example\Package\Web\PageController;

class Page extends PageController
{
    public function actionIndex()
    {
        $this->data->message = $this->context->getQuery('name', 'guys!');
        // only one view
        $this->view = 'index';
        // multiple views
        /*
        $this->view = [
            '.html' => 'greet.html.php',
            '.json' => 'greet.json.php',
            '.xml' => 'greet.xml.php'
        ];
        */
        // only one layout
        $this->layout = 'default';

        // if you have multiple alyouts for different formats
        /*
        $this->layout = [
            '.html' => 'default.php',
            '.json' => '',
            '.xml' => ''
        ];
        */
    }

    public function actionContactForm()
    {
        $form = $this->factory->newInstance('form.contact');
        if ($this->context->isPost()) {
            $post = $_POST;
            // fill the form with $_POST array elements
            // that match the form input names.
            $form->fill($post);

            // apply the filters
            $pass = $form->filter();

            // did all the filters pass?
            if ($pass) {
                // yes, user input is valid
                $model = $this->factory->newInstance('model.contact');
                $model->insert($post);
            } else {
                // no; get the messages.
                // user input is not valid
                /*
                foreach ($form->getMessages() as $name => $messages) {
                    foreach ($messages as $message) {
                        echo "Input '{$name}': {$message}" . PHP_EOL;
                    }
                }
                */
            }
        }
        $this->data->form = $form;
        $this->view = 'contact';
        $this->layout = 'default';
    }
}
