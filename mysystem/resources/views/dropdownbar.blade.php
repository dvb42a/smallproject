
        <script>
            $(document).ready(function() {
                var $btn = $('<button></button>');    //  Create a new jQuery object
                var $one = $('div#dropdown');
                $(".ttt").hide();
                $one.after($('btn').clone());    // Add text and clone the element
            })
            function btnOpen(panelID) {

                $("#" + panelID).toggle("slow"); 

            }

</script>