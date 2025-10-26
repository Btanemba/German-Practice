
<a href="{{ url($crud->route.'/create') }}" class="btn modern-create-btn" style="
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    transition: all 0.3s ease;
" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(102, 126, 234, 0.4)'"
   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(102, 126, 234, 0.3)'">
    <i class="fa fa-plus-circle"></i>
    Add New Practice Material
</a>

<style>
    .modern-create-btn:hover {
        color: white !important;
        text-decoration: none !important;
    }

    /* Hide the default create button */
    .btn[href*="/create"]:not(.modern-create-btn) {
        display: none !important;
    }
</style>
