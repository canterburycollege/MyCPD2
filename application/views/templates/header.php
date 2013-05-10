<html>
    <head>
        <title>MyCPD Hub</title>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
        
        
         <script type="text/javascript" src="../../../assets/js/DataTables/media/js/jquery.dataTables.js"></script>
            <link href="../../../assets/css/default.css" rel="stylesheet" type="text/css">
        <script>
            $(function() {
              $( "#target_date" ).datepicker({dateFormat: 'yy-mm-dd'});
            });
        </script>
        
        <script>
            $(document).ready(function(){
                $('#targets_table').dataTable({
                "bJQueryUI": true,
               "sPaginationType": "full_numbers"});
              $("table#targets_table tr:even").css("background-color", "#fff");
              $("table#targets_table tr:odd").css("background-color", "#EFF1F1");
            });
        </script>    
        
                <script>
            $(document).ready(function(){
                $('#table_detail').dataTable({
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers"});
            });
        </script>
            
    </head>
    <body>
        <h1>MyCPD Hub</h1>

