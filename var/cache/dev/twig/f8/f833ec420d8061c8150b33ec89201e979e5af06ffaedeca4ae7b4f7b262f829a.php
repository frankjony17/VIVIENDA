<?php

/* QuejasBundle:Despacho:index.html.twig */
class __TwigTemplate_f8a3016bbfb1065e3e2679a82e5dc1c0d669f5a51f3943c6d10d623713bcd076 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("::base.html.twig", "QuejasBundle:Despacho:index.html.twig", 2);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'favicon' => array($this, 'block_favicon'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5fda021d93ed3a91f021ad77cc288c687a71a2f4aca566641bbca2a8ff65a75d = $this->env->getExtension("native_profiler");
        $__internal_5fda021d93ed3a91f021ad77cc288c687a71a2f4aca566641bbca2a8ff65a75d->enter($__internal_5fda021d93ed3a91f021ad77cc288c687a71a2f4aca566641bbca2a8ff65a75d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "QuejasBundle:Despacho:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5fda021d93ed3a91f021ad77cc288c687a71a2f4aca566641bbca2a8ff65a75d->leave($__internal_5fda021d93ed3a91f021ad77cc288c687a71a2f4aca566641bbca2a8ff65a75d_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_fbd7b5bd71b9fd38a67b66375382410b2348b13a6a76fbca04580d322dbf718a = $this->env->getExtension("native_profiler");
        $__internal_fbd7b5bd71b9fd38a67b66375382410b2348b13a6a76fbca04580d322dbf718a->enter($__internal_fbd7b5bd71b9fd38a67b66375382410b2348b13a6a76fbca04580d322dbf718a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "DESPACHO-VIVIENDA";
        
        $__internal_fbd7b5bd71b9fd38a67b66375382410b2348b13a6a76fbca04580d322dbf718a->leave($__internal_fbd7b5bd71b9fd38a67b66375382410b2348b13a6a76fbca04580d322dbf718a_prof);

    }

    // line 6
    public function block_favicon($context, array $blocks = array())
    {
        $__internal_60486e682750f40eaffc56ded5a59d9ff685a65bd051304fded3291a5da128e8 = $this->env->getExtension("native_profiler");
        $__internal_60486e682750f40eaffc56ded5a59d9ff685a65bd051304fded3291a5da128e8->enter($__internal_60486e682750f40eaffc56ded5a59d9ff685a65bd051304fded3291a5da128e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "favicon"));

        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        
        $__internal_60486e682750f40eaffc56ded5a59d9ff685a65bd051304fded3291a5da128e8->leave($__internal_60486e682750f40eaffc56ded5a59d9ff685a65bd051304fded3291a5da128e8_prof);

    }

    // line 8
    public function block_stylesheet($context, array $blocks = array())
    {
        $__internal_c760d15c5ad2ef4d700cbe10ae5652ace4e52278a7ca845ea8a53768a90e6374 = $this->env->getExtension("native_profiler");
        $__internal_c760d15c5ad2ef4d700cbe10ae5652ace4e52278a7ca845ea8a53768a90e6374->enter($__internal_c760d15c5ad2ef4d700cbe10ae5652ace4e52278a7ca845ea8a53768a90e6374_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheet"));

        // line 9
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/entrevista/index.css"), "html", null, true);
        echo "\" />
";
        
        $__internal_c760d15c5ad2ef4d700cbe10ae5652ace4e52278a7ca845ea8a53768a90e6374->leave($__internal_c760d15c5ad2ef4d700cbe10ae5652ace4e52278a7ca845ea8a53768a90e6374_prof);

    }

    // line 12
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_3838986ccdc4e99e70efefed1aae8fb351085e1d7ecd8c8ca9ba1d8c3f3c7475 = $this->env->getExtension("native_profiler");
        $__internal_3838986ccdc4e99e70efefed1aae8fb351085e1d7ecd8c8ca9ba1d8c3f3c7475->enter($__internal_3838986ccdc4e99e70efefed1aae8fb351085e1d7ecd8c8ca9ba1d8c3f3c7475_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 13
        echo "    <script>
        ";
        // line 15
        echo "        Ext.application({
            name: 'VIV',
            appFolder: '/js/app',
            controllers: [
                \"despacho.DespachoController\"
            ],
            launch: function(){
                Ext.create('VIV.view.DespachoViewport');
            }
        });
    </script>
";
        
        $__internal_3838986ccdc4e99e70efefed1aae8fb351085e1d7ecd8c8ca9ba1d8c3f3c7475->leave($__internal_3838986ccdc4e99e70efefed1aae8fb351085e1d7ecd8c8ca9ba1d8c3f3c7475_prof);

    }

    public function getTemplateName()
    {
        return "QuejasBundle:Despacho:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 15,  83 => 13,  77 => 12,  67 => 9,  61 => 8,  49 => 6,  37 => 4,  11 => 2,);
    }
}
/* */
/* {% extends "::base.html.twig" %}*/
/* */
/* {% block title %}DESPACHO-VIVIENDA{% endblock %}*/
/* */
/* {% block favicon %}{{ asset('favicon.ico') }}{% endblock %}*/
/* */
/* {% block stylesheet %}*/
/*     <link rel="stylesheet" type="text/css" href="{{ asset('css/entrevista/index.css') }}" />*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     <script>*/
/*         {#{% include "AdminBundle:Admin:globalScript.html.twig" %}#}*/
/*         Ext.application({*/
/*             name: 'VIV',*/
/*             appFolder: '/js/app',*/
/*             controllers: [*/
/*                 "despacho.DespachoController"*/
/*             ],*/
/*             launch: function(){*/
/*                 Ext.create('VIV.view.DespachoViewport');*/
/*             }*/
/*         });*/
/*     </script>*/
/* {% endblock %}*/
