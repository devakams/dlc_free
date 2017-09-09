<?php

/* default/index.html.twig */
class __TwigTemplate_61a3070575e7f11c9f950ae3c49d6b6bbff51b64da517247b74bfe3cff52e47a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "default/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_cfbcfcffe67360923f9930980b20028216042de919feb98a8556642f2fdd1927 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cfbcfcffe67360923f9930980b20028216042de919feb98a8556642f2fdd1927->enter($__internal_cfbcfcffe67360923f9930980b20028216042de919feb98a8556642f2fdd1927_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "default/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_cfbcfcffe67360923f9930980b20028216042de919feb98a8556642f2fdd1927->leave($__internal_cfbcfcffe67360923f9930980b20028216042de919feb98a8556642f2fdd1927_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_96b8d84fd5e9605ba98f8b97a48eda41d1d0a58f11bc40353d8ba81e135bb1dc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_96b8d84fd5e9605ba98f8b97a48eda41d1d0a58f11bc40353d8ba81e135bb1dc->enter($__internal_96b8d84fd5e9605ba98f8b97a48eda41d1d0a58f11bc40353d8ba81e135bb1dc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "\t
";
        
        $__internal_96b8d84fd5e9605ba98f8b97a48eda41d1d0a58f11bc40353d8ba81e135bb1dc->leave($__internal_96b8d84fd5e9605ba98f8b97a48eda41d1d0a58f11bc40353d8ba81e135bb1dc_prof);

    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_2af54143cb0eab022c3857a78825cbf5db8df28bd63228889f7510409d76a315 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2af54143cb0eab022c3857a78825cbf5db8df28bd63228889f7510409d76a315->enter($__internal_2af54143cb0eab022c3857a78825cbf5db8df28bd63228889f7510409d76a315_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 8
        echo "
";
        
        $__internal_2af54143cb0eab022c3857a78825cbf5db8df28bd63228889f7510409d76a315->leave($__internal_2af54143cb0eab022c3857a78825cbf5db8df28bd63228889f7510409d76a315_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_6d6b2f34f170801e9fe7d0a75adbdfa5324d511d5280c01e6a14d905a6c63d21 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6d6b2f34f170801e9fe7d0a75adbdfa5324d511d5280c01e6a14d905a6c63d21->enter($__internal_6d6b2f34f170801e9fe7d0a75adbdfa5324d511d5280c01e6a14d905a6c63d21_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 12
        echo "
";
        
        $__internal_6d6b2f34f170801e9fe7d0a75adbdfa5324d511d5280c01e6a14d905a6c63d21->leave($__internal_6d6b2f34f170801e9fe7d0a75adbdfa5324d511d5280c01e6a14d905a6c63d21_prof);

    }

    public function getTemplateName()
    {
        return "default/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 12,  64 => 11,  56 => 8,  50 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.html.twig\" %}

{% block body %}
\t
{% endblock %}

{% block stylesheets %}

{% endblock %}

{% block javascripts %}

{% endblock %}", "default/index.html.twig", "/home/abdoulaye/workspace/freelance/delacasamance/webapp/app/Resources/views/default/index.html.twig");
    }
}
