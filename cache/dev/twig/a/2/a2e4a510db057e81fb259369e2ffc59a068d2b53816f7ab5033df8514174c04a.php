<?php

/* MiniWebBundle:Admin:sidebar.html.twig */
class __TwigTemplate_978166018fbc49288722005ddd9f7d74ab8c4c5f8a1824845e7dc9c9bc8fa92c extends Twig_Template
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
        $__internal_0ccd66044a5c3e32e8b652a3e7a50a3d4a1a14aced2572b314ebf43326257b58 = $this->env->getExtension("native_profiler");
        $__internal_0ccd66044a5c3e32e8b652a3e7a50a3d4a1a14aced2572b314ebf43326257b58->enter($__internal_0ccd66044a5c3e32e8b652a3e7a50a3d4a1a14aced2572b314ebf43326257b58_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MiniWebBundle:Admin:sidebar.html.twig"));

        // line 1
        echo "<div class=\"sidebar-inner scrollable-sidebar\">
    <div class=\"size-toggle\">
        <a class=\"btn btn-sm\" id=\"sizeToggle\">
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
        </a>
        <a class=\"btn btn-sm pull-right logoutConfirm_open\" href=\"#logoutConfirm\">
            <i class=\"fa fa-power-off\"></i>
        </a>
    </div>
    <!-- /size-toggle -->
    <div class=\"user-block clearfix\">
        <img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("img/iqos_logo.png"), "html", null, true);
        echo "\" alt=\"User Avatar\">

        ";
        // line 17
        echo "            ";
        // line 18
        echo "            ";
        // line 19
        echo "                ";
        // line 20
        echo "                ";
        // line 21
        echo "            ";
        // line 22
        echo "        ";
        // line 23
        echo "    </div>
    <!-- /user-block -->
    ";
        // line 26
        echo "        ";
        // line 27
        echo "            ";
        // line 28
        echo "            ";
        // line 29
        echo "                ";
        // line 30
        echo "            ";
        // line 31
        echo "        ";
        // line 32
        echo "        ";
        // line 33
        echo "    ";
        // line 34
        echo "    <!-- /search-block -->
    <div class=\"main-menu\">
        <ul>
            <li class=\"";
        // line 37
        if (twig_in_filter("DefaultController", (isset($context["_controller"]) ? $context["_controller"] : $this->getContext($context, "_controller")))) {
            echo "active";
        }
        echo "\">
                <a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("mini_admin_homepage");
        echo "\">
                 <span class=\"menu-icon\">
                   <i class=\"fa fa- fa-lg\"></i>
                </span>
                <span class=\"text\">
                   Users
                </span>
                    <span class=\"menu-hover\"></span>
                </a>
            </li>
        </ul>

        ";
        // line 51
        echo "            ";
        // line 52
        echo "        ";
        // line 53
        echo "
    </div>
    <!-- /main-menu -->
</div><!-- /sidebar-inner -->
";
        
        $__internal_0ccd66044a5c3e32e8b652a3e7a50a3d4a1a14aced2572b314ebf43326257b58->leave($__internal_0ccd66044a5c3e32e8b652a3e7a50a3d4a1a14aced2572b314ebf43326257b58_prof);

    }

    public function getTemplateName()
    {
        return "MiniWebBundle:Admin:sidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 53,  102 => 52,  100 => 51,  85 => 38,  79 => 37,  74 => 34,  72 => 33,  70 => 32,  68 => 31,  66 => 30,  64 => 29,  62 => 28,  60 => 27,  58 => 26,  54 => 23,  52 => 22,  50 => 21,  48 => 20,  46 => 19,  44 => 18,  42 => 17,  37 => 14,  22 => 1,);
    }
}
/* <div class="sidebar-inner scrollable-sidebar">*/
/*     <div class="size-toggle">*/
/*         <a class="btn btn-sm" id="sizeToggle">*/
/*             <span class="icon-bar"></span>*/
/*             <span class="icon-bar"></span>*/
/*             <span class="icon-bar"></span>*/
/*         </a>*/
/*         <a class="btn btn-sm pull-right logoutConfirm_open" href="#logoutConfirm">*/
/*             <i class="fa fa-power-off"></i>*/
/*         </a>*/
/*     </div>*/
/*     <!-- /size-toggle -->*/
/*     <div class="user-block clearfix">*/
/*         <img src="{{ asset('img/iqos_logo.png') }}" alt="User Avatar">*/
/* */
/*         {#<div class="detail">#}*/
/*             {#<strong>John Doe</strong><span class="badge badge-danger m-left-xs bounceIn animation-delay4">4</span>#}*/
/*             {#<ul class="list-inline">#}*/
/*                 {#<li><a href="profile.html">Profile</a></li>#}*/
/*                 {#<li><a href="inbox.html" class="no-margin">Inbox</a></li>#}*/
/*             {#</ul>#}*/
/*         {#</div>#}*/
/*     </div>*/
/*     <!-- /user-block -->*/
/*     {#<div class="search-block">#}*/
/*         {#<div class="input-group">#}*/
/*             {#<input type="text" class="form-control input-sm" placeholder="search here...">#}*/
/*             {#<span class="input-group-btn">#}*/
/*                 {#<button class="btn btn-default btn-sm" type="button"><i class="fa fa-search"></i></button>#}*/
/*             {#</span>#}*/
/*         {#</div>#}*/
/*         {#<!-- /input-group -->#}*/
/*     {#</div>#}*/
/*     <!-- /search-block -->*/
/*     <div class="main-menu">*/
/*         <ul>*/
/*             <li class="{% if 'DefaultController' in _controller %}active{% endif %}">*/
/*                 <a href="{{ path('mini_admin_homepage') }}">*/
/*                  <span class="menu-icon">*/
/*                    <i class="fa fa- fa-lg"></i>*/
/*                 </span>*/
/*                 <span class="text">*/
/*                    Users*/
/*                 </span>*/
/*                     <span class="menu-hover"></span>*/
/*                 </a>*/
/*             </li>*/
/*         </ul>*/
/* */
/*         {#<div class="alert alert-info">#}*/
/*             {#Welcome to Endless Admin. Do not forget to check all my pages.#}*/
/*         {#</div>#}*/
/* */
/*     </div>*/
/*     <!-- /main-menu -->*/
/* </div><!-- /sidebar-inner -->*/
/* */
