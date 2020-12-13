
    <script src="{{asset('backend')}}/lib/jquery/jquery.js"></script><!--===jquery===-->
    <script src="{{asset('backend')}}/lib/jquery-ui/jquery-ui.js"></script><!--===jquery-ui===-->
    <script src="{{asset('backend')}}/lib/popper.js/popper.js"></script><!--===popper===-->
    <script src="{{asset('backend')}}/lib/bootstrap/bootstrap.js"></script><!--===bootstrap===-->
    <script src="{{asset('backend')}}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script><!--===perfect-scrollbar===-->
    <script src="{{asset('backend')}}/lib/datatables/jquery.dataTables.js"></script><!--===datatables===-->
    <script src="{{asset('backend')}}/lib/datatables-responsive/dataTables.responsive.js"></script><!--===datatables===-->
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script><!--===datatables Custom code===-->    
    <script src="{{asset('backend')}}/lib/medium-editor/medium-editor.js"></script><!--===medium-editor===-->
    <script src="{{asset('backend')}}/lib/summernote/summernote-bs4.min.js"></script><!--===medium-editor===-->
    <script>
      $(function(){
        'use strict';
    
        // Inline editor
        var editor = new MediumEditor('.editable');
    
        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          tooltip: false
        });
            
        // Summernote editor
        $('#summernote1').summernote({
          height: 150,
          tooltip: false
        });
      });
    </script><!--===medium-editor custom Code===-->
    <script src="{{asset('backend')}}/js/starlight.js"></script><!--===starlight===-->
    <script src="{{asset('backend')}}/lib/highlightjs/highlight.pack.js"></script><!--===highlightjs===-->
    <script src="{{asset('backend')}}/lib/select2/js/select2.min.js"></script><!--===select2===-->
    <script src="{{asset('backend')}}/js/dashboard.js"></script><!--===dashboard===-->

    @stack('scripts')<!--========= Create Script Tag Link =========-->