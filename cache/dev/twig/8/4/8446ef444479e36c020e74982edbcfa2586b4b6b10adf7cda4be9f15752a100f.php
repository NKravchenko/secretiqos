<?php

/* MiniWebBundle:Admin:layout.html.twig */
class __TwigTemplate_fcb98738570893785c6091f6463c878fcbb7fa510d8fb41d202e04ee88a56ddb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'container' => array($this, 'block_container'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_cfe870a57ca1ee638a689808f6ad41231e7f0a48ce92c139286d09038b1d7da0 = $this->env->getExtension("native_profiler");
        $__internal_cfe870a57ca1ee638a689808f6ad41231e7f0a48ce92c139286d09038b1d7da0->enter($__internal_cfe870a57ca1ee638a689808f6ad41231e7f0a48ce92c139286d09038b1d7da0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MiniWebBundle:Admin:layout.html.twig"));

        // line 1
        $this->loadTemplate("MiniWebBundle:Admin:head.html.twig", "MiniWebBundle:Admin:layout.html.twig", 1)->display($context);
        // line 2
        $context["_controller"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_controller"), "method");
        // line 3
        echo "
<body class=\"overflow-hidden\">
<!-- Overlay Div -->
<div id=\"overlay\" class=\"transparent\"></div>

<!--Modal-->
<div class=\"modal fade\" id=\"modal-container\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\" id=\"overlay_content\">
<!-- loadable content -->
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal-->
<div class=\"modal fade\" id=\"modal-image-view\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\" id=\"overlay_content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                <h4>Фотография</h4>
            </div>
            <div class=\"modal-body\">
                <img src=\"\" id=\"modal-image-view-src\">
            </div>
            <div class=\"modal-footer\">
                <button class=\"btn btn-sm btn-danger\" data-dismiss=\"modal\" aria-hidden=\"true\">Закрыть</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Logout confirmation -->
<div class=\"custom-popup width-80\" id=\"logoutConfirm\">
    <div class=\"padding-md\">
        <h4 class=\"m-top-none\">Вы уверены что хотите выйти?</h4>
    </div>

    <div class=\"text-center\">
        <a class=\"btn btn-success m-right-sm\" href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\">Выход</a>
        <a class=\"btn btn-danger logoutConfirm_close\">Отмена</a>
    </div>
</div>

<div id=\"wrapper\" class=\"sidebar-mini\">
    ";
        // line 50
        $this->loadTemplate("MiniWebBundle:Admin:topnav.html.twig", "MiniWebBundle:Admin:layout.html.twig", 50)->display($context);
        // line 51
        echo "
    <aside class=\"fixed skin-6\">
        ";
        // line 53
        $this->loadTemplate("MiniWebBundle:Admin:sidebar.html.twig", "MiniWebBundle:Admin:layout.html.twig", 53)->display($context);
        // line 54
        echo "    </aside>

    <div id=\"main-container\">
        ";
        // line 57
        $this->displayBlock('container', $context, $blocks);
        // line 58
        echo "    </div>
    <!-- /main-container -->
</div>

<!-- /wrapper -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery -->
<script src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/jquery-1.10.2.min.js"), "html", null, true);
        echo "\"></script>

<!-- custom -->
";
        // line 73
        echo "

<!-- Bootstrap -->
<script src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bootstrap/js/bootstrap.js"), "html", null, true);
        echo "\"></script>

<!-- Flot -->
";
        // line 80
        echo "
<!-- Morris -->
";
        // line 84
        echo "
<!-- Colorbox -->
";
        // line 87
        echo "
<!-- Sparkline -->
";
        // line 90
        echo "
<!-- Pace -->
<script src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/pace.min.js"), "html", null, true);
        echo "\"></script>

<!-- Popup Overlay -->
<script src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/jquery.popupoverlay.min.js"), "html", null, true);
        echo "\"></script>

";
        // line 98
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/jquery.slimscroll.min.js"), "html", null, true);
        echo "\"></script>

";
        // line 101
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/modernizr.min.js"), "html", null, true);
        echo "\"></script>

<!-- Cookie -->
<script src=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/jquery.cookie.min.js"), "html", null, true);
        echo "\"></script>

<!-- Gritter -->
<script src=\"";
        // line 107
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/jquery.gritter.min.js"), "html", null, true);
        echo "\"></script>

<script src=\"";
        // line 109
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/admin-common.js"), "html", null, true);
        echo "\"></script>
<!-- Endless -->
";
        // line 112
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("admin/js/endless/endless.js"), "html", null, true);
        echo "\"></script>


</body>

";
        
        $__internal_cfe870a57ca1ee638a689808f6ad41231e7f0a48ce92c139286d09038b1d7da0->leave($__internal_cfe870a57ca1ee638a689808f6ad41231e7f0a48ce92c139286d09038b1d7da0_prof);

    }

    // line 57
    public function block_container($context, array $blocks = array())
    {
        $__internal_c5e03de18338b0769b2180ae09a3905cd8367a865f90ac8365bfc5cd47d910cc = $this->env->getExtension("native_profiler");
        $__internal_c5e03de18338b0769b2180ae09a3905cd8367a865f90ac8365bfc5cd47d910cc->enter($__internal_c5e03de18338b0769b2180ae09a3905cd8367a865f90ac8365bfc5cd47d910cc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "container"));

        
        $__internal_c5e03de18338b0769b2180ae09a3905cd8367a865f90ac8365bfc5cd47d910cc->leave($__internal_c5e03de18338b0769b2180ae09a3905cd8367a865f90ac8365bfc5cd47d910cc_prof);

    }

    public function getTemplateName()
    {
        return "MiniWebBundle:Admin:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 57,  180 => 112,  175 => 109,  170 => 107,  164 => 104,  157 => 101,  151 => 98,  146 => 95,  140 => 92,  136 => 90,  132 => 87,  128 => 84,  124 => 80,  118 => 76,  113 => 73,  107 => 69,  94 => 58,  92 => 57,  87 => 54,  85 => 53,  81 => 51,  79 => 50,  70 => 44,  27 => 3,  25 => 2,  23 => 1,);
    }
}
/* {% include 'MiniWebBundle:Admin:head.html.twig' %}*/
/* {% set _controller = app.request.attributes.get('_controller') %}*/
/* */
/* <body class="overflow-hidden">*/
/* <!-- Overlay Div -->*/
/* <div id="overlay" class="transparent"></div>*/
/* */
/* <!--Modal-->*/
/* <div class="modal fade" id="modal-container">*/
/*     <div class="modal-dialog">*/
/*         <div class="modal-content" id="overlay_content">*/
/* <!-- loadable content -->*/
/*         </div> <!-- /.modal-content -->*/
/*     </div> <!-- /.modal-dialog -->*/
/* </div>*/
/* <!-- /.modal -->*/
/* */
/* <!--Modal-->*/
/* <div class="modal fade" id="modal-image-view">*/
/*     <div class="modal-dialog">*/
/*         <div class="modal-content" id="overlay_content">*/
/*             <div class="modal-header">*/
/*                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>*/
/*                 <h4>Фотография</h4>*/
/*             </div>*/
/*             <div class="modal-body">*/
/*                 <img src="" id="modal-image-view-src">*/
/*             </div>*/
/*             <div class="modal-footer">*/
/*                 <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Закрыть</button>*/
/*             </div>*/
/*         </div> <!-- /.modal-content -->*/
/*     </div> <!-- /.modal-dialog -->*/
/* </div>*/
/* <!-- /.modal -->*/
/* */
/* <!-- Logout confirmation -->*/
/* <div class="custom-popup width-80" id="logoutConfirm">*/
/*     <div class="padding-md">*/
/*         <h4 class="m-top-none">Вы уверены что хотите выйти?</h4>*/
/*     </div>*/
/* */
/*     <div class="text-center">*/
/*         <a class="btn btn-success m-right-sm" href="{{ path('fos_user_security_logout') }}">Выход</a>*/
/*         <a class="btn btn-danger logoutConfirm_close">Отмена</a>*/
/*     </div>*/
/* </div>*/
/* */
/* <div id="wrapper" class="sidebar-mini">*/
/*     {% include 'MiniWebBundle:Admin:topnav.html.twig' %}*/
/* */
/*     <aside class="fixed skin-6">*/
/*         {% include 'MiniWebBundle:Admin:sidebar.html.twig' %}*/
/*     </aside>*/
/* */
/*     <div id="main-container">*/
/*         {% block container %}{% endblock %}*/
/*     </div>*/
/*     <!-- /main-container -->*/
/* </div>*/
/* */
/* <!-- /wrapper -->*/
/* */
/* <!-- Le javascript*/
/* ================================================== -->*/
/* <!-- Placed at the end of the document so the pages load faster -->*/
/* */
/* <!-- Jquery -->*/
/* <script src="{{ asset('admin/js/jquery-1.10.2.min.js') }}"></script>*/
/* */
/* <!-- custom -->*/
/* {#<script src="{{ asset('js/backend.core.js') }}"></script>#}*/
/* */
/* */
/* <!-- Bootstrap -->*/
/* <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>*/
/* */
/* <!-- Flot -->*/
/* {#<script src="{{ asset('js/jquery.flot.min.js') }}"></script>#}*/
/* */
/* <!-- Morris -->*/
/* {#<script src="{{ asset('js/rapheal.min.js') }}"></script>#}*/
/* {#<script src="{{ asset('js/morris.min.js') }}"></script>#}*/
/* */
/* <!-- Colorbox -->*/
/* {#<script src="{{ asset('js/jquery.colorbox.min.js') }}"></script>#}*/
/* */
/* <!-- Sparkline -->*/
/* {#<script src="{{ asset('js/jquery.sparkline.min.js') }}"></script>#}*/
/* */
/* <!-- Pace -->*/
/* <script src="{{ asset('admin/js/pace.min.js') }}"></script>*/
/* */
/* <!-- Popup Overlay -->*/
/* <script src="{{ asset('admin/js/jquery.popupoverlay.min.js') }}"></script>*/
/* */
/* {#<!-- Slimscroll -->#}*/
/* <script src="{{ asset('admin/js/jquery.slimscroll.min.js') }}"></script>*/
/* */
/* {#<!-- Modernizr -->#}*/
/* <script src="{{ asset('admin/js/modernizr.min.js') }}"></script>*/
/* */
/* <!-- Cookie -->*/
/* <script src="{{ asset('admin/js/jquery.cookie.min.js') }}"></script>*/
/* */
/* <!-- Gritter -->*/
/* <script src="{{ asset('admin/js/jquery.gritter.min.js') }}"></script>*/
/* */
/* <script src="{{ asset('admin/js/admin-common.js') }}"></script>*/
/* <!-- Endless -->*/
/* {#<script src="{{ asset('js/endless/endless_dashboard.js') }}"></script>#}*/
/* <script src="{{ asset('admin/js/endless/endless.js') }}"></script>*/
/* */
/* */
/* </body>*/
/* */
/* */
