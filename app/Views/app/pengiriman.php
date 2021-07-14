<div class="container mt-4" >
    <div class="card">
        <div class="card-header">
            Proses Pengiriman
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>Shipment Origin:</legend>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label" style="text-align: right;">Province</label>
                                <div class="col-sm-9">
                                    <select name="province_origin" id="provisi_origin" class="form-control" readonly>
                                        <option selected value="5">DI Yogyakarta</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label  class="col-sm-3 col-form-label" style="text-align: right;">Kota</label>
                                <div class="col-sm-9">
                                    <select name="province_origin" id="provisi_origin" class="form-control" readonly>
                                        <option selected value="39">Kabupaten Bantul</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label  class="col-sm-3 col-form-label" style="text-align: right;">Kode Pos</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly value="55700" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label  class="col-sm-3 col-form-label" style="text-align: right;">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" readonly>Jl. Swadaya 5, No.30</textarea>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>Shipment Destination</legend>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label" style="text-align: right;">Province</label>
                                <div class="col-sm-9">
                                    <select name="province" id="provisi_id" class="form-control">
                                        <option value="0">&mdash;&mdash;Provice&mdash;&mdash;</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-sm-3 col-form-label" style="text-align: right;">City</label>
                                <div class="col-sm-9">
                                    <select name="city" id="city_id" class="form-control">
                                        <option value="0">&mdash;&mdash;City&mdash;&mdash;</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-sm-3 col-form-label" style="text-align: right;">Weight</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="text" id="weight" name="weight" class="form-control" value="1" readonly>
                                        <span class="input-group-text"> KG </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-sm-3 col-form-label" style="text-align: right;">Kurir</label>
                                <div class="col-sm-9">
                                    <select name="kurir" id="kurir" class="form-control">
                                        <option value="0" selected>&mdash;&mdash;Kurir&mdash;&mdash;</option>
                                        <option value="jne">JNE</option>
                                        <option value="pos">POS</option>
                                        <option value="tiki">TIKI</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-sm-3 col-form-label" style="text-align: right;">Paket</label>
                                <div class="col-sm-9" id="paket_radio">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-sm-3 col-form-label" style="text-align: right;">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-sm-3 col-form-label" style="text-align: right;">Ongkir</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"> RP </span>
                                        <input type="text" name="ongkir" id="ongkir" class="form-control" value="" readonly>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted" style="text-align: right;">
            <button class="btn btn-danger" id="btn_back">Back</button>
            <button class="btn btn-primary" id="btn_proses_bayar">Proses Pembayaran</button>
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

    //isi cmb kabupaten
    $('#provisi_id').change(function(){
        let province = $(this).val();

        $.get('<?php echo site_url('app/ongkir'); ?>?mode=City&province='+province,function(data){
            var html = '<option value="0">&mdash;&mdash;City&mdash;&mdash;</option>';
            for(let i=0; i< data.length; i++){
                html += '<option value="'+data[i].city_id+'">'+data[i].type+'-'+data[i].city_name+'</option>';
            }
            $('#city_id').html(html);
        });
    })

    $.fn.onSetBiaya = function() {
        let biaya = $(this).val();
        $("#ongkir").val(biaya)
    }

    $('#kurir').change(function(){
        let destination = $('#city_id').val();
        let kurir = $("#kurir").val();

        $.get('<?php echo site_url('app/ongkir'); ?>?mode=Cost&destination='+destination+'&kurir='+kurir,function(data){
            var html = '';
            let costs = data[0].costs;
            for(let i=0; i< costs.length; i++){
                html += '<div class="form-check">';
                html += '<input onClick="$(this).onSetBiaya()" name="biaya" value="'+costs[i].cost[0].value+'" class="form-check-input" type="radio">';
                html += '<label class="form-check-label" >'+ costs[i].description + '|'+ costs[i].cost[0].etd +" Hari"
                html += '</label>';
                html += '</div>';
            }
            $('#paket_radio').html(html);
        });
    })


    $('#btn_back').click(function(){
        window.location.href = '<?php echo site_url('app/keranjang'); ?>'
    })

    $('#btn_proses_bayar').click(function(){
        window.location.href = '<?php echo site_url('app/pembayaran'); ?>'
    })
});
</script>