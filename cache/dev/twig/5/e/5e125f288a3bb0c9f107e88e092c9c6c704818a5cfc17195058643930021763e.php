<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_14c44252fd832aaea73c2d90b6230d7c5556d32e90ec86b2e77ff6734e92cb40 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("MiniCoreBundle:Security:layout.html.twig", "FOSUserBundle:Security:login.html.twig", 2);
        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MiniCoreBundle:Security:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_fe497777eeba38890cf0b3669ef3c6d593636be8b1310add5a215cfc7540c1f3 = $this->env->getExtension("native_profiler");
        $__internal_fe497777eeba38890cf0b3669ef3c6d593636be8b1310add5a215cfc7540c1f3->enter($__internal_fe497777eeba38890cf0b3669ef3c6d593636be8b1310add5a215cfc7540c1f3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Security:login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_fe497777eeba38890cf0b3669ef3c6d593636be8b1310add5a215cfc7540c1f3->leave($__internal_fe497777eeba38890cf0b3669ef3c6d593636be8b1310add5a215cfc7540c1f3_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_cdeb08e74ce75efa11a724ea0581ff8bd7bb00bc009ef895ddd26aa837f051f7 = $this->env->getExtension("native_profiler");
        $__internal_cdeb08e74ce75efa11a724ea0581ff8bd7bb00bc009ef895ddd26aa837f051f7->enter($__internal_cdeb08e74ce75efa11a724ea0581ff8bd7bb00bc009ef895ddd26aa837f051f7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        echo "    <form class=\"form-login\" action=\"";
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\">
        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\"/>

        ";
        // line 7
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 8
            echo "            <div class=\"alert alert-error\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                <i class=\"icon-warning-sign\"></i> ";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array()), "security"), "html", null, true);
            echo "
            </div>
        ";
        }
        // line 13
        echo "
        <div class=\"form-group\">
            <label for=\"username\">";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
            <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" required=\"required\"
                   class=\"form-control input-sm bounceIn animation-delay2\"/>
        </div>

        <div class=\"form-group\">
            <label for=\"password\">";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
            <input type=\"password\" id=\"password\" name=\"_password\" required=\"required\"
                   class=\"form-control input-sm bounceIn animation-delay4\"/>
        </div>

        <hr/>
        <div>
            <button class=\"btn btn-success btn-sm bounceIn animation-delay5 pull-right\"
                    type=\"submit\">";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo " <i
                        class=\"icon-signin\"></i></button>
        </div>
    </form>
";
        
        $__internal_cdeb08e74ce75efa11a724ea0581ff8bd7bb00bc009ef895ddd26aa837f051f7->leave($__internal_cdeb08e74ce75efa11a724ea0581ff8bd7bb00bc009ef895ddd26aa837f051f7_prof);

    }

    // line 35
    public function block_footer($context, array $blocks = array())
    {
        $__internal_39927d9e79fcfc6a1b4ca62ed5bf92b9c1045610e74c57c9d28cea7eee2db9a6 = $this->env->getExtension("native_profiler");
        $__internal_39927d9e79fcfc6a1b4ca62ed5bf92b9c1045610e74c57c9d28cea7eee2db9a6->enter($__internal_39927d9e79fcfc6a1b4ca62ed5bf92b9c1045610e74c57c9d28cea7eee2db9a6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        
        $__internal_39927d9e79fcfc6a1b4ca62ed5bf92b9c1045610e74c57c9d28cea7eee2db9a6->leave($__internal_39927d9e79fcfc6a1b4ca62ed5bf92b9c1045610e74c57c9d28cea7eee2db9a6_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 35,  90 => 29,  79 => 21,  71 => 16,  67 => 15,  63 => 13,  57 => 10,  53 => 8,  51 => 7,  46 => 5,  41 => 4,  35 => 3,  11 => 2,);
    }
}
/* {% trans_default_domain 'FOSUserBundle' %}*/
/* {% extends "MiniCoreBundle:Security:layout.html.twig" %}*/
/* {% block fos_user_content %}*/
/*     <form class="form-login" action="{{ path("fos_user_security_check") }}" method="post">*/
/*         <input type="hidden" name="_csrf_token" value="{{ csrf_token }}"/>*/
/* */
/*         {% if error %}*/
/*             <div class="alert alert-error">*/
/*                 <button type="button" class="close" data-dismiss="alert">×</button>*/
/*                 <i class="icon-warning-sign"></i> {{ error.messageKey|trans(error.messageData, 'security') }}*/
/*             </div>*/
/*         {% endif %}*/
/* */
/*         <div class="form-group">*/
/*             <label for="username">{{ 'security.login.username'|trans }}</label>*/
/*             <input type="text" id="username" name="_username" value="{{ last_username }}" required="required"*/
/*                    class="form-control input-sm bounceIn animation-delay2"/>*/
/*         </div>*/
/* */
/*         <div class="form-group">*/
/*             <label for="password">{{ 'security.login.password'|trans }}</label>*/
/*             <input type="password" id="password" name="_password" required="required"*/
/*                    class="form-control input-sm bounceIn animation-delay4"/>*/
/*         </div>*/
/* */
/*         <hr/>*/
/*         <div>*/
/*             <button class="btn btn-success btn-sm bounceIn animation-delay5 pull-right"*/
/*                     type="submit">{{ 'security.login.submit'|trans }} <i*/
/*                         class="icon-signin"></i></button>*/
/*         </div>*/
/*     </form>*/
/* {% endblock fos_user_content %}*/
/* */
/* {% block footer %}*/
/* {% endblock footer %}*/
