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
                    </tr>
                </thead>
                <tbody class="alldata">

                </tbody>
              </table>
        </div>
            
            <!-- Modal -->
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
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                                allData += '<tr>\
                                <td>'+successCount+++'\
                                <td>'+item.name+'\
                                <td>'+item.email+'</td>\
                                <td>'+item.phone+'</td>\
                                <td>'+item.address+'</td>\
                                </tr>';
                            });
                            jQuery(".alldata").html(allData);
                                
                            
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
                            jQuery(".msg").html('<div class="alert alert-danger">Data Not Submited</div>')
                            jQuery(".msg").fadeOut(1000);
                            
                        }
                        else if(response.msg=="success"){
                            show();
                            $('#exampleModal').modal('hide');
                            jQuery(".msg").html('<div class="alert alert-success">Data Submited</div>');
                            jQuery(".msg").fadeOut(1000);
                        }
                    }
                });
            }
    </script>
</body>
</html>