import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// const clearInput = () => {
//     const input = document.getElementsByTagName("input")[0];
//     input.value = "";
// }

// const clearBtn = document.getElementById("clear-btn");
// clearBtn.addEventListener("click", clearInput);

/**
* Chosen: Multiple Dropdown
*/
/*for without holding ctrl/command key*/

$('option').mousedown(function (e) {
    e.preventDefault();
    var originalScrollTop = $(this).parent().scrollTop();
    console.log(originalScrollTop);
    $(this).prop('selected', $(this).prop('selected') ? false : true);
    var self = this;
    $(this).parent().focus();
    setTimeout(function () {
        $(self).parent().scrollTop(originalScrollTop);
    }, 0);

    return false;
});