<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_9a6c509f64e65d72af73e9fb0922556359a70168d457cce42e85703e0a837a1d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_511927ccd1b73b443b4bdc17c408eb04223b066966348d8b1d6ffd60067d6169 = $this->env->getExtension("native_profiler");
        $__internal_511927ccd1b73b443b4bdc17c408eb04223b066966348d8b1d6ffd60067d6169->enter($__internal_511927ccd1b73b443b4bdc17c408eb04223b066966348d8b1d6ffd60067d6169_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_511927ccd1b73b443b4bdc17c408eb04223b066966348d8b1d6ffd60067d6169->leave($__internal_511927ccd1b73b443b4bdc17c408eb04223b066966348d8b1d6ffd60067d6169_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_6fe2945a19037182b7cdbd7d2c52380e7f8f3bedb24ac77c0364a579042a9542 = $this->env->getExtension("native_profiler");
        $__internal_6fe2945a19037182b7cdbd7d2c52380e7f8f3bedb24ac77c0364a579042a9542->enter($__internal_6fe2945a19037182b7cdbd7d2c52380e7f8f3bedb24ac77c0364a579042a9542_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_6fe2945a19037182b7cdbd7d2c52380e7f8f3bedb24ac77c0364a579042a9542->leave($__internal_6fe2945a19037182b7cdbd7d2c52380e7f8f3bedb24ac77c0364a579042a9542_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_8583aae623c13b3def5829233e3f7cba71d5275d25f86aa4041060cfbaade8c7 = $this->env->getExtension("native_profiler");
        $__internal_8583aae623c13b3def5829233e3f7cba71d5275d25f86aa4041060cfbaade8c7->enter($__internal_8583aae623c13b3def5829233e3f7cba71d5275d25f86aa4041060cfbaade8c7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_8583aae623c13b3def5829233e3f7cba71d5275d25f86aa4041060cfbaade8c7->leave($__internal_8583aae623c13b3def5829233e3f7cba71d5275d25f86aa4041060cfbaade8c7_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_9a4a1b6cd30417e1cc79094451fd39e7e001b529fa06d78a41d778942e9a7960 = $this->env->getExtension("native_profiler");
        $__internal_9a4a1b6cd30417e1cc79094451fd39e7e001b529fa06d78a41d778942e9a7960->enter($__internal_9a4a1b6cd30417e1cc79094451fd39e7e001b529fa06d78a41d778942e9a7960_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_9a4a1b6cd30417e1cc79094451fd39e7e001b529fa06d78a41d778942e9a7960->leave($__internal_9a4a1b6cd30417e1cc79094451fd39e7e001b529fa06d78a41d778942e9a7960_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
