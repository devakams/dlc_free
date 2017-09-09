<?php

/* base.html.twig */
class __TwigTemplate_7f2b336f11ea41d773741bf53ebd49068e5d6a3c0b4d58f55d79d72a70d3cbd4 extends Twig_Template
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
        $__internal_c61d26c458f98dcaa6ae2dbfcbd7d30a8394ef445da8de22eb759a71bb73625d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c61d26c458f98dcaa6ae2dbfcbd7d30a8394ef445da8de22eb759a71bb73625d->enter($__internal_c61d26c458f98dcaa6ae2dbfcbd7d30a8394ef445da8de22eb759a71bb73625d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"description\" content=\"Promotion d'opportunités en Casamance\">
        <meta name=\"keywords\" content=\"Casamance, Senegal, hotels, restaurants, evasion, soleil\">
        <meta name=\"generator\" content=\"hosting-page-builder\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no\">
        <meta name=\"twitter:card\" content=\"summary\">
        <meta name=\"twitter:site\" content=\"@delacasamance\">
        <meta name=\"twitter:title\" content=\"Agriculture - Tourisme - Evénements\">
        <meta name=\"twitter:description\" content=\"Promotion d'opportunités en Casamance\">
        <meta name=\"og:url\" content=\"https://delacasamance.com/index.php\">
        <meta name=\"og:locale\" content=\"fr\">
        <meta name=\"og:type\" content=\"website\">

        <meta name=\"article:publisher\" content=\"delacasamance/?fref=ts\">

        <meta name=\"author\" value=\"abdoulaye KAMA\">

        <meta name=\"reply-to\" content=\"abdoulayekama@gmail.com\">
        <meta name=\"category\" content=\"internet\">
        <meta name=\"robots\" content=\"index, follow\">
        <meta name=\"distribution\" content=\"global\">

        <meta name=\"copyright\" content=\"Abdoulaye KAMA\">

        <title>";
        // line 28
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 29
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 30
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("apple-touch-icon-120x120.png"), "html", null, true);
        echo "\">
    </head>
    
    <body>
        ";
        // line 35
        $this->displayBlock('body', $context, $blocks);
        // line 36
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 37
        echo "    </body>
</html>
";
        
        $__internal_c61d26c458f98dcaa6ae2dbfcbd7d30a8394ef445da8de22eb759a71bb73625d->leave($__internal_c61d26c458f98dcaa6ae2dbfcbd7d30a8394ef445da8de22eb759a71bb73625d_prof);

    }

    // line 28
    public function block_title($context, array $blocks = array())
    {
        $__internal_a47fdb2e6a4efd2c1f93dd271ff61b214520107ceb51fd6a126185c18e6db492 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a47fdb2e6a4efd2c1f93dd271ff61b214520107ceb51fd6a126185c18e6db492->enter($__internal_a47fdb2e6a4efd2c1f93dd271ff61b214520107ceb51fd6a126185c18e6db492_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Agriculture - Tourisme - Evénements";
        
        $__internal_a47fdb2e6a4efd2c1f93dd271ff61b214520107ceb51fd6a126185c18e6db492->leave($__internal_a47fdb2e6a4efd2c1f93dd271ff61b214520107ceb51fd6a126185c18e6db492_prof);

    }

    // line 29
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_11f73f52ce8212c2f481d06331427e0bd1dcad8ac0ddbebbf9e738f06228fd9f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_11f73f52ce8212c2f481d06331427e0bd1dcad8ac0ddbebbf9e738f06228fd9f->enter($__internal_11f73f52ce8212c2f481d06331427e0bd1dcad8ac0ddbebbf9e738f06228fd9f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_11f73f52ce8212c2f481d06331427e0bd1dcad8ac0ddbebbf9e738f06228fd9f->leave($__internal_11f73f52ce8212c2f481d06331427e0bd1dcad8ac0ddbebbf9e738f06228fd9f_prof);

    }

    // line 35
    public function block_body($context, array $blocks = array())
    {
        $__internal_ac7c09e357bc51d0a2717987cfcf6d1d1338e8c129de1a025ea9f299b297c584 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ac7c09e357bc51d0a2717987cfcf6d1d1338e8c129de1a025ea9f299b297c584->enter($__internal_ac7c09e357bc51d0a2717987cfcf6d1d1338e8c129de1a025ea9f299b297c584_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_ac7c09e357bc51d0a2717987cfcf6d1d1338e8c129de1a025ea9f299b297c584->leave($__internal_ac7c09e357bc51d0a2717987cfcf6d1d1338e8c129de1a025ea9f299b297c584_prof);

    }

    // line 36
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_228158c5e55b46b7ccf96dc1c61e57e035d0018a8dea5c8b5806b75a5d3d0191 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_228158c5e55b46b7ccf96dc1c61e57e035d0018a8dea5c8b5806b75a5d3d0191->enter($__internal_228158c5e55b46b7ccf96dc1c61e57e035d0018a8dea5c8b5806b75a5d3d0191_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_228158c5e55b46b7ccf96dc1c61e57e035d0018a8dea5c8b5806b75a5d3d0191->leave($__internal_228158c5e55b46b7ccf96dc1c61e57e035d0018a8dea5c8b5806b75a5d3d0191_prof);

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
        return array (  121 => 36,  110 => 35,  99 => 29,  87 => 28,  78 => 37,  75 => 36,  73 => 35,  66 => 31,  61 => 30,  59 => 29,  55 => 28,  26 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"fr\">
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"description\" content=\"Promotion d'opportunités en Casamance\">
        <meta name=\"keywords\" content=\"Casamance, Senegal, hotels, restaurants, evasion, soleil\">
        <meta name=\"generator\" content=\"hosting-page-builder\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no\">
        <meta name=\"twitter:card\" content=\"summary\">
        <meta name=\"twitter:site\" content=\"@delacasamance\">
        <meta name=\"twitter:title\" content=\"Agriculture - Tourisme - Evénements\">
        <meta name=\"twitter:description\" content=\"Promotion d'opportunités en Casamance\">
        <meta name=\"og:url\" content=\"https://delacasamance.com/index.php\">
        <meta name=\"og:locale\" content=\"fr\">
        <meta name=\"og:type\" content=\"website\">

        <meta name=\"article:publisher\" content=\"delacasamance/?fref=ts\">

        <meta name=\"author\" value=\"abdoulaye KAMA\">

        <meta name=\"reply-to\" content=\"abdoulayekama@gmail.com\">
        <meta name=\"category\" content=\"internet\">
        <meta name=\"robots\" content=\"index, follow\">
        <meta name=\"distribution\" content=\"global\">

        <meta name=\"copyright\" content=\"Abdoulaye KAMA\">

        <title>{% block title %}Agriculture - Tourisme - Evénements{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
        <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"{{ asset('apple-touch-icon-120x120.png') }}\">
    </head>
    
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "base.html.twig", "/home/abdoulaye/workspace/freelance/delacasamance/webapp/app/Resources/views/base.html.twig");
    }
}
