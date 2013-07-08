<?php
/**
 *
 * This code is inspired from Symfony
 *
 * https://github.com/symfony/symfony-standard/blob/master/src/Acme/DemoBundle/Twig/Extension/DemoExtension.php
 *
 */
namespace Example\Package\Extension;

class Code
{
    protected $controller;

    public function setController($controller)
    {
        $this->controller = $controller;
    }

    public function getCode()
    {
        $controller_code = htmlspecialchars($this->getControllerCode(), ENT_QUOTES, 'UTF-8');
        $response = $this->controller->getResponse();
        $content = $response->getContent();
        $content = str_replace('{controller_code}', $controller_code, $content);
        $view_code =  htmlspecialchars($this->getTemplateCode(), ENT_QUOTES, 'UTF-8');
        $content = str_replace('{view_code}', $view_code, $content);
        $response->setContent($content);
    }

    protected function getControllerCode()
    {
        $r = new \ReflectionClass($this->controller);
        $action = $this->controller->getAction();
        $method = 'action' . ucfirst($action);
        $m = $r->getMethod($method);
        $code = file($r->getFilename());
        return '    ' . $m->getDocComment() . "\n" .
            implode('', array_slice($code, $m->getStartline() - 1, $m->getEndLine() - $m->getStartline() + 1));
    }

    protected function getTemplateCode()
    {
        $view = $this->controller->getView();
        if (is_array($view)) {
            $format = $this->controller->getFormat();
            if (! $format) {
                $format = '.html';
            }
            $template = $view[$format];
        } else {
            $template = $view;
        }
        $render = $this->controller->getRenderer();
        $render->getTemplate()->setPaths($render->getInnerPaths());
        if ($template) {
            $path = $render->getTemplate()->find($template);
            return file_get_contents($path);
        }
    }
}
