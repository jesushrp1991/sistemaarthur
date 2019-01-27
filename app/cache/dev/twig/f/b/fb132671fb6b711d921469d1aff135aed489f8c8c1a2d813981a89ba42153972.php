<?php

/* base.html.twig */
class __TwigTemplate_fb132671fb6b711d921469d1aff135aed489f8c8c1a2d813981a89ba42153972 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4850563eb3bd9a58f56677a2543caab321a46527c294f3b9996dacf901440d43 = $this->env->getExtension("native_profiler");
        $__internal_4850563eb3bd9a58f56677a2543caab321a46527c294f3b9996dacf901440d43->enter($__internal_4850563eb3bd9a58f56677a2543caab321a46527c294f3b9996dacf901440d43_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_4850563eb3bd9a58f56677a2543caab321a46527c294f3b9996dacf901440d43->leave($__internal_4850563eb3bd9a58f56677a2543caab321a46527c294f3b9996dacf901440d43_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_607007cd750e37b5b645478bca5433a007c6a71ba5fc6b8ed76e2a417ca48afd = $this->env->getExtension("native_profiler");
        $__internal_607007cd750e37b5b645478bca5433a007c6a71ba5fc6b8ed76e2a417ca48afd->enter($__internal_607007cd750e37b5b645478bca5433a007c6a71ba5fc6b8ed76e2a417ca48afd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_607007cd750e37b5b645478bca5433a007c6a71ba5fc6b8ed76e2a417ca48afd->leave($__internal_607007cd750e37b5b645478bca5433a007c6a71ba5fc6b8ed76e2a417ca48afd_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_3658a272b088befe5382e7a6d8028b90b3956fe414bc4137eee309309da34f17 = $this->env->getExtension("native_profiler");
        $__internal_3658a272b088befe5382e7a6d8028b90b3956fe414bc4137eee309309da34f17->enter($__internal_3658a272b088befe5382e7a6d8028b90b3956fe414bc4137eee309309da34f17_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_3658a272b088befe5382e7a6d8028b90b3956fe414bc4137eee309309da34f17->leave($__internal_3658a272b088befe5382e7a6d8028b90b3956fe414bc4137eee309309da34f17_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_4c41c1d5d22131c52a49e4dd11f848683a1268ad2fcf61d13f8e636fab8737bf = $this->env->getExtension("native_profiler");
        $__internal_4c41c1d5d22131c52a49e4dd11f848683a1268ad2fcf61d13f8e636fab8737bf->enter($__internal_4c41c1d5d22131c52a49e4dd11f848683a1268ad2fcf61d13f8e636fab8737bf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_4c41c1d5d22131c52a49e4dd11f848683a1268ad2fcf61d13f8e636fab8737bf->leave($__internal_4c41c1d5d22131c52a49e4dd11f848683a1268ad2fcf61d13f8e636fab8737bf_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_0842285b5c4ed44efacadf5880e0357877373313ca51e229dd5caa7820e0e07e = $this->env->getExtension("native_profiler");
        $__internal_0842285b5c4ed44efacadf5880e0357877373313ca51e229dd5caa7820e0e07e->enter($__internal_0842285b5c4ed44efacadf5880e0357877373313ca51e229dd5caa7820e0e07e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_0842285b5c4ed44efacadf5880e0357877373313ca51e229dd5caa7820e0e07e->leave($__internal_0842285b5c4ed44efacadf5880e0357877373313ca51e229dd5caa7820e0e07e_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
