<?php

class Twig_Extension_Session extends Twig_Extension
{
    public function getGlobals()
    {
        return array(
            'session'   => $_SESSION
        ) ;
    }

    public function getName()
    {
        return 'session';
    }
}
/*
 * $twig->addExtension(new Twig_Extension_Session());

function flash($name, $first)
{
    $_SESSION['name'] = $name;
    $_SESSION['firstName'] = $first;
}
 */
