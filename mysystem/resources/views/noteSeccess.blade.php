<script>
        @if(session()->has('message')) 
            toastr.success("Create Seccess")
        @endif
        @if(session()->has('message_update')) 
            toastr.success("Update Seccess")
        @endif
        @if(session()->has('message_delete')) 
            toastr.success("Delete Seccess")
        @endif
        @if($errors->any())
            toastr.error("Oh! there are something wrong!")
        @endif
</script>