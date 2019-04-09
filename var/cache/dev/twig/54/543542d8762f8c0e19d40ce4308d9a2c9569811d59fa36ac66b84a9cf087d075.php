<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_856f41abc48494c719af940919182551f8355b4fe46d59756a2bc373d64d75b0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e272f48964ef7322d076997cbb2750de937c3ac3e97d4b72698e64dd7ada01de = $this->env->getExtension("native_profiler");
        $__internal_e272f48964ef7322d076997cbb2750de937c3ac3e97d4b72698e64dd7ada01de->enter($__internal_e272f48964ef7322d076997cbb2750de937c3ac3e97d4b72698e64dd7ada01de_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e272f48964ef7322d076997cbb2750de937c3ac3e97d4b72698e64dd7ada01de->leave($__internal_e272f48964ef7322d076997cbb2750de937c3ac3e97d4b72698e64dd7ada01de_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_bda61a5196b926dc237faee10646c187f9b3f43a6661936f2b3528a57f2f0ab6 = $this->env->getExtension("native_profiler");
        $__internal_bda61a5196b926dc237faee10646c187f9b3f43a6661936f2b3528a57f2f0ab6->enter($__internal_bda61a5196b926dc237faee10646c187f9b3f43a6661936f2b3528a57f2f0ab6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_bda61a5196b926dc237faee10646c187f9b3f43a6661936f2b3528a57f2f0ab6->leave($__internal_bda61a5196b926dc237faee10646c187f9b3f43a6661936f2b3528a57f2f0ab6_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_ad404522a40f96993314507c39b26238b078a90e009fac64bc0a393a1e9ff6db = $this->env->getExtension("native_profiler");
        $__internal_ad404522a40f96993314507c39b26238b078a90e009fac64bc0a393a1e9ff6db->enter($__internal_ad404522a40f96993314507c39b26238b078a90e009fac64bc0a393a1e9ff6db_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_ad404522a40f96993314507c39b26238b078a90e009fac64bc0a393a1e9ff6db->leave($__internal_ad404522a40f96993314507c39b26238b078a90e009fac64bc0a393a1e9ff6db_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_d71e1cef6f95898c971a9139349df2d2d6004d19bf70fbd2e014ddaf38306255 = $this->env->getExtension("native_profiler");
        $__internal_d71e1cef6f95898c971a9139349df2d2d6004d19bf70fbd2e014ddaf38306255->enter($__internal_d71e1cef6f95898c971a9139349df2d2d6004d19bf70fbd2e014ddaf38306255_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_d71e1cef6f95898c971a9139349df2d2d6004d19bf70fbd2e014ddaf38306255->leave($__internal_d71e1cef6f95898c971a9139349df2d2d6004d19bf70fbd2e014ddaf38306255_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
