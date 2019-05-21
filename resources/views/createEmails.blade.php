@extends('layouts.app')

@section('content')


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


    <form action="create-email" method="POST">
      {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Add Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <button type="submit" id="insert" class="btn btn-primary">Add</button>
    </form>

   
         {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add New Email
         </button>
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Send Email
         </button>
                --}}
    
         {{--  <div id="emails">
            <table id="dataTable" border="0">
				   <th colspan="5">Members</th>

				   <tr>
                  
                  <td>Email</td>
               
               </tr>

				   @foreach($emails as $value)
				   
                  <tr>
                     <td>{{$value->email}}</td>
                  </tr>

	   			@endforeach
   			</table>
         </div>  --}}

        <br>
        <br>
         <script type="text/javascript">

            $('#insert').click(function(){
               
					$.ajax({
						type:'post',
						url: 'create-email',
						data:{
							
                     '_token':$('input[name=_token').val(),
							'email':$('input[name=email').val(),

						},
						success:function(data){
							window.location.reload();
						},
					});
				});

        </script>

@endsection