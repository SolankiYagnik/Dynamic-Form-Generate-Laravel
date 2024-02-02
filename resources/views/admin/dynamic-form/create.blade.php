@extends('admin.layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <label></label>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Create Dynamic Form Builder</h5>
                </div>
                <div class="card-body">
                    <div id="fb-editor"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    jQuery(function($) {
      $(document.getElementById('fb-editor')).formBuilder({
        onSave: function(evt, formData) {
            console.log(formData);
            saveForm(formData)
        }
      });
    });

    function saveForm(form) {
        $.ajax({
            type: "post",
            header: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            },
            url: "{{ route('form-builder.store') }}",
            data: {
                'form' : form,
                "_token" : "{{ csrf_token() }}",
            },
            success: function(data) {
                location.href = "/form-builder";
                console.log(data);
            }
        });
    }
</script>
@endsection