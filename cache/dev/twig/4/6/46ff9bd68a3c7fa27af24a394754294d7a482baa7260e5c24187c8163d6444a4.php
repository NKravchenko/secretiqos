<?php

/* MiniWebBundle:Admin:head.html.twig */
class __TwigTemplate_24d3a7e695fca76984ab0a9fa461ed2be3a12f5c1e5a6a0b9b2f42969b711d60 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c9b4585626c9192e12d0672f551fe389c526ee0dde81fffeb5d5aba242805af5 = $this->env->getExtension("native_profiler");
        $__internal_c9b4585626c9192e12d0672f551fe389c526ee0dde81fffeb5d5aba242805af5->enter($__internal_c9b4585626c9192e12d0672f551fe389c526ee0dde81fffeb5d5aba242805af5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MiniWebBundle:Admin:head.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<!--[if lt IE 7]>
<html class=\"lt-ie9 lt-ie8 lt-ie7\" lang=\"en\"> <![endif]-->
<!--[if IE 7]>
<html class=\"lt-ie9 lt-ie8\" lang=\"en\"> <![endif]-->
<!--[if IE 8]>
<html class=\"lt-ie9\" lang=\"en\"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang=\"en\"><!--<![endif]-->
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <!-- Bootstrap core CSS -->
    <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Font Awesome -->
    <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Pace -->
    ";
        // line 25
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/css/pace_loading_bar.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Color box -->
    <link href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/css/colorbox/colorbox.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Morris -->
    <link href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/css/morris.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>

    <!-- Endless -->
    <link href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/css/endless.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/css/endless-skin.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Gritter -->
    <link href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/css/gritter/jquery.gritter.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">


    <link href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/css/common.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!--[if lt IE 9]>
      <!--<script type=\"text/javascript\" src=\"";
        // line 44
        echo "\"></script>-->
    <!--[endif]-->
    <title>IQOS - ";
        // line 46
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
";
        
        $__internal_c9b4585626c9192e12d0672f551fe389c526ee0dde81fffeb5d5aba242805af5->leave($__internal_c9b4585626c9192e12d0672f551fe389c526ee0dde81fffeb5d5aba242805af5_prof);

    }

    public function block_title($context, array $blocks = array())
    {
        $__internal_229480010f50bbcc8647133d0fb875599af1809b52548d4187960ecb17070f58 = $this->env->getExtension("native_profiler");
        $__internal_229480010f50bbcc8647133d0fb875599af1809b52548d4187960ecb17070f58->enter($__internal_229480010f50bbcc8647133d0fb875599af1809b52548d4187960ecb17070f58_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Панель управления";
        
        $__internal_229480010f50bbcc8647133d0fb875599af1809b52548d4187960ecb17070f58->leave($__internal_229480010f50bbcc8647133d0fb875599af1809b52548d4187960ecb17070f58_prof);

    }

    public function getTemplateName()
    {
        return "MiniWebBundle:Admin:head.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 46,  95 => 44,  89 => 41,  83 => 38,  77 => 35,  73 => 34,  67 => 31,  61 => 28,  54 => 25,  48 => 21,  42 => 18,  23 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <!--[if lt IE 7]>*/
/* <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->*/
/* <!--[if IE 7]>*/
/* <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->*/
/* <!--[if IE 8]>*/
/* <html class="lt-ie9" lang="en"> <![endif]-->*/
/* <!--[if gt IE 8]><!-->*/
/* <html lang="en"><!--<![endif]-->*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="utf-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta name="description" content="">*/
/*     <meta name="author" content="">*/
/* */
/*     <!-- Bootstrap core CSS -->*/
/*     <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">*/
/* */
/*     <!-- Font Awesome -->*/
/*     <link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet">*/
/* */
/*     <!-- Pace -->*/
/*     {#<link href="{{ asset('css/pace.css') }}" rel="stylesheet">#}*/
/*     <link href="{{ asset('admin/css/pace_loading_bar.css') }}" rel="stylesheet">*/
/* */
/*     <!-- Color box -->*/
/*     <link href="{{ asset('admin/css/colorbox/colorbox.css') }}" rel="stylesheet">*/
/* */
/*     <!-- Morris -->*/
/*     <link href="{{ asset('admin/css/morris.css') }}" rel="stylesheet"/>*/
/* */
/*     <!-- Endless -->*/
/*     <link href="{{ asset('admin/css/endless.min.css') }}" rel="stylesheet">*/
/*     <link href="{{ asset('admin/css/endless-skin.css') }}" rel="stylesheet">*/
/* */
/*     <!-- Gritter -->*/
/*     <link href="{{ asset('admin/css/gritter/jquery.gritter.css') }}" rel="stylesheet">*/
/* */
/* */
/*     <link href="{{ asset('admin/css/common.css') }}" rel="stylesheet">*/
/* */
/*     <!--[if lt IE 9]>*/
/*       <!--<script type="text/javascript" src="{# { asset('plugins/flot/excanvas.min.js') } #}"></script>-->*/
/*     <!--[endif]-->*/
/*     <title>IQOS - {% block title %}Панель управления{% endblock %}</title>*/
/* </head>*/
/* */
