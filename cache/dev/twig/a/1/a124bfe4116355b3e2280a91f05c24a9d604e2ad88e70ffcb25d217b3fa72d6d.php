<?php

/* MiniWebBundle:Admin/Main:userList.html.twig */
class __TwigTemplate_e9b36af3ea04778e15b987da9f373070bdb03147d01a89ca74a6fafddb8c60c6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_216ae7d4ea95cf13c2388a2693f42397be31135ccf9f59fe54dee4200a392469 = $this->env->getExtension("native_profiler");
        $__internal_216ae7d4ea95cf13c2388a2693f42397be31135ccf9f59fe54dee4200a392469->enter($__internal_216ae7d4ea95cf13c2388a2693f42397be31135ccf9f59fe54dee4200a392469_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MiniWebBundle:Admin/Main:userList.html.twig"));

        // line 1
        echo "<div class=\"panel panel-default\">
    <div class=\"panel-heading\">
        <h4 class=\"panel-title\">
            ";
        // line 5
        echo "                <a href=\"";
        echo $this->env->getExtension('routing')->getPath("mini_admin_user_report");
        echo "\"
                   class=\"pull-right btn btn-default btn-xs\"><i class=\"fa fa-download\"></i>&nbsp; отчет</a>
            ";
        // line 8
        echo "        </h4>
    </div>
    ";
        // line 11
        echo "        <div class=\"panel-body\">
            <table class=\"table table-bordered table-condensed table-hover table-striped\" id=\"dataTable\">
                <thead>
                <tr>
                    ";
        // line 16
        echo "                    <th>Reg. time</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Referred by</th>
                    <th>Account used for log in</th>
                    ";
        // line 22
        echo "                    ";
        // line 23
        echo "                    <th>Phone</th>
                    <th>E-mail</th>
                    <th>Match criteria</th>
                    <th>Status</th>
                    <th>Type of Recruitment</th>
                    <th>Registered in program</th>
                    <th>Type of Survey</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : $this->getContext($context, "users")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 34
            echo "                    ";
            // line 35
            echo "                    <tr id=\"directory-item-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
            echo "\">
                        ";
            // line 36
            $this->loadTemplate("MiniWebBundle:Admin/Main:userItem.html.twig", "MiniWebBundle:Admin/Main:userList.html.twig", 36)->display($context);
            // line 37
            echo "                    </tr>
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                </tbody>
            </table>
        </div>
    ";
        // line 43
        echo "</div>
";
        
        $__internal_216ae7d4ea95cf13c2388a2693f42397be31135ccf9f59fe54dee4200a392469->leave($__internal_216ae7d4ea95cf13c2388a2693f42397be31135ccf9f59fe54dee4200a392469_prof);

    }

    public function getTemplateName()
    {
        return "MiniWebBundle:Admin/Main:userList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 43,  105 => 39,  90 => 37,  88 => 36,  83 => 35,  81 => 34,  64 => 33,  52 => 23,  50 => 22,  43 => 16,  37 => 11,  33 => 8,  27 => 5,  22 => 1,);
    }
}
/* <div class="panel panel-default">*/
/*     <div class="panel-heading">*/
/*         <h4 class="panel-title">*/
/*             {#{% if is_granted('ROLE_VIEW_REPORT') %}#}*/
/*                 <a href="{{ path("mini_admin_user_report") }}"*/
/*                    class="pull-right btn btn-default btn-xs"><i class="fa fa-download"></i>&nbsp; отчет</a>*/
/*             {#{% endif %}#}*/
/*         </h4>*/
/*     </div>*/
/*     {#<div id="faqBasic" class="panel-collapse collapse" style="height: 0px;">#}*/
/*         <div class="panel-body">*/
/*             <table class="table table-bordered table-condensed table-hover table-striped" id="dataTable">*/
/*                 <thead>*/
/*                 <tr>*/
/*                     {#<th width="50">Comes from</th>#}*/
/*                     <th>Reg. time</th>*/
/*                     <th>Name</th>*/
/*                     <th>Surname</th>*/
/*                     <th>Referred by</th>*/
/*                     <th>Account used for log in</th>*/
/*                     {#<th>Question 1</th>#}*/
/*                     {#<th>Question 2</th>#}*/
/*                     <th>Phone</th>*/
/*                     <th>E-mail</th>*/
/*                     <th>Match criteria</th>*/
/*                     <th>Status</th>*/
/*                     <th>Type of Recruitment</th>*/
/*                     <th>Registered in program</th>*/
/*                     <th>Type of Survey</th>*/
/*                 </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                 {% for user in users %}*/
/*                     {#{% set attachments = getUserEventAttachments(userEvent) %}#}*/
/*                     <tr id="directory-item-{{ user.id }}">*/
/*                         {% include "MiniWebBundle:Admin/Main:userItem.html.twig" %}*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*                 </tbody>*/
/*             </table>*/
/*         </div>*/
/*     {#</div>#}*/
/* </div>*/
/* */
