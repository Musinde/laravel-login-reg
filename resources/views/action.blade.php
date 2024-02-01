<!-- Edit Modal -->
<div class="modal fade" id="edit{{$member->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit Member</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{url('/update/'.$member->id)}}">
                @csrf
                    <div class="mb-3">
                        {!! Form::label('Fullname', 'Fullname') !!}
                        {!! Form::text('Fullname', $member->Fullname, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('Email', 'Email') !!}
                        {!! Form::text('Email', $member->Email, ['class' => 'form-control']) !!}
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            {{Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit'])}}
</form>
        </div>
    </div>
  </div>
</div>
 
<!-- Delete Modal -->
<div class="modal fade" id="delete{{$member->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Delete Member</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="DELETE" action="{{url('/delete/'.$member->id)}}">
            @csrf
                <h4 class="text-center">Are you sure you want to delete Member?</h4>
                <h5 class="text-center">Name: {{$member->fullname}} </h5>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            {{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
</form>
        </div>
    </div>
  </div>
</div>