<!--
@Autor Brayan AceboTo change this template, choose Tools | Templates
@Autor Brayan Aceboand open the template in the editor.
-->
<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
    </head>
    <body>

        <script type="text/javascript" src="jquery-1.3.2.js" ></script>
        <script type="text/javascript" src="jquery-ui-1.7.2.custom.min.js" ></script>

        
        <table>
            <thead>
                <tr>
                <th>pos</th>
                <th>text</th>
                </tr>
            </thead>
            <tbody id="contentLeft">
                <tr><td>1</td><td>asd1</td></tr>
                <tr><td>2</td><td>asd2</td></tr>
                <tr><td>3</td><td>asd3</td></tr>
            </tbody>
        </table>
        <script type="text/javascript">
              $(document).ready(function(){
                     $(function() {
                            $("#contentLeft").sortable({ 
                                   opacity: 0.6, cursor: 'move', update: function(){
                                          var order = $(this).sortable("serialize") + '&action=updateRecordsListings';
//                                          $.post("updateDB.php", order, function(theResponse){
                                              //$("#contentRight").html(theResponse);
                                              //alert(theResponse);   
//                                          });
                                      }
                            });
                     });
              });
        </script>
    </body>
</html>
