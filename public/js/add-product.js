
$(document).ready(function () {
    $('#plusIcon').on('click',function () {
        const colors = $('#colorMultiSelect option');
        let colorOption = '';
        for (let i = 0; i < colors.length; i++){
            colorOption =colorOption + `<option value="${colors[i].value}">${colors[i].text}</option>`;
        }
        $('#sub-image-field').append(`
        <div class="form-inline d-flex justify-content-between">
                                                    <input type="file" id="image" class="form-control" name="images[]">
                                                    <div class="color form-inline">
                                                        <label for="colorMultiSelect2" class="mr-2">Select Image Color</label>
                                                        <select id="colorMultiSelect2" class="form-control" name="color[]">
                                                            <option value="">Select Color</option>
                                                            ${colorOption}
                                                        </select>
                                                    </div>
                                                </div>

        `);
    })

});
