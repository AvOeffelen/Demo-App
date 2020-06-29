<div class="row">
    <div class="col-md-12">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title"></h3>
                <div class="text-right">

                </div>
            </div>
            <div class="block-content">
                <form>
                    <div class="row py-3">
                        <div class="col-md-6">
                            <label for="title">Workshop naam</label>
                            <input type="text" class="form-control" name="title"/>
                        </div>
                        <div class="col-md-6">
                            <label for="example-hosting-vps">Workshop categorie</label>
                            <select class="custom-select" id="example-hosting-vps" name="example-hosting-vps">
                                <option value="0">Fysieke vitaliteit</option>
                                <option value="1">Mentale vitaliteit</option>
                                <option value="2">Ontwikkeling</option>
                            </select>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-6">
                            <label for="example-flatpickr-custom">Start datum</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="example-flatpickr-custom" name="example-flatpickr-custom" placeholder="02-02-2020" data-date-format="d-m-Y">
                        </div>
                        <div class="col-md-6">
                            <label for="example-flatpickr-custom">Eind datum</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="example-flatpickr-custom" name="example-flatpickr-custom" placeholder="02-02-2020" data-date-format="d-m-Y">
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Afbeelding</label>
                                <div class="custom-file">
                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                    <input type="file" class="custom-file-input custom-file-input-alt" data-toggle="custom-file-input"
                                           id="example-file-input-custom" name="example-file-input-custom">
                                    <label class="custom-file-label" for="example-file-input-custom">Selecteer afbeelding</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-12">
                            <label for="text-intro">Omschrijving</label>
                            <textarea id="js-ckeditor" name="text-intro"></textarea>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-12">
                            <label for="agenda-link">Agenda link</label>
                            <textarea id="js-ckeditor" name="agenda-link" class="ckeditor"></textarea>
                        </div>
                    </div>
                </form>
                <div class="row py-3">
                    <div class="col-md-12">
                        <div class="text-right">
                            <button class="btn btn-alt-danger btn-sm">Reset</button>
                            <button class="btn btn-alt-danger btn-sm">Annuleer</button>
                            <button class="btn btn-primary btn-sm">Bekijk voorbeeld</button>
                            <button class="btn btn-alt-success btn-sm">Opslaan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
