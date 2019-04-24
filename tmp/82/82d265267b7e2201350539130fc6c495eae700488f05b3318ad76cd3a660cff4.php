<?php

use Twig\Environment;
use Twig\Source;

/* connection.php.twig */

class __TwigTemplate_0cfe6ceb0a7109bf2ffec1fa5d3137d7aab4037d4cfff878ff8a913996889f4f extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    public function getTemplateName()
    {
        return "connection.php.twig";
    }

    public function getDebugInfo()
    {
        return array(30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The ' . __METHOD__ . ' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "connection.php.twig", "C:\\wamp64\\www\\P5\\views\\connection.php.twig");
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "Hello les gens !
";
    }
}
