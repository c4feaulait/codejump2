$(function () {
    /*=================================================
    ハンバーガーメニュー
    ===================================================*/
    // ハンバーガーメニューのクリックイベント
    $('.toggle_btn').on('click', function () {
        // #headerにopenクラスが存在する場合
        if ($('#header').hasClass('open')) {
            // openクラスを削除
            // openクラスを削除すると、openクラスのCSSがはずれるため、
            // メニューが非表示になる
            $('#header').removeClass('open');

            // #headerにopenクラスが存在しない場合
        } else {
            // openクラスを追加
            // openクラスを追加すると、openクラスのCSSが適応されるため、
            // メニューが表示される
            $('#header').addClass('open');
        }
    });

    // メニューが表示されている時に画面をクリックした場合
    $('#mask').on('click', function () {
        // openクラスを削除して、メニューを閉じる
        $('#header').removeClass('open');
    });
});


function onClickDropDownButton(event) {
    const dropdown = event.target.closest(".dropdown"); // ①
    const rect = event.target.getBoundingClientRect(); // ②

    const dropdownLayer = dropdown.querySelector(".dropdown__menu-layer"); // ③
    const dropdownMenu = dropdown.querySelector(".dropdown__menu");

    dropdownMenu.style.top = `${rect.top + rect.height - 1}px`;　 // ④
    dropdownMenu.style.left = `${rect.left}px`;
    dropdownMenu.style.minWidth = `${rect.width}px`;

    dropdownLayer.classList.add("dropdown__menu-layer--show");　 // ⑤
}

/* ⑥ */
function onClickDropdownOutside(event) {
    event.target.classList.remove("dropdown__menu-layer--show");
}

function onClickDropdownMenuItem(event) {
    const value = event.currentTarget.dataset.value; // ⑦
    const label = event.currentTarget.innerText; // ⑦

    const dropdownLayer = event.target.closest(".dropdown__menu-layer");
    const dropdown = event.target.closest(".dropdown");
    const button = dropdown.querySelector(".dropdown__btn");
    button.innerText = label; // ⑧


    const select = document.getElementById("select");
    // select.value = "1";
    select.value = value;

        console.log(value);

    /* ⑨ */
    const items = dropdown.getElementsByClassName("dropdown__item");
    for (let i = 0; i < items.length; i++) {
        const item = items[i];
        item.classList.remove("dropdown__item--active");
    }
    event.currentTarget.classList.add("dropdown__item--active");

    dropdownLayer.classList.remove("dropdown__menu-layer--show"); // ⑩
}


