<?php

/* MiniWebBundle:Admin/Main:index.html.twig */
class __TwigTemplate_f01b68e2d712b8bda17238881511c28b4ad9d61ecafeeb01b0ac9508d5edb5bf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("MiniWebBundle:Admin:layout.html.twig", "MiniWebBundle:Admin/Main:index.html.twig", 1);
        $this->blocks = array(
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MiniWebBundle:Admin:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_6d681a8ee3284146b551fde553fc8a6a8061a4bbb17948ffc4ac8bbb39f7551e = $this->env->getExtension("native_profiler");
        $__internal_6d681a8ee3284146b551fde553fc8a6a8061a4bbb17948ffc4ac8bbb39f7551e->enter($__internal_6d681a8ee3284146b551fde553fc8a6a8061a4bbb17948ffc4ac8bbb39f7551e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MiniWebBundle:Admin/Main:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6d681a8ee3284146b551fde553fc8a6a8061a4bbb17948ffc4ac8bbb39f7551e->leave($__internal_6d681a8ee3284146b551fde553fc8a6a8061a4bbb17948ffc4ac8bbb39f7551e_prof);

    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        $__internal_0ccc52a65c1317aa37bf6e173250a75827d3419dd63d11eaf71a5d504fa0a907 = $this->env->getExtension("native_profiler");
        $__internal_0ccc52a65c1317aa37bf6e173250a75827d3419dd63d11eaf71a5d504fa0a907->enter($__internal_0ccc52a65c1317aa37bf6e173250a75827d3419dd63d11eaf71a5d504fa0a907_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "container"));

        // line 4
        echo "    <div class=\"col-md-11\">
        <h3 class=\"headline m-top-md\">
            IQOS Manager
            <span class=\"line\"></span>
        </h3>

        ";
        // line 11
        echo "        ";
        // line 12
        echo "        ";
        // line 13
        echo "
        <div class=\"padding-md\">
            <div class=\"tab-content\">
                <div class=\"tab-pane fade in active\" id=\"basic\">
                    ";
        // line 17
        if ((twig_length_filter($this->env, (isset($context["users"]) ? $context["users"] : $this->getContext($context, "users"))) > 0)) {
            // line 18
            echo "                        <div class=\"panel-group\" id=\"FaqBasic\">
                            ";
            // line 19
            $this->loadTemplate("MiniWebBundle:Admin/Main:userList.html.twig", "MiniWebBundle:Admin/Main:index.html.twig", 19)->display($context);
            // line 20
            echo "                        </div>
                    ";
        } else {
            // line 22
            echo "                        <div class=\"alert alert-warning\">
                            <i class=\"fa fa-warning fa-lg\"></i> Пользователи не найдены
                        </div>
                    ";
        }
        // line 26
        echo "                    <!-- /panel -->
                </div>
            </div>
            <!-- /tab-pane -->
        </div>
        <!-- /tab-content -->
    </div>
";
        
        $__internal_0ccc52a65c1317aa37bf6e173250a75827d3419dd63d11eaf71a5d504fa0a907->leave($__internal_0ccc52a65c1317aa37bf6e173250a75827d3419dd63d11eaf71a5d504fa0a907_prof);

    }

    public function getTemplateName()
    {
        return "MiniWebBundle:Admin/Main:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 26,  69 => 22,  65 => 20,  63 => 19,  60 => 18,  58 => 17,  52 => 13,  50 => 12,  48 => 11,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends "MiniWebBundle:Admin:layout.html.twig" %}*/
/* */
/* {% block container %}*/
/*     <div class="col-md-11">*/
/*         <h3 class="headline m-top-md">*/
/*             IQOS Manager*/
/*             <span class="line"></span>*/
/*         </h3>*/
/* */
/*         {#{% for event in events %}#}*/
/*         {#<span class="btn btn-default btn-xs" data-tab-id="{{ event.id }}" id="btn-tab-control">{{ event.id }}</span>#}*/
/*         {#{% endfor %}#}*/
/* */
/*         <div class="padding-md">*/
/*             <div class="tab-content">*/
/*                 <div class="tab-pane fade in active" id="basic">*/
/*                     {% if users|length > 0 %}*/
/*                         <div class="panel-group" id="FaqBasic">*/
/*                             {% include "MiniWebBundle:Admin/Main:userList.html.twig" %}*/
/*                         </div>*/
/*                     {% else %}*/
/*                         <div class="alert alert-warning">*/
/*                             <i class="fa fa-warning fa-lg"></i> Пользователи не найдены*/
/*                         </div>*/
/*                     {% endif %}*/
/*                     <!-- /panel -->*/
/*                 </div>*/
/*             </div>*/
/*             <!-- /tab-pane -->*/
/*         </div>*/
/*         <!-- /tab-content -->*/
/*     </div>*/
/* {% endblock container %}*/
