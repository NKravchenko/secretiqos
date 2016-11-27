<?php

/* MiniWebBundle:Main:index.html.twig */
class __TwigTemplate_d4e686311b0e059b8378b0a7a3a70c9413546d574a1be3ed0ee849c910e0c3d2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("MiniWebBundle::layout.html.twig", "MiniWebBundle:Main:index.html.twig", 1);
        $this->blocks = array(
            'page_content' => array($this, 'block_page_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MiniWebBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_23221db7a71cd6900da80e3ccfc31389fc47b843598447b822ea667bcd6d3623 = $this->env->getExtension("native_profiler");
        $__internal_23221db7a71cd6900da80e3ccfc31389fc47b843598447b822ea667bcd6d3623->enter($__internal_23221db7a71cd6900da80e3ccfc31389fc47b843598447b822ea667bcd6d3623_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MiniWebBundle:Main:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_23221db7a71cd6900da80e3ccfc31389fc47b843598447b822ea667bcd6d3623->leave($__internal_23221db7a71cd6900da80e3ccfc31389fc47b843598447b822ea667bcd6d3623_prof);

    }

    // line 3
    public function block_page_content($context, array $blocks = array())
    {
        $__internal_73757ecb07c653d3f68f87974b5fb8f44bdad88e78ab21c6f91d11a177e6daef = $this->env->getExtension("native_profiler");
        $__internal_73757ecb07c653d3f68f87974b5fb8f44bdad88e78ab21c6f91d11a177e6daef->enter($__internal_73757ecb07c653d3f68f87974b5fb8f44bdad88e78ab21c6f91d11a177e6daef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "page_content"));

        // line 4
        echo "    <div class=\"iqos_title\">
        Вы получили секретную ссылку для регистрации в закрытом проекте.
        Количество участников ограничено
    </div>
    <div class=\"iqos_descr\">
        Для участия необходимо пройти авторизацию в одной из социальных сетей:
    </div>
    <ul class=\"iqos_soc-list\">
        <li>
            <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("hwi_oauth_service_redirect", array("service" => "facebook"));
        echo "\">
                <img class=\"iqos_fb-ico\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/facebook-01.svg"), "html", null, true);
        echo "\" alt=\"\" />
            </a>
        </li>
        <li>
            <a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("hwi_oauth_service_redirect", array("service" => "instagram"));
        echo "\">
                <img class=\"iqos_inst-ico\" src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/insta-01.svg"), "html", null, true);
        echo "\" alt=\"\" />
            </a>
        </li>
        <li>
            <a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("hwi_oauth_service_redirect", array("service" => "twitter"));
        echo "\">
                <img class=\"iqos_tw-ico\" src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/twitter-01.svg"), "html", null, true);
        echo "\" alt=\"\" />
            </a>
        </li>
    </ul>
    <div class=\"iqos_info\">
        ";
        // line 29
        if (((isset($context["ref"]) ? $context["ref"] : $this->getContext($context, "ref")) == "MP")) {
            // line 30
            echo "            <div class=\"iqos_info_email\">
                <a href=\"mailto:iqos@m-p.ru\">iqos@m-p.ru</a>
            </div>
            <div class=\"iqos_info_phone\">
                <nobr>+7 495 710 7068</nobr>
            </div>
        ";
        } else {
            // line 37
            echo "            <div class=\"iqos_info_email\">
                <a href=\"mailto:iqos@rsvp-agency.com\">iqos@rsvp-agency.com</a>
            </div>
            <div class=\"iqos_info_phone\">
                <nobr>+7 985 998 3199</nobr>
            </div>
        ";
        }
        // line 44
        echo "    </div>
    <div class=\"iqos_disclaimer\">
        Обратите внимание, что предоставленная вами информация не будет использоваться в коммерческих целях.<br>
        Данный вебсайт используется в целях проведения исследования потребления табачной продукции в России и предназначен только для
        граждан
        РФ старше 18 лет
    </div>
    <div class=\"iqos_bg-pic iqos_bg-pic3\">
        <img src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/bg3.png"), "html", null, true);
        echo "\" alt=\"\">
    </div>
";
        
        $__internal_73757ecb07c653d3f68f87974b5fb8f44bdad88e78ab21c6f91d11a177e6daef->leave($__internal_73757ecb07c653d3f68f87974b5fb8f44bdad88e78ab21c6f91d11a177e6daef_prof);

    }

    public function getTemplateName()
    {
        return "MiniWebBundle:Main:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 52,  105 => 44,  96 => 37,  87 => 30,  85 => 29,  77 => 24,  73 => 23,  66 => 19,  62 => 18,  55 => 14,  51 => 13,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'MiniWebBundle::layout.html.twig' %}*/
/* */
/* {% block page_content %}*/
/*     <div class="iqos_title">*/
/*         Вы получили секретную ссылку для регистрации в закрытом проекте.*/
/*         Количество участников ограничено*/
/*     </div>*/
/*     <div class="iqos_descr">*/
/*         Для участия необходимо пройти авторизацию в одной из социальных сетей:*/
/*     </div>*/
/*     <ul class="iqos_soc-list">*/
/*         <li>*/
/*             <a href="{{ path('hwi_oauth_service_redirect', {'service': 'facebook'}) }}">*/
/*                 <img class="iqos_fb-ico" src="{{ asset('images/facebook-01.svg') }}" alt="" />*/
/*             </a>*/
/*         </li>*/
/*         <li>*/
/*             <a href="{{ path('hwi_oauth_service_redirect', {'service': 'instagram'}) }}">*/
/*                 <img class="iqos_inst-ico" src="{{ asset('images/insta-01.svg') }}" alt="" />*/
/*             </a>*/
/*         </li>*/
/*         <li>*/
/*             <a href="{{ path('hwi_oauth_service_redirect', {'service': 'twitter'}) }}">*/
/*                 <img class="iqos_tw-ico" src="{{ asset('images/twitter-01.svg') }}" alt="" />*/
/*             </a>*/
/*         </li>*/
/*     </ul>*/
/*     <div class="iqos_info">*/
/*         {% if ref == 'MP' %}*/
/*             <div class="iqos_info_email">*/
/*                 <a href="mailto:iqos@m-p.ru">iqos@m-p.ru</a>*/
/*             </div>*/
/*             <div class="iqos_info_phone">*/
/*                 <nobr>+7 495 710 7068</nobr>*/
/*             </div>*/
/*         {% else %}*/
/*             <div class="iqos_info_email">*/
/*                 <a href="mailto:iqos@rsvp-agency.com">iqos@rsvp-agency.com</a>*/
/*             </div>*/
/*             <div class="iqos_info_phone">*/
/*                 <nobr>+7 985 998 3199</nobr>*/
/*             </div>*/
/*         {% endif %}*/
/*     </div>*/
/*     <div class="iqos_disclaimer">*/
/*         Обратите внимание, что предоставленная вами информация не будет использоваться в коммерческих целях.<br>*/
/*         Данный вебсайт используется в целях проведения исследования потребления табачной продукции в России и предназначен только для*/
/*         граждан*/
/*         РФ старше 18 лет*/
/*     </div>*/
/*     <div class="iqos_bg-pic iqos_bg-pic3">*/
/*         <img src="{{ asset('images/bg3.png') }}" alt="">*/
/*     </div>*/
/* {% endblock %}*/
