<?php
/**
 * 
 * This file is part of the Aura project for PHP.
 * 
 * @package Aura.Framework
 * 
 * @license http://opensource.org/licenses/bsd-license.php BSD
 * 
 */
namespace Example\Package\View\Helper;

use Aura\View\Helper\AbstractHelper;
use Aura\Session\Manager;

/**
 * 
 * Returns the session manager object
 * 
 * @package Aura.View
 * 
 */
class SessionManager extends AbstractHelper
{
    /**
     * 
     * A session manager object.
     * 
     * @var Manager
     * 
     */
    protected $session_manager;

    /**
     *
     * Constructor.
     *
     * @param Manager $session_manager A session manager object
     *
     */
    public function __construct(Manager $session_manager)
    {
        $this->session_manager = $session_manager;
    }

    /**
     * 
     * Returns the Aura\Session\Manager object
     * 
     * 
     * @return Aura\Session\Manager
     * 
     */
    public function __invoke()
    {
        return $this->session_manager;
    }
}
