<?php
namespace Example\Package\Web;

use Aura\Framework\Web\Controller\AbstractPage;
use Example\Package\GenericFactory;

abstract class PageController extends AbstractPage
{
    protected $factory;
    
    protected $session_manager;

    public function setFactory(GenericFactory $factory)
    {
        $this->factory = $factory;
    }

    public function getFactory()
    {
        return $this->factory;
    }
    
    public function setSessionManager(SessionManager $session_manager)
    {
        $this->session_manager = $session_manager;
    }
    
    public function getSessionManager()
    {
        return $this->session_manager;
    }
}
