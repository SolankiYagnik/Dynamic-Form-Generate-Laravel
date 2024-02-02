<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-render.min.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('user.saveForm') }}" method="POST">
                        @csrf
                        <input type="number" id="form_id" name="form_id" hidden/>
                        <div id="fb_reader"></div>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $.ajax({
                type: "get",
                header: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                },
                url: "{{ route('get.form.builder') }}",
                data: {
                },
                success: function(data) {
                    $("#form_id").val(data.id);
                    $("#fb_reader").formRender({
                        formData: data.form
                    });
                }
            });
        });
    </script>
</x-app-layout>
