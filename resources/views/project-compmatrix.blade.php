<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style type="text/css">
    .empty{
        position: absolute;
        width: 350px;
        height: 33px;
        left: 428px;
        top: 115px;

        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 24px;
        line-height: 33px;
        color: #000000;
    }
</style>
<body>
<!--     @php
        if ($lists === null) {
    @endphp
        <div class="empty">Comparison Matrix is Empty !!</div> -->
<!--     @php
        } else {
    @endphp -->
        <table class="table-element">
        <thead class="title-table-style">
            <th width="250px">Name</th>
            <th width="300px">Created by</th>
            <th width="150px">Created at</th>
            <th width="20px"></th>
            <th width="10px"></th>
        </thead>
        <tbody>
            <tr class="list-element-style">
                <input type="hidden" class="serdelete_val_id" value="">
                <td width="100px" height="50px"><a href="">Comparison Matrix</a></td>
                <td width="100px" height="50px"></td>
                <td width="100px" height="50px"></td>
                <!-- <td width="20px">
                    <a type="button" data-toggle="modal" data-target="#DeleteModal" class=""> 
                        <img src="{{asset('image/edit-icon.png')}}" width="16" height="16">
                    </a>
                </td> -->
                <td width="10px">
                    <a type="button" class="servideletebtn"> 
                        <img src="{{asset('image/trash-icon.png')}}" width="14" height="16">
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
<!--     @php
        }
    @endphp -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--     <script>
         $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.servideletebtn').click(function (e) {
                e.preventDefault();

                var delete_id = $(this).closest("tr").find('.serdelete_val_id').val();
                //alert(delete_id);
                swal({
                  title: "Are you sure?"+delete_id,
                  text: "Once deleted, you will not be able to recover this Data!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    var data = {
                        "_token": $('input[name=_token]').val(),
                        "id": delete_id,
                    };

                    $.ajax({
                        type: "DELETE",
                        url: "/project_comparison_delete/"+delete_id,
                        data: data,
                        success: function(response) {
                            swal(response.status, {
                                  icon: "success",
                            })
                            .then((result) => {
                                location.reload();
                            });
                        }
                    });
                  }
                });
            })
        })
    </script> -->
</body>
</html>