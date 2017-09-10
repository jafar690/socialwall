<template>
                <!-- 
                ASIDE 
                Keep it outside of #wrapper (responsive purpose)
            -->
            <aside id="aside">
                <!--
                    Always open:
                    <li class="active alays-open">

                    LABELS:
                        <span class="label label-danger pull-right">1</span>
                        <span class="label label-default pull-right">1</span>
                        <span class="label label-warning pull-right">1</span>
                        <span class="label label-success pull-right">1</span>
                        <span class="label label-info pull-right">1</span>
                -->
                <nav id="sideNav"><!-- MAIN MENU -->
                    <ul class="nav nav-list">
                        <li><!-- dashboard -->
                            <a class="dashboard" href="index.html"><!-- warning - url used by default by ajax (if eneabled) -->
                                <i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li><!-- dashboard -->
                            <a class="dashboard" href="index.html"><!-- warning - url used by default by ajax (if eneabled) -->
                                <i class="main-icon fa fa-lock"></i> <span>Admins</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-menu-arrow pull-right"></i>
                                <i class="main-icon fa fa-bar-chart-o"></i> <span>Graphs</span>
                            </a>
                            <ul><!-- submenus -->
                                <li><a href="graphs-flot.html">Flot Charts</a></li>
                                <li><a href="graphs-morris.html">Morris Charts</a></li>
                                <li><a href="graphs-inline.html">Inline Charts</a></li>
                                <li><a href="graphs-chartjs.html">Chart.js</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-menu-arrow pull-right"></i>
                                <i class="main-icon fa fa-table"></i> <span>Tables</span>
                            </a>
                            <ul><!-- submenus -->
                                <li><a href="tables-bootstrap.html">Bootstrap Tables</a></li>
                                <li><a href="tables-jqgrid.html">jQuery Grid</a></li>
                                <li><a href="tables-footable.html">jQuery Footable</a></li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-menu-arrow pull-right"></i>
                                        Datatables
                                    </a>
                                    <ul>
                                        <li><a href="tables-datatable-managed.html">Managed Datatables</a></li>
                                        <li><a href="tables-datatable-editable.html">Editable Datatables</a></li>
                                        <li><a href="tables-datatable-advanced.html">Advanced Datatables</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-menu-arrow pull-right"></i>
                                <i class="main-icon fa fa-pencil-square-o"></i> <span>Forms</span>
                            </a>
                            <ul><!-- submenus -->
                                <li><a href="form-elements.html">Smarty Elements</a></li>
                                <li><a href="form-masked-inputs.html">Masked Inputs</a></li>
                                <li><a href="form-pickers.html">Pickers</a></li>
                                <li><a href="form-ui-sliders.html">UI Sliders</a></li>
                                <li><a href="form-validation.html">Validation Form</a></li>
                                <li><a href="form-html-editors.html">Html Editors</a></li>
                                <li><a href="form-autosuggest.html">Autosuggest</a></li>
                                <li><a href="form-x-editable.html">Form X-Editable</a></li>
                                <li><a href="form-dropzone.html">Dropzone File Upload</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-menu-arrow pull-right"></i>
                                <i class="main-icon fa fa-gears"></i> <span>UI Features</span>
                            </a>
                            <ul><!-- submenus -->
                                <li><a href="ui-portlets.html">Portlets</a></li>
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-menu-arrow pull-right"></i>
                                        Icons
                                    </a>
                                    <ul>
                                        <li><a href="ui-icons-fontawsome.html">Fontawsome</a></li>
                                        <li><a href="ui-icons-etline.html">Et-Line Icons</a></li>
                                        <li><a href="ui-icons-glyphicons.html">Glyph Icons</a></li>
                                        <li><a href="ui-icons-flags.html">Flags</a></li>
                                    </ul>
                                </li>
                                <li><a href="ui-alerts-dialogs.html">Alerts &amp; Dialogs</a></li>
                                <li><a href="ui-tabs-acordion-navs.html">Tabs, Acordion &amp; Navs</a></li>
                                <li><a href="ui-knob.html">Knob Circles</a></li>
                                <li><a href="ui-nestable.html">Nestable List</a></li>
                                <li><a href="ui-toastr.html">Toastr Notifications</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>
                                <li><a href="ui-grid.html">Grid</a></li>
                                <li><a href="ui-google-maps.html">Google Maps</a></li>
                                <li><a href="ui-vector-maps.html">Vector Maps</a></li>
                                <li><a href="ui-essentials.html">Essentials</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="main-icon fa fa-calendar"></i>
                                <span class="label label-warning pull-right">2</span> <span>Calendar</span>
                            </a>
                        </li>
                    </ul>

                    <!-- SECOND MAIN LIST -->
                    <h3>MORE</h3>
                    <ul class="nav nav-list">
                        <li>
                            <a href="calendar.html">
                                <i class="main-icon fa fa-calendar"></i>
                                <span class="label label-warning pull-right">2</span> <span>Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="../../HTML/start.html">
                                <i class="main-icon fa fa-link"></i>
                                <span class="label label-danger pull-right">PRO</span> <span>Frontend</span>
                            </a>
                        </li>
                    </ul>

                </nav>

                <span id="asidebg"><!-- aside fixed background --></span>
            </aside>
            <!-- /ASIDE -->
</template>