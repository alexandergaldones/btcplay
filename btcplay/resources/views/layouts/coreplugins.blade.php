   <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
   <!-- BEGIN CORE PLUGINS -->   
   <!--[if lt IE 9]>
   <script src="{{ asset('plugins/respond.min.js') }}"></script>
   <script src="{{ asset('plugins/excanvas.min.js') }}"></script> 
   <![endif]-->   
   <script src="{{ asset('plugins/jquery-1.10.2.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>   
   <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js') }} before bootstrap.min.js') }} to fix bootstrap tooltip conflict with jquery ui tooltip -->
   <script src="{{ asset('plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js') }}" type="text/javascript" ></script>
   <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>  
   <script src="{{ asset('plugins/jquery.cookie.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript" ></script>
   <!-- END CORE PLUGINS -->
   <!-- BEGIN PAGE LEVEL PLUGINS -->
   <!--
   <script src="{{ asset('plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>   
   <script src="{{ asset('plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript"></script>  
   -->
   <script src="{{ asset('plugins/flot/jquery.flot.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/jquery.pulsate.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>     
   <script src="{{ asset('plugins/gritter/js/jquery.gritter.js') }}" type="text/javascript"></script>
   <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js') }} for drag & drop support -->
   <!--
   <script src="{{ asset('plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>  
   -->
   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   <script src="{{ asset('scripts/app.js') }}" type="text/javascript"></script>
   <script src="{{ asset('scripts/site_custom.js') }}" type="text/javascript"></script>
   <script src="{{ asset('scripts/index.js') }}" type="text/javascript"></script>
   <script src="{{ asset('scripts/tasks.js') }}" type="text/javascript"></script>
   <script src="{{ asset('plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}" type="text/javascript" ></script>
   <script src="{{ asset('plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript" ></script>
   <script src="{{ asset('scripts/ui-extended-modals.js') }}"></script> 
   <!-- END PAGE LEVEL SCRIPTS -->  
   <script>
      jQuery(document).ready(function() {    
         App.init(); // initlayout and core plugins
         Index.init();
         //Index.initJQVMAP(); // init index page's custom scripts
         //Index.initCalendar(); // init index page's custom scripts
         //Index.initCharts(); // init index page's custom scripts
         //Index.initChat();
         //Index.initMiniCharts();
         //Index.initDashboardDaterange();
         //Index.initIntro();
         UIExtendedModals.init();
         Tasks.initDashboardWidget();
      });
   </script>
   <!-- END JAVASCRIPTS -->