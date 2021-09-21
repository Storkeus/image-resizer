<form class="form" action="post" enctype="multipart/form-data">
    <div class="form__input-group">
        <label class="form__label" for="UploadImagesInput">Upload images:</label>
        <input class="form__input form__input--file" type="file" name="images" id="UploadImagesInput" multiple>
    </div>
    <div class="form__input-group">
        <span class="form__input-group-title">Resize method:</span>
        <label class="form__label form__label--small"> <input data-show=".form__input-group--percent-change" class="form__input form__input--radio" required type="radio" name="resize-method"> Percent change</label>
        <div class="form__input-group form__input-group--percent-change">
            <label class="form__label form__label--small" for="PercentChangeValueInput">Percent change value:</label>
            <div class="form__input-container">
                <input class="form__input form__input--file" type="number" min="1" max="100" value="50" step="1" name="percent-change-value" id="PercentChangeValueInput" multiple> %
            </div>
        </div>
        <label class="form__label form__label--small"> <input data-show=".form__input-group--specify-size" required class="form__input form__input--radio" type="radio" name="resize-method"> Specific size</label>
        <div class="form__input-group form__input-group--specify-size">
            <label class="form__label form__label--small" for="WidthInput">Width:</label>
            <div class="form__input-container">
                <input class="form__input form__input--file" type="number" min="1" value="500" step="1" name="width" id="WidthInput" multiple> px
            </div>
        </div>
        <div class="form__input-group form__input-group--specify-size">
            <label class="form__label form__label--small" for="HeightInput">Height:</label>
            <div class="form__input-container">
                <input class="form__input form__input--file" type="number" min="1" value="500" step="1" name="height" id="HeightInput" multiple> px
            </div>
        </div>

        <button class="form__submit">Resize</button>

    </div>
</form>