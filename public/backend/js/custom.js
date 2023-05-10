$(document).ready(function () {
    let alert = document.getElementById('alert-toast');
    if (!alert) return;

    toastr[alert.dataset.type](alert.dataset.message);
});
