<?php

/* MiniCoreBundle:Security:layout.html.twig */
class __TwigTemplate_a9a56f3cc3de982cd85973c8ac7cb195ae283840195d6ac8658810b79730b201 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0fb2b505d71d2b60dbabf30f283ab050a435123e8d4f14312091b2704ee76f90 = $this->env->getExtension("native_profiler");
        $__internal_0fb2b505d71d2b60dbabf30f283ab050a435123e8d4f14312091b2704ee76f90->enter($__internal_0fb2b505d71d2b60dbabf30f283ab050a435123e8d4f14312091b2704ee76f90_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MiniCoreBundle:Security:layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <title>Login</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <!-- Bootstrap core CSS -->
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Font Awesome -->
    <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Endless -->
    <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/css/endless.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

</head>

<body>
<div class=\"login-wrapper\">
    <div class=\"text-center\">
        <h2 class=\"fadeInUp animation-delay8\" style=\"font-weight:bold\">
            <span class=\"text-success\">IQOS</span> <span style=\"color:#ccc; text-shadow:0 1px #fff\">Admin</span>
        </h2>
    </div>
    <div class=\"login-widget animation-delay1\">
        <div class=\"panel panel-default\">
            <div class=\"panel-heading clearfix\">
                <div class=\"pull-left\">
                    <i class=\"fa fa-lock fa-lg\"></i> Login
                </div>
            </div>
            <div class=\"panel-body\">
                ";
        // line 36
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 38
        echo "            </div>
        </div>
        <!-- /panel -->
    </div>
    <!-- /login-widget -->
</div>
<!-- /login-wrapper -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery -->
<script src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/jquery-1.10.2.min.js"), "html", null, true);
        echo "\"></script>

<!-- Bootstrap -->
<script src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

<!-- Modernizr -->
<script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/modernizr.min.js"), "html", null, true);
        echo "\"></script>

<!-- Pace -->
<script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/pace.min.js"), "html", null, true);
        echo "\"></script>

<!-- Popup Overlay -->
<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/jquery.popupoverlay.min.js"), "html", null, true);
        echo "\"></script>

<!-- Slimscroll -->
<script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/jquery.slimscroll.min.js"), "html", null, true);
        echo "\"></script>

<!-- Cookie -->
<script src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/jquery.cookie.min.js"), "html", null, true);
        echo "\"></script>

<!-- Endless -->
<script src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/endless/endless.js"), "html", null, true);
        echo "\"></script>
</body>
</html>
";
        
        $__internal_0fb2b505d71d2b60dbabf30f283ab050a435123e8d4f14312091b2704ee76f90->leave($__internal_0fb2b505d71d2b60dbabf30f283ab050a435123e8d4f14312091b2704ee76f90_prof);

    }

    // line 36
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_c061c4febbdead9991b43284411da03441722eeba19f30452fd81ba8b44731d0 = $this->env->getExtension("native_profiler");
        $__internal_c061c4febbdead9991b43284411da03441722eeba19f30452fd81ba8b44731d0->enter($__internal_c061c4febbdead9991b43284411da03441722eeba19f30452fd81ba8b44731d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 37
        echo "                ";
        
        $__internal_c061c4febbdead9991b43284411da03441722eeba19f30452fd81ba8b44731d0->leave($__internal_c061c4febbdead9991b43284411da03441722eeba19f30452fd81ba8b44731d0_prof);

    }

    public function getTemplateName()
    {
        return "MiniCoreBundle:Security:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 37,  139 => 36,  128 => 72,  122 => 69,  116 => 66,  110 => 63,  104 => 60,  98 => 57,  92 => 54,  86 => 51,  71 => 38,  69 => 36,  47 => 17,  41 => 14,  35 => 11,  23 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="utf-8">*/
/*     <title>Login</title>*/
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
/*     <!-- Endless -->*/
/*     <link href="{{ asset('admin/css/endless.min.css') }}" rel="stylesheet">*/
/* */
/* </head>*/
/* */
/* <body>*/
/* <div class="login-wrapper">*/
/*     <div class="text-center">*/
/*         <h2 class="fadeInUp animation-delay8" style="font-weight:bold">*/
/*             <span class="text-success">IQOS</span> <span style="color:#ccc; text-shadow:0 1px #fff">Admin</span>*/
/*         </h2>*/
/*     </div>*/
/*     <div class="login-widget animation-delay1">*/
/*         <div class="panel panel-default">*/
/*             <div class="panel-heading clearfix">*/
/*                 <div class="pull-left">*/
/*                     <i class="fa fa-lock fa-lg"></i> Login*/
/*                 </div>*/
/*             </div>*/
/*             <div class="panel-body">*/
/*                 {% block fos_user_content %}*/
/*                 {% endblock fos_user_content %}*/
/*             </div>*/
/*         </div>*/
/*         <!-- /panel -->*/
/*     </div>*/
/*     <!-- /login-widget -->*/
/* </div>*/
/* <!-- /login-wrapper -->*/
/* */
/* <!-- Le javascript*/
/* ================================================== -->*/
/* <!-- Placed at the end of the document so the pages load faster -->*/
/* */
/* <!-- Jquery -->*/
/* <script src="{{ asset('admin/js/jquery-1.10.2.min.js') }}"></script>*/
/* */
/* <!-- Bootstrap -->*/
/* <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>*/
/* */
/* <!-- Modernizr -->*/
/* <script src="{{ asset('admin/js/modernizr.min.js') }}"></script>*/
/* */
/* <!-- Pace -->*/
/* <script src="{{ asset('admin/js/pace.min.js') }}"></script>*/
/* */
/* <!-- Popup Overlay -->*/
/* <script src="{{ asset('admin/js/jquery.popupoverlay.min.js') }}"></script>*/
/* */
/* <!-- Slimscroll -->*/
/* <script src="{{ asset('admin/js/jquery.slimscroll.min.js') }}"></script>*/
/* */
/* <!-- Cookie -->*/
/* <script src="{{ asset('admin/js/jquery.cookie.min.js') }}"></script>*/
/* */
/* <!-- Endless -->*/
/* <script src="{{ asset('admin/js/endless/endless.js') }}"></script>*/
/* </body>*/
/* </html>*/
/* */
