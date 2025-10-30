<script type="text/javascript" src="<?php echo base_url("assets/js/bootbox.all.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.mask.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/currency.js"); ?>" ></script>
<style>
    .content {
        padding: 5px;
    }
    .container-fluid {
        padding-left:5px;
        padding-right: 5px;
    }
    fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1em 1em 1em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow: 0px 0px 0px 0px #000;
        box-shadow: 0px 0px 0px 0px #000;
        margin-top: 10px !important;
    }

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width: auto;
        padding: 0 10px;
        border-bottom: none;
        margin-top: -15px;
        background-color: white;
        color: black;
    }
    .control-label {
        margin-top:11px;
    }

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Paket Tour</div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="exampleInputName2" class="col-sm-2 control-label">Nama Paket</label>
                            <div class="col-sm-3">
                                <select class="form-control">
                                    <option>Paket Umrah Standard</option>
                                    <option>Paket Umrah Plus + Turki</option>
                                    <option>Paket Umrah Plus + Dubai</option>
                                </select>
                            </div>
                            <label for="exampleInputEmail2" class="col-sm-1 control-label">Harga</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control col-sm-2 money" id="txthrg" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                            </div>
                            <button type="submit" class="btn btn-success col-sm-2">Save</button>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2" class="col-sm-2 control-label">Asuransi</label>
                            <label class="col-sm-3" style="margin-top: 10px;">
                                <input type="checkbox" class="control-label" checked>
                            </label>
                            <label for="exampleInputEmail2" class="col-sm-1 control-label" >Catatan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control col-sm-2" id="txtcatatan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Transportation</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Airlines</label>
                            <div class="col-sm-8">
                                <select class="form-control">
                                    <option>Garuda Indonesia</option>
                                    <option>SAudi Airlines</option>
                                    <option>Lion Air</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Bus</label>
                            <div class="col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Kereta</label>
                            <div class="col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Handling at Saudi</label>
                            <div class="col-sm-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked>Domestik
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked>International
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Ons</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4">Lounge</label>
                            <label class="col-sm-1">
                                <input type="checkbox" checked>
                            </label>
                            <div class="col-sm-7">
                                <select class="form-control">
                                    <option>Indonesia Sky</option>
                                    <option>SAudi Airlines</option>
                                    <option>Lion Air</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Visa Umrah</label>
                            <div class="col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Manasik</label>
                            <div class="col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Full Perlengkapan</label>
                            <div class="col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Accommodation</div>
                    <div class="panel-body">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Makkah</legend>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="exampleInputName2" class="col-sm-2 control-label">Hotel</label>
                                    <div class="col-sm-6">
                                        <select class="form-control">
                                            <option>Zamzam Pulman </option>
                                            <option>Marriot</option>
                                        </select>
                                    </div>
                                    <label for="exampleInputEmail2" class="col-sm-2 control-label">Hari</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="txthrg" value="">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Madinah</legend>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="exampleInputName2" class="col-sm-2 control-label">Hotel</label>
                                    <div class="col-sm-6">
                                        <select class="form-control">
                                            <option>Rave </option>
                                            <option>Madden</option>
                                        </select>
                                    </div>
                                    <label for="exampleInputEmail2" class="col-sm-2 control-label">Hari</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="txthrg" value="">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Tour Tambahan</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Lokasi Tour </label>
                            <div class="col-sm-8">
                                <select class="form-control">
                                    <option>THAIF</option>
                                    <option>BADAR</option>
                                    <option>MADAIN SALEH</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div><!-- /.container-fluid -->
<script type="text/javascript">
$(document).ready(function() {
    // $('#expumum').DataTable();
    // $('#expcorporate').DataTable();
} );
$('.money').mask('000,000,000,000,000', {reverse: true});
</script>
