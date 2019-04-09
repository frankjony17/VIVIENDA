<?php

/* ::base.html.twig */
class __TwigTemplate_52a31ff79160dd11e0ea7a0415eaca4ece11097d6d2104077132435deec03250 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b150b3888efb8f0720880a3a538187cca2119499a8bb8cedcca1ad336ddef76f = $this->env->getExtension("native_profiler");
        $__internal_b150b3888efb8f0720880a3a538187cca2119499a8bb8cedcca1ad336ddef76f->enter($__internal_b150b3888efb8f0720880a3a538187cca2119499a8bb8cedcca1ad336ddef76f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

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
        echo "    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    ";
        // line 9
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/ext-6.0.1/theme-triton/theme-triton-all.css"), "html", null, true);
        echo "\" />

    <script type=\"text/javascript\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/ext-6.0.1/ext-all.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/ext-6.0.1/theme-triton/theme-triton.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/ext-6.0.1/locale-es.js"), "html", null, true);
        echo "\"></script>

    ";
        // line 15
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 16
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 17
        echo "</head>
</html>
";
        
        $__internal_b150b3888efb8f0720880a3a538187cca2119499a8bb8cedcca1ad336ddef76f->leave($__internal_b150b3888efb8f0720880a3a538187cca2119499a8bb8cedcca1ad336ddef76f_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_4ee478ab08c94c891d67a78e6bccd2e9a0d3f89320c30b4d5fac2bad404ea598 = $this->env->getExtension("native_profiler");
        $__internal_4ee478ab08c94c891d67a78e6bccd2e9a0d3f89320c30b4d5fac2bad404ea598->enter($__internal_4ee478ab08c94c891d67a78e6bccd2e9a0d3f89320c30b4d5fac2bad404ea598_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_4ee478ab08c94c891d67a78e6bccd2e9a0d3f89320c30b4d5fac2bad404ea598->leave($__internal_4ee478ab08c94c891d67a78e6bccd2e9a0d3f89320c30b4d5fac2bad404ea598_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_a389de517da52354e3cdc7f116452bf4c034fed06697843588d8257258533142 = $this->env->getExtension("native_profiler");
        $__internal_a389de517da52354e3cdc7f116452bf4c034fed06697843588d8257258533142->enter($__internal_a389de517da52354e3cdc7f116452bf4c034fed06697843588d8257258533142_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_a389de517da52354e3cdc7f116452bf4c034fed06697843588d8257258533142->leave($__internal_a389de517da52354e3cdc7f116452bf4c034fed06697843588d8257258533142_prof);

    }

    // line 15
    public function block_stylesheet($context, array $blocks = array())
    {
        $__internal_26c06cd83a996b8229c6196f3f883dd4d7efbc51f282fd5cd1c976bd5a4b59fc = $this->env->getExtension("native_profiler");
        $__internal_26c06cd83a996b8229c6196f3f883dd4d7efbc51f282fd5cd1c976bd5a4b59fc->enter($__internal_26c06cd83a996b8229c6196f3f883dd4d7efbc51f282fd5cd1c976bd5a4b59fc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheet"));

        
        $__internal_26c06cd83a996b8229c6196f3f883dd4d7efbc51f282fd5cd1c976bd5a4b59fc->leave($__internal_26c06cd83a996b8229c6196f3f883dd4d7efbc51f282fd5cd1c976bd5a4b59fc_prof);

    }

    // line 16
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_737d2d5df666cbb3d79319f37fef4ef3f959b0e75f8051910aeac438be14ab66 = $this->env->getExtension("native_profiler");
        $__internal_737d2d5df666cbb3d79319f37fef4ef3f959b0e75f8051910aeac438be14ab66->enter($__internal_737d2d5df666cbb3d79319f37fef4ef3f959b0e75f8051910aeac438be14ab66_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_737d2d5df666cbb3d79319f37fef4ef3f959b0e75f8051910aeac438be14ab66->leave($__internal_737d2d5df666cbb3d79319f37fef4ef3f959b0e75f8051910aeac438be14ab66_prof);

    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 16,  98 => 15,  87 => 6,  76 => 5,  67 => 17,  64 => 16,  62 => 15,  57 => 13,  53 => 12,  49 => 11,  43 => 9,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="UTF-8" />*/
/*     <title>{% block title %}{% endblock %}</title>*/
/*     {% block stylesheets %}{% endblock %}*/
/*     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     {#Mi Extjs File#}*/
/*     <link rel="stylesheet" type="text/css" href="{{ asset('js/ext-6.0.1/theme-triton/theme-triton-all.css') }}" />*/
/* */
/*     <script type="text/javascript" src="{{ asset('js/ext-6.0.1/ext-all.js') }}"></script>*/
/*     <script type="text/javascript" src="{{ asset('js/ext-6.0.1/theme-triton/theme-triton.js') }}"></script>*/
/*     <script type="text/javascript" src="{{ asset('js/ext-6.0.1/locale-es.js') }}"></script>*/
/* */
/*     {% block stylesheet %}{% endblock %}*/
/*     {% block javascripts %}{% endblock %}*/
/* </head>*/
/* </html>*/
/* */
