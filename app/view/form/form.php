<form autocomplete="off" class="form" action="image" method="post" enctype="multipart/form-data">
    <div class="form__input-group">
        <label class="form__label" for="UploadImagesInput">Upload images:</label>
        <input class="form__input form__input--file" type="file" required name="images[]" accept="image/png, image/jpeg" id="UploadImagesInput" multiple>
    </div>
    <div class="form__input-group">
        <span class="form__input-group-title">Resize method:</span>
        <label class="form__label form__label--small"> <input value="percent-change" data-show-group="percent-change" class="form__input form__input--radio" required type="radio" name="resize-method"> Percent change</label>
        <div data-show-group="percent-change" class="form__input-group form__input-group--hidden">
            <label class="form__label form__label--small" for="PercentChangeValueInput">Percent change value:</label>
            <div class="form__input-container">
                <input class="form__input " type="number" min="1" max="100" value="50" step="1" disabled name="percent-change-value" id="PercentChangeValueInput" required> %
            </div>
        </div>
        <label class="form__label form__label--small"> <input value="specific-size" data-show-group="specify-size" required class="form__input form__input--radio" type="radio" name="resize-method"> Specific size</label>
        <div data-show-group="specify-size" class="form__input-group form__input-group--hidden">
            <label class="form__label form__label--small" for="WidthInput">Width:</label>
            <div class="form__input-container">
                <input class="form__input " type="number" min="1" value="500" max="2000" step="1" name="width" disabled id="WidthInput" required> px
            </div>
        </div>
        <div data-show-group="specify-size" class="form__input-group form__input-group--hidden">
            <label class="form__label form__label--small" for="HeightInput">Height:</label>
            <div class="form__input-container">
                <input class="form__input " type="number" min="1" value="500" max="2000" step="1" name="height" disabled id="HeightInput" required> px
            </div>
        </div>

        <button class="form__submit">Resize</button>

    </div>
</form>