<!-- User Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('service_id', 'Service Id:') !!}
    {!! Form::text('service_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Domain Field -->
<div class="form-group col-sm-12">
    {!! Form::label('domain', 'Domain:') !!}
    {!! Form::text('domain', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Mode Field -->
<div class="form-group col-sm-12">
    {!! Form::label('payment_mode', 'Payment Mode:') !!}
    {!! Form::text('payment_mode', null, ['class' => 'form-control']) !!}
</div>

<!-- Duration Field -->
<div class="form-group col-sm-12">
    {!! Form::label('duration', 'Duration:') !!}
    {!! Form::text('duration', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::text('created_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated By Field -->
<div class="form-group col-sm-12">
    {!! Form::label('updated_by', 'Updated By:') !!}
    {!! Form::text('updated_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Deleted By Field -->
<div class="form-group col-sm-12">
    {!! Form::label('deleted_by', 'Deleted By:') !!}
    {!! Form::text('deleted_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.registrantServices.registrantServices.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
