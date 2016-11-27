<?php

/* MiniWebBundle:Admin/Main:userItem.html.twig */
class __TwigTemplate_020b0109e9da0b036ef757110f44b294796c375ca97eab4808e72ad2917f2b54 extends Twig_Template
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
        $__internal_ac8093313a2019dd17155cce92cbd219dc335c9e1ea3b368266d16064a9f4608 = $this->env->getExtension("native_profiler");
        $__internal_ac8093313a2019dd17155cce92cbd219dc335c9e1ea3b368266d16064a9f4608->enter($__internal_ac8093313a2019dd17155cce92cbd219dc335c9e1ea3b368266d16064a9f4608_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MiniWebBundle:Admin/Main:userItem.html.twig"));

        // line 1
        $context["refList"] = $this->env->getExtension('commonHelper')->getEnumReadableMap("AgencyType");
        // line 3
        echo "    ";
        // line 5
        echo "    ";
        // line 7
        echo "<td><nobr>";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "createdAt", array()), "Y-m-d"), "html", null, true);
        echo "</nobr></td>
<td>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "firstName", array()), "html", null, true);
        echo "</td>
<td>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "surnameName", array()), "html", null, true);
        echo "</td>
<td>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "referrerFirstName", array()), "html", null, true);
        echo "</td>
<td>
    <ul>
        ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getSocialprofiles", array(), "method"));
        foreach ($context['_seq'] as $context["sm"] => $context["smProfile"]) {
            // line 14
            echo "            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('commonHelper')->getSmProfileUrl($context["sm"], $context["smProfile"]), "html", null, true);
            echo "\" target=\"_blank\" title=\"";
            echo twig_escape_filter($this->env, $context["smProfile"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["sm"], "html", null, true);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['sm'], $context['smProfile'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "    </ul>
</td>
";
        // line 20
        echo "    ";
        // line 21
        echo "        ";
        // line 22
        echo "    ";
        // line 24
        echo "    ";
        // line 25
        echo "    ";
        // line 27
        echo "<td>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "mobile", array()), "html", null, true);
        echo "</td>
<td>";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email", array()), "html", null, true);
        echo "</td>
<td style=\"width: 120px;\">";
        // line 29
        $this->loadTemplate("MiniWebBundle:Admin/Main:userWidgetCriteriaMatch.html.twig", "MiniWebBundle:Admin/Main:userItem.html.twig", 29)->display($context);
        echo "</td>
<td style=\"width: 170px;\">";
        // line 30
        $this->loadTemplate("MiniWebBundle:Admin/Main:userWidgetStatus.html.twig", "MiniWebBundle:Admin/Main:userItem.html.twig", 30)->display($context);
        echo "</td>
<td style=\"width: 150px;\">";
        // line 31
        $this->loadTemplate("MiniWebBundle:Admin/Main:userWidgetTypeOfRecruitment.html.twig", "MiniWebBundle:Admin/Main:userItem.html.twig", 31)->display($context);
        echo "</td>
<td style=\"width: 100px;\">";
        // line 32
        $this->loadTemplate("MiniWebBundle:Admin/Main:userWidgetRegisteredInProgram.html.twig", "MiniWebBundle:Admin/Main:userItem.html.twig", 32)->display($context);
        echo "</td>
<td style=\"width: 150px;\">";
        // line 33
        $this->loadTemplate("MiniWebBundle:Admin/Main:userWidgetTypeOfSurvey.html.twig", "MiniWebBundle:Admin/Main:userItem.html.twig", 33)->display($context);
        echo "</td>
";
        
        $__internal_ac8093313a2019dd17155cce92cbd219dc335c9e1ea3b368266d16064a9f4608->leave($__internal_ac8093313a2019dd17155cce92cbd219dc335c9e1ea3b368266d16064a9f4608_prof);

    }

    public function getTemplateName()
    {
        return "MiniWebBundle:Admin/Main:userItem.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 33,  99 => 32,  95 => 31,  91 => 30,  87 => 29,  83 => 28,  78 => 27,  76 => 25,  74 => 24,  72 => 22,  70 => 21,  68 => 20,  64 => 16,  51 => 14,  47 => 13,  41 => 10,  37 => 9,  33 => 8,  28 => 7,  26 => 5,  24 => 3,  22 => 1,);
    }
}
/* {% set refList = viewEnumReadableMap('AgencyType') %}*/
/* {#{% if refList[user.reffered] is defined %}#}*/
/*     {#<td>{{ refList[user.reffered] }}</td>#}*/
/* {#{% else %}#}*/
/*     {#<td> - </td>#}*/
/* {#{% endif %}#}*/
/* <td><nobr>{{ user.createdAt|date('Y-m-d') }}</nobr></td>*/
/* <td>{{ user.firstName }}</td>*/
/* <td>{{ user.surnameName }}</td>*/
/* <td>{{ user.referrerFirstName }}</td>*/
/* <td>*/
/*     <ul>*/
/*         {% for sm,smProfile in user.getSocialprofiles() %}*/
/*             <li><a href="{{ viewSmProfileUrl(sm, smProfile) }}" target="_blank" title="{{ smProfile }}">{{ sm }}</a></li>*/
/*         {% endfor %}*/
/*     </ul>*/
/* </td>*/
/* {# ответы опросника #}*/
/* {#{% if user.responses|length > 0 %}#}*/
/*     {#{% for response in user.responses %}#}*/
/*         {#<td>{{ response.text }}</td>#}*/
/*     {#{% endfor %}#}*/
/* {#{% else %}#}*/
/*     {#<td> -</td>#}*/
/*     {#<td> -</td>#}*/
/* {#{% endif %}#}*/
/* <td>{{ user.mobile }}</td>*/
/* <td>{{ user.email }}</td>*/
/* <td style="width: 120px;">{% include "MiniWebBundle:Admin/Main:userWidgetCriteriaMatch.html.twig" %}</td>*/
/* <td style="width: 170px;">{% include "MiniWebBundle:Admin/Main:userWidgetStatus.html.twig" %}</td>*/
/* <td style="width: 150px;">{% include "MiniWebBundle:Admin/Main:userWidgetTypeOfRecruitment.html.twig" %}</td>*/
/* <td style="width: 100px;">{% include "MiniWebBundle:Admin/Main:userWidgetRegisteredInProgram.html.twig" %}</td>*/
/* <td style="width: 150px;">{% include "MiniWebBundle:Admin/Main:userWidgetTypeOfSurvey.html.twig" %}</td>*/
/* */
