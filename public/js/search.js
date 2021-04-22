$(document).ready(function () {
    let searchBtn = $('#searchBtn');
    searchBtn.on('click',function (e) {
        let searchText = $('#searchText').val();
        if (searchText === ''){
            e.preventDefault();
        }
    });
});
