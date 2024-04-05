@if (session()->has("success"))
<div class="alert alert-info text-center w-50">
    {{session()->get("success")}}
</div>

@endif
