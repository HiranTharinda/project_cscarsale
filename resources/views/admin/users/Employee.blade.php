@extends('admin.layouts.adminapp') 

@section('content')
<div class="box-header">
        <div class="row">
            <div class="col-sm-8">
              <h3 class="box-title"> List Of Employees</h3>
            </div>
        </div>
            <!--<div class="col-sm-4">-->
            <div class="text-left">   
              <a class="btn btn-primary" href="/empAdd">Add new Employee</a>
           <p> </p>
           </div>
        </div>
   
<div class="card">
    <div class="card-body">
        <h5 class="card-title"></h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Tel no</th>
                        <th>ACtion</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $item)
                        <tr>
                            <td>{{ $item->first_name . $item->last_name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="/updateEmp">Update></a>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modal1">
                                    View 
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>
  
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Tel no</th>
                        <th>Position</th>
                        <th>Image</th>
                        <th>Action</th>
                            
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
 <!-- Modal  View  Employee-->
 <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Employee Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                       
                                                    
                         <form class="form-horizontal">
                                    <fieldset>
                                
                                                                                                      
                                        <!-- Text input-->
                                        <div class="form-group row">
                                            <label for="name" class=" col-sm-5 text-right control-label col-form-label">Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="name" readonly >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class=" col-sm-5 text-right control-label col-form-label">Address</label>
                                            <div class=" col-sm-6">
                                                <input type="text" class="form-control" id="address"readonly >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="dob" class=" col-sm-5 text-right control-label col-form-label">Date of birth</label>
                                            <div class=" col-sm-6">
                                                <input type="text" class="form-control" id="dob" readonly >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gender" class=" col-sm-5 text-right control-label col-form-label">Gender</label>
                                            <div class=" col-sm-6">
                                                <input type="text" class="form-control" id="gender" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="mobile" class=" col-sm-5 text-right control-label col-form-label">mobile</label>
                                            <div class=" col-sm-6">
                                                <input type="text" class="form-control" id="mobile" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class=" col-sm-5 text-right control-label col-form-label">Email</label>
                                            <div class=" col-sm-6">
                                                <input type="text" class="form-control" id="email" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="account" class=" col-sm-5 text-right control-label col-form-label">Bank Account Number</label>
                                                <div class=" col-sm-6">
                                                    <input type="text" class="form-control"  id="account" readonly>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="branch" class=" col-sm-5 text-right control-label col-form-label">Bank Branch</label>
                                                <div class=" col-sm-6">
                                                    <input type="text" class="form-control"   id="branch" readonly>
                                                </div>
                                        </div>
                                        
                                    
                
                                    <div class="form-group row">
                                        <label for="Position" class=" col-sm-5 text-right control-label col-form-label">Position</label>
                                        <div class=" col-sm-6">
                                            <input type="text" class="form-control"   readonly  id="line3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hiredate" class=" col-sm-5 text-right control-label col-form-label">Hired Date</label>
                                        <div class=" col-sm-6">
                                            <input type="text" class="form-control"  readonly id="hiredate">
                                        </div>
                                    </div>
                                    
                
                                        
                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class=" col-sm-3 text-right control-label col-form-label" for="submit_form"></label>
                                        <div class="col-md-4">
                                            <button id="Ok" name="Ok" class="btn btn-primary">OK</button>
                                        </div>
                                    </div>
                                        
                                </fieldset>
                        </form>
                            
                
            </div>
        </div>
    </div>
</div>



<!-- Modal  for delete -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title text-center" id="myModalLabel"></h4>
             </div>
         <form action=" " method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
         <div class="modal-body">
                <p class="text-center">
                    Are you sure you want to delete this?
                </p>
                <input type="hidden" name="category_id" id="cat_id" value="">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
            <button type="submit" class="btn btn-warning">Yes, Delete</button>
        </div>
    </form>
        </div>
    </div>
</div>




 <!-- this page js -->
 @section('table-script')        
         <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
         <script src="/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
         <script src="/assets/extra-libs/DataTables/datatables.min.js"></script>
         <script>
             /****************************************
              *       Basic Table                   *
              ****************************************/
             $('#zero_config').DataTable();
         </script>
         <script src="/assets/libs/toastr/build/toastr.min.js"></script>
  @endsection
 @endsection