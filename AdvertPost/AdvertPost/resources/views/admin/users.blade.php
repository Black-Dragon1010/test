@extends('admin.layouts.app')
@section('page-styles')
<!-- <link rel="stylesheet" type="text/css" href="{{asset('admin/css/jquery.dataTables.css')}}"> -->
<link type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.css" rel="stylesheet" />
<link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="icon fa fa-users "></i> Users</h1>
            <p>Enyxa.hu- Users Administration page</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a>Users</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Users</h4>
                    <p><b>{{$user_counts}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-check-circle-o fa-3x"></i>
                <div class="info">
                    <h4>Allowed Users</h4>
                    <p><b>{{$allowed_counts}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-angellist fa-3x"></i>
                <div class="info">
                    <h4>New Users</h4>
                    <p><b>{{$new_counts}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-hand-paper-o fa-3x"></i>
                <div class="info">
                    <h4>Blocked Users</h4>
                    <p><b>{{$blocked_counts}}</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="background:white; padding:0.5em">
        <form id="frm-example" action="/path/to/your/script.php" method="POST">
            <table id="user_table" class="display"  width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>$170,750</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>$86,000</td>
                    </tr>
                </tbody>
                
            </table>
            <p><button>Submit</button></p>
        </form>
    </div>
</main>
@endsection
@section('page-scripts')

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.js"></script>
<script type="text/javascript" src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script>
$(document).ready( function () {
    var table = $('#user_table').DataTable({     
        'columnDefs': [
            {
                'targets': 0,
                'checkboxes': {
                'selectRow': true
                }
            }
        ],
        'select': {
            'style': 'multi'
        },
        'order': [[1, 'asc']]
    });
    // Handle form submission event 
   $('#frm-example').on('submit', function(e){
      var form = this;
      
      var rows_selected = table.column(0).checkboxes.selected();

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });

      // FOR DEMONSTRATION ONLY
      // The code below is not needed in production
      
      // Output form data to a console     
      $('#example-console-rows').text(rows_selected.join(","));
      
      // Output form data to a console     
      $('#example-console-form').text($(form).serialize());
       
      // Remove added elements
      $('input[name="id\[\]"]', form).remove();
       
      // Prevent actual form submission
      e.preventDefault();
   });   
} );
</script>
<style>
    #user_table th{
        width:0!important;
    }
    </style>
@endsection