<?php
namespace Example\Package\Web;

use Aura\Framework\Web\Controller\AbstractPage;
use Example\Package\GenericFactory;

abstract class PageController extends AbstractPage
{
    protected $factory;

    public function setFactory(GenericFactory $factory)
    {
        $this->factory = $factory;
    }

    public function getFactory()
    {
        return $this->factory;
    }
}
