<?php

/* MiniWebBundle:Admin/Main:userWidgetStatus.html.twig */
class __TwigTemplate_feddcbdcc8be7632aa322e7922484a03995d8af333b21460c1447e613d7b0dea extends Twig_Template
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
        $__internal_24aab7a5fa22cf0dfeffec9f187e13831cfb58254d177904529513c9e6bdfd3e = $this->env->getExtension("native_profiler");
        $__internal_24aab7a5fa22cf0dfeffec9f187e13831cfb58254d177904529513c9e6bdfd3e->enter($__internal_24aab7a5fa22cf0dfeffec9f187e13831cfb58254d177904529513c9e6bdfd3e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MiniWebBundle:Admin/Main:userWidgetStatus.html.twig"));

        // line 1
        $context["enumList"] = $this->env->getExtension('commonHelper')->getEnumReadableMap("StatusType");
        // line 2
        $context["btnClass"] = "btn-default";
        // line 3
        if ($this->getAttribute((isset($context["enumList"]) ? $context["enumList"] : null), $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "status", array()), array(), "array", true, true)) {
            // line 4
            echo "    ";
            $context["btnTitle"] = $this->getAttribute((isset($context["enumList"]) ? $context["enumList"] : $this->getContext($context, "enumList")), $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "status", array()), array(), "array");
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
        if ($this->env->getExtension('security')->isGranted("ROLE_EDIT_STATUS")) {
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
            if (($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "matchCriteria", array()) == twig_constant("Affect\\MiniCoreBundle\\Enum\\CriteriaMatchType::NO"))) {
                // line 18
                echo "                <li><a href=\"#\" class=\"js-user-change-param\"
                       data-item-id=\"";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "id", array()), "html", null, true);
                echo "\"
                       data-item-status=\"";
                // line 20
                echo twig_escape_filter($this->env, twig_constant("Affect\\MiniCoreBundle\\Enum\\StatusType::NO"), "html", null, true);
                echo "\"
                       data-item-type=\"status\"
                       data-target=\"";
                // line 22
                echo $this->env->getExtension('routing')->getPath("mini_admin_user_param_change");
                echo "\"
                            > ";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["enumList"]) ? $context["enumList"] : $this->getContext($context, "enumList")), twig_constant("Affect\\MiniCoreBundle\\Enum\\StatusType::NO"), array(), "array"), "html", null, true);
                echo " </a></li>
            ";
            } else {
                // line 25
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["enumList"]) ? $context["enumList"] : $this->getContext($context, "enumList")));
                foreach ($context['_seq'] as $context["listItemId"] => $context["listItem"]) {
                    // line 26
                    echo "                    ";
                    if (($context["listItemId"] != twig_constant("Affect\\MiniCoreBundle\\Enum\\StatusType::NO"))) {
                        // line 27
                        echo "                        <li><a href=\"#\" class=\"js-user-change-param\"
                               data-item-id=\"";
                        // line 28
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "id", array()), "html", null, true);
                        echo "\"
                               data-item-status=\"";
                        // line 29
                        echo twig_escape_filter($this->env, $context["listItemId"], "html", null, true);
                        echo "\"
                               data-item-type=\"status\"
                               data-target=\"";
                        // line 31
                        echo $this->env->getExtension('routing')->getPath("mini_admin_user_param_change");
                        echo "\"
                                    >";
                        // line 32
                        echo twig_escape_filter($this->env, $context["listItem"], "html", null, true);
                        echo "</a></li>
                    ";
                    }
                    // line 34
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['listItemId'], $context['listItem'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 35
                echo "            ";
            }
            // line 36
            echo "        </ul>
    </div>
";
        } else {
            // line 39
            echo "    ";
            echo twig_escape_filter($this->env, (isset($context["btnTitle"]) ? $context["btnTitle"] : $this->getContext($context, "btnTitle")), "html", null, true);
            echo "
";
        }
        
        $__internal_24aab7a5fa22cf0dfeffec9f187e13831cfb58254d177904529513c9e6bdfd3e->leave($__internal_24aab7a5fa22cf0dfeffec9f187e13831cfb58254d177904529513c9e6bdfd3e_prof);

    }

    public function getTemplateName()
    {
        return "MiniWebBundle:Admin/Main:userWidgetStatus.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 39,  118 => 36,  115 => 35,  109 => 34,  104 => 32,  100 => 31,  95 => 29,  91 => 28,  88 => 27,  85 => 26,  80 => 25,  75 => 23,  71 => 22,  66 => 20,  62 => 19,  59 => 18,  57 => 17,  48 => 13,  44 => 11,  42 => 10,  39 => 9,  35 => 7,  32 => 6,  28 => 4,  26 => 3,  24 => 2,  22 => 1,);
    }
}
/* {% set enumList = viewEnumReadableMap('StatusType') %}*/
/* {% set btnClass = 'btn-default' %}*/
/* {% if enumList[user.status] is defined %}*/
/*     {% set btnTitle = enumList[user.status] %}*/
/* {% else %}*/
/*     {% set btnClass = 'btn-danger' %}*/
/*     {% set btnTitle = ' - ' %}*/
/* {% endif %}*/
/* */
/* {% if is_granted('ROLE_EDIT_STATUS') %}*/
/*     <div class="btn-group">*/
/* */
/*         <button class="btn {{ btnClass }}">{{ btnTitle }}</button>*/
/*         <button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>*/
/* */
/*         <ul class="dropdown-menu">*/
/*             {% if user.matchCriteria == constant('Affect\\MiniCoreBundle\\Enum\\CriteriaMatchType::NO') %}*/
/*                 <li><a href="#" class="js-user-change-param"*/
/*                        data-item-id="{{ user.id }}"*/
/*                        data-item-status="{{ constant('Affect\\MiniCoreBundle\\Enum\\StatusType::NO') }}"*/
/*                        data-item-type="status"*/
/*                        data-target="{{ path('mini_admin_user_param_change') }}"*/
/*                             > {{ enumList[constant('Affect\\MiniCoreBundle\\Enum\\StatusType::NO')] }} </a></li>*/
/*             {% else %}*/
/*                 {% for listItemId,listItem in enumList %}*/
/*                     {% if listItemId != constant('Affect\\MiniCoreBundle\\Enum\\StatusType::NO') %}*/
/*                         <li><a href="#" class="js-user-change-param"*/
/*                                data-item-id="{{ user.id }}"*/
/*                                data-item-status="{{ listItemId }}"*/
/*                                data-item-type="status"*/
/*                                data-target="{{ path('mini_admin_user_param_change') }}"*/
/*                                     >{{ listItem }}</a></li>*/
/*                     {% endif %}*/
/*                 {% endfor %}*/
/*             {% endif %}*/
/*         </ul>*/
/*     </div>*/
/* {% else %}*/
/*     {{ btnTitle }}*/
/* {% endif %}*/
/* */
