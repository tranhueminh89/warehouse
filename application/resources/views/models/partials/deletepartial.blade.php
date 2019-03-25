<div class="vodal" id="delete-popup" style="display: none;">
    <div class="vodal-mask"></div>
    <div class="vodal-dialog" style="width: 400px; height: 240px;"><span class="vodal-close"></span>
        <h1 class="text-center">Delete Confirmation</h1>
        <hr>
        <!---->
        <div style="padding: 20px;">
            Are you sure you want to delete this item?
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-flat bg-green btn-block" id="btn-yes">Yes</button>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-flat bg-red btn-block" id="btn-no">No</button>
            </div>
        </div>
    </div>
</div>
@section('jquery')
<script>
    $(document).ready(function () {
        var data_url = "";
        var popup = $("#delete-popup");

        $('.open-popup-link').click(function () {
            popup.show();
            data_url = $(this).data('url');
        });

        $('.vodal-close, #btn-no').click(function () {
            popup.hide();
        });

        $('#btn-yes').click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.Laravel.csrfToken
                }
            });
            $.ajax({
                url: data_url,
                type: 'delete',  // user.destroy
                success: function(result) {
                    location.reload();
                }
            });
        })
    });
</script>
@endsection