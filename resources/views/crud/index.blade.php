<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax CRUD Practice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="row">
        <div class="col-md-10 offset-md-1">

           
            <table class="table table-dark table-hover text-center msg">
                <h1 class="text-center">Information List</h1>
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success my-2"><i class="fa-solid fa-user-plus"></i> Add User</a>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="alldata">

                </tbody>
              </table>
        </div>
            
            <!-- Add User Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Input User Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">User Name</label>
                                <input type="text" class="form-control name" id="exampleInputName" aria-describedby="emailHelp">
                    
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control email" id="exampleInputEmail">
                            </div>
                            <div class="mb-3">
                                <label for="examplePhone" class="form-label">Phone</label>
                                <input type="phone" class="form-control phone" id="examplePhone">
                            </div>
                            <div class="mb-3">
                                <label for="exampleAddress" class="form-label">Address</label>
                                <input type="text" class="form-control address" id="exampleAddress">
                            </div>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" onclick="add()">Add User</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Modal -->
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateModalLabel">Update User Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="uname" class="form-label">User Name</label>
                                <input type="text" class="form-control name" id="uname" aria-describedby="emailHelp">
                    
                            </div>
                            <div class="mb-3">
                                <label for="uemail" class="form-label">Email</label>
                                <input type="email" class="form-control email" id="uemail">
                            </div>
                            <div class="mb-3">
                                <label for="uphone" class="form-label">Phone</label>
                                <input type="phone" class="form-control phone" id="uphone">
                            </div>
                            <div class="mb-3">
                                <label for="uaddress" class="form-label">Address</label>
                                <input type="text" class="form-control address" id="uaddress">
                            </div>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" onclick="update()">Add User</button>
                        </div>
                    </div>
                </div>
            </div>
            
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
            function show(){
                $.ajax({
                    url:"{{route('store_user')}}",
                    type:"GET",
                    dataType:"JSON",
                    success:function(response){
                        if(response.status=="success"){
                            var allData="";
                            var successCount = 1;
                            $.each(response.alldata, function(key, item){
                                allData += '<tr id="delete'+item.id+'">\
                                <td>'+successCount+++'\
                                <td>'+item.name+'\
                                <td>'+item.email+'</td>\
                                <td>'+item.phone+'</td>\
                                <td>'+item.address+'</td>\
                                <td>\
                                    <button data-toggle="modal" data-bs-target="#updateModal" id="'+item.id+'" class="updateId btn btn-info btn-sm"> <i class="fa fa-edit"></i> </button>\
                                    <button data-toggle="modal" data-bs-target="#delete" value="'+item.id+'" class="deleteId btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </button>\
                                </td>\
                                </tr>';
                            });
                            $(".alldata").html(allData);
                                
                            
                        }
                        else if(response.status=="404"){
                            alert("Error 404: Data Not Found");
                        }
                    }
                });
            }
            show();
          function add(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                var name = $(".name").val();
                var email = $(".email").val();
                var phone = $(".phone").val();
                var address = $(".address").val();

                $.ajax({
                    url:"{{route('add_user')}}",
                    type:'GET',
                    datatype:'JSON',
                    data:{
                        name:name,
                        email:email,
                        phone:phone,
                        address:address
                    },
                    success:function(response){
                        if(response["msg"]=="104"){
                            $('#exampleModal').modal('hide');
                            $(".msg").html('<div class="alert alert-danger">Data Not Submited</div>')
                            $(".msg").fadeOut(1000);
                            
                        }
                        else if(response.msg=="success"){
                            
                            $('#exampleModal').modal('hide');
                            show();
                            Swal.fire(
                            'Successfully Added!',
                            'Your file has been added.',
                            'success'
                            )
                            
                        }
                    }
                    
                });
                

            }

            jQuery(document).on("click", ".updateId", function(){
  
            });

            jQuery(document).on("click", ".deleteId", function(){
                var id=jQuery(this).val();
                Swal.fire({
                title: 'Are you sure?',
                background: '#080808',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#266e3b',
                cancelButtonColor: '#d1182f',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "GET",
                        dataType: "JSON",
                        url: "{{ route('delete_user') }}",
                        data: {id:id},
                        success: function (response) {
                        $("#delete"+id).remove();
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        );
                        }
                    });
                }
                })
            })
    </script>
</body>
</html>