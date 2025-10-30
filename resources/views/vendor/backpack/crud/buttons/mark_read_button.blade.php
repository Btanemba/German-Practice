@if(!$entry->is_read)
<a href="{{ url($crud->route.'/'.$entry->getKey().'/mark-read') }}"
   class="btn btn-sm btn-warning"
   title="Mark as Read">
    <i class="la la-check"></i> Mark Read
</a>
@else
<span class="btn btn-sm btn-success disabled">
    <i class="la la-check"></i> Read
</span>
@endif
