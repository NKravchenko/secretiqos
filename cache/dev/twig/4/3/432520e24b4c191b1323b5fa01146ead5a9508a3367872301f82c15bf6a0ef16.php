<?php

/* MiniWebBundle:Admin/Main:userWidgetTypeOfRecruitment.html.twig */
class __TwigTemplate_8e2161fe2581c335b1b7bed7ad83657ef05c1f2c5518207004cdd34cabe027fc extends Twig_Template
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
        $__internal_a7927d5901c4e42bf72ce84d11a377b70748084237d57b3abe883419c088db46 = $this->env->getExtension("native_profiler");
        $__internal_a7927d5901c4e42bf72ce84d11a377b70748084237d57b3abe883419c088db46->enter($__internal_a7927d5901c4e42bf72ce84d11a377b70748084237d57b3abe883419c088db46_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MiniWebBundle:Admin/Main:userWidgetTypeOfRecruitment.html.twig"));

        // line 1
        $context["enumList"] = $this->env->getExtension('commonHelper')->getEnumReadableMap("TypeOfRecruitmentType");
        // line 2
        $context["btnClass"] = "btn-default";
        // line 3
        if ($this->getAttribute((isset($context["enumList"]) ? $context["enumList"] : null), $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "typeOfRecruitment", array()), array(), "array", true, true)) {
            // line 4
            echo "    ";
            $context["btnTitle"] = $this->getAttribute((isset($context["enumList"]) ? $context["enumList"] : $this->getContext($context, "enumList")), $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "typeOfRecruitment", array()), array(), "array");
        } else {
            // line 6
            echo "    ";
            $context["btnClass"] = "btn-danger";
            // line 7
            echo "    ";
            $context["btnTitle"] = " - ";
        }
        // line 9
        echo "
";
        // line 10
        if (($this->env->getExtension('security')->isGranted("ROLE_EDIT_TYPE_OF_RECRUITMENT") && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "status", array()) != twig_constant("Affect\\MiniCoreBundle\\Enum\\StatusType::VIP")))) {
            // line 11
            echo "    <div class=\"btn-group\">

        <button class=\"btn ";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["btnClass"]) ? $context["btnClass"] : $this->getContext($context, "btnClass")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["btnTitle"]) ? $context["btnTitle"] : $this->getContext($context, "btnTitle")), "html", null, true);
            echo "</button>
        <button class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\"><span class=\"caret\"></span></button>

        <ul class=\"dropdown-menu\">
            ";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["enumList"]) ? $context["enumList"] : $this->getContext($context, "enumList")));
            foreach ($context['_seq'] as $context["listItemId"] => $context["listItem"]) {
                // line 18
                echo "                <li><a href=\"#\" class=\"js-user-change-param\"
                       data-item-id=\"";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "id", array()), "html", null, true);
                echo "\"
                       data-item-status=\"";
                // line 20
                echo twig_escape_filter($this->env, $context["listItemId"], "html", null, true);
                echo "\"
                       data-item-type=\"typeOfRecruitment\"
                       data-target=\"";
                // line 22
                echo $this->env->getExtension('routing')->getPath("mini_admin_user_param_change");
                echo "\"
                            >";
                // line 23
                echo twig_escape_filter($this->env, $context["listItem"], "html", null, true);
                echo "</a></li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['listItemId'], $context['listItem'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "        </ul>
    </div>
";
        } else {
            // line 28
            echo "    ";
            echo twig_escape_filter($this->env, (isset($context["btnTitle"]) ? $context["btnTitle"] : $this->getContext($context, "btnTitle")), "html", null, true);
            echo "
";
        }
        
        $__internal_a7927d5901c4e42bf72ce84d11a377b70748084237d57b3abe883419c088db46->leave($__internal_a7927d5901c4e42bf72ce84d11a377b70748084237d57b3abe883419c088db46_prof);

    }

    public function getTemplateName()
    {
        return "MiniWebBundle:Admin/Main:userWidgetTypeOfRecruitment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 28,  85 => 25,  77 => 23,  73 => 22,  68 => 20,  64 => 19,  61 => 18,  57 => 17,  48 => 13,  44 => 11,  42 => 10,  39 => 9,  35 => 7,  32 => 6,  28 => 4,  26 => 3,  24 => 2,  22 => 1,);
    }
}
/* {% set enumList = viewEnumReadableMap('TypeOfRecruitmentType') %}*/
/* {% set btnClass = 'btn-default' %}*/
/* {% if enumList[user.typeOfRecruitment] is defined %}*/
/*     {% set btnTitle = enumList[user.typeOfRecruitment] %}*/
/* {% else %}*/
/*     {% set btnClass = 'btn-danger' %}*/
/*     {% set btnTitle = ' - ' %}*/
/* {% endif %}*/
/* */
/* {% if is_granted('ROLE_EDIT_TYPE_OF_RECRUITMENT') and ( user.status != constant('Affect\\MiniCoreBundle\\Enum\\StatusType::VIP') )%}*/
/*     <div class="btn-group">*/
/* */
/*         <button class="btn {{ btnClass }}">{{ btnTitle }}</button>*/
/*         <button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>*/
/* */
/*         <ul class="dropdown-menu">*/
/*             {% for listItemId,listItem in enumList %}*/
/*                 <li><a href="#" class="js-user-change-param"*/
/*                        data-item-id="{{ user.id }}"*/
/*                        data-item-status="{{ listItemId }}"*/
/*                        data-item-type="typeOfRecruitment"*/
/*                        data-target="{{ path('mini_admin_user_param_change') }}"*/
/*                             >{{ listItem }}</a></li>*/
/*             {% endfor %}*/
/*         </ul>*/
/*     </div>*/
/* {% else %}*/
/*     {{ btnTitle }}*/
/* {% endif %}*/
