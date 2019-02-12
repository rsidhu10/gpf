@if (Session()->has('success'))
    <div class="alert alert-success" role="alert" style="margin-top: 2px;">
        <strong>Success:</strong> {{ Session()->get('success') }}
    </div>
@endif 