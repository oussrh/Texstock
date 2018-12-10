<form method="post" id="importCSV" action="forms_query/csv_convert_query.php" name="upload_excel" enctype="multipart/form-data">
  <fieldset>
    <legend>Importez vos produits depuis un fichier CSV&nbsp;<span data-toggle="tooltip" data-placement="bottom" title="|codeBarre|descption|Qualite|Poids|." class="glyphicon glyphicon-info-sign"></span></legend>
    <!-- File Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="filebutton">Select File</label>
        <div class="col-md-4">
            <input type="file" name="file" id="file" class="input-large">
        </div>
    </div>

    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton">Import produits</label>
        <div class="col-md-4">
            <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
        </div>
    </div>
  <fieldset>
</form>
