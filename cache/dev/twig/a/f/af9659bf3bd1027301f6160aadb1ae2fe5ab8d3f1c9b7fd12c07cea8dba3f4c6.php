<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_0e4563a133cf9ae261490c5a1d781c293f4423be4d69f0a99c9f3c5a223f1d5a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_84a295ce1149fc2d6dc01e01d893e10478ec442f13a76b426ef8ee306dd4eaef = $this->env->getExtension("native_profiler");
        $__internal_84a295ce1149fc2d6dc01e01d893e10478ec442f13a76b426ef8ee306dd4eaef->enter($__internal_84a295ce1149fc2d6dc01e01d893e10478ec442f13a76b426ef8ee306dd4eaef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_84a295ce1149fc2d6dc01e01d893e10478ec442f13a76b426ef8ee306dd4eaef->leave($__internal_84a295ce1149fc2d6dc01e01d893e10478ec442f13a76b426ef8ee306dd4eaef_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_2ebe8f95dd77b251436cf8db6da81ceac01260bdb6192812ba517af4a195fadd = $this->env->getExtension("native_profiler");
        $__internal_2ebe8f95dd77b251436cf8db6da81ceac01260bdb6192812ba517af4a195fadd->enter($__internal_2ebe8f95dd77b251436cf8db6da81ceac01260bdb6192812ba517af4a195fadd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_2ebe8f95dd77b251436cf8db6da81ceac01260bdb6192812ba517af4a195fadd->leave($__internal_2ebe8f95dd77b251436cf8db6da81ceac01260bdb6192812ba517af4a195fadd_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_daf0d073513511b46c94c85cce2f768471e41f06f939fb2b8998909db031c03e = $this->env->getExtension("native_profiler");
        $__internal_daf0d073513511b46c94c85cce2f768471e41f06f939fb2b8998909db031c03e->enter($__internal_daf0d073513511b46c94c85cce2f768471e41f06f939fb2b8998909db031c03e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_daf0d073513511b46c94c85cce2f768471e41f06f939fb2b8998909db031c03e->leave($__internal_daf0d073513511b46c94c85cce2f768471e41f06f939fb2b8998909db031c03e_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_3486572c709365ae15509c9491df690e96d56294010104f206e7f6ee935c619d = $this->env->getExtension("native_profiler");
        $__internal_3486572c709365ae15509c9491df690e96d56294010104f206e7f6ee935c619d->enter($__internal_3486572c709365ae15509c9491df690e96d56294010104f206e7f6ee935c619d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_3486572c709365ae15509c9491df690e96d56294010104f206e7f6ee935c619d->leave($__internal_3486572c709365ae15509c9491df690e96d56294010104f206e7f6ee935c619d_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
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
/* {% extends 'TwigBundle::layout.html.twig' %}*/
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
/*     {% include 'TwigBundle:Exception:exception.html.twig' %}*/
/* {% endblock %}*/
/* */
