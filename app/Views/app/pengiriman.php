<div class="container mt-4" >
    <div class="card">
        <div class="card-header">
            Proses Pengiriman
        </div>
        <div class="card-body">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label class="col-form-label">Province</label>
                </div>
                <div class="col-auto">
                    <select name="provinsi"  class="form-control" id="provisi_id">
                        <option value="0">&mdash;&mdash;Provice&mdash;&mdash;</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $.get('<?php echo site_url('app/ongkir'); ?>?mode=Province',function(data){
        var html = '<option value="0">&mdash;&mdash;Provice&mdash;&mdash;</option>';
        for(let i=0; i< data.length; i++){
            html += '<option value="'+data[i].province_id+'">'+data[i].province+'</option>';
        }
        $('#provisi_id').html(html);
    });
});
</script>