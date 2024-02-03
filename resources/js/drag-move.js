// ドラッグ開始時
const onDragStart = (event) => {
    event.dataTransfer.setData("text/plain", event.target.id);
    event.dataTransfer.dropEffect = "move";
};

// ドロップしたとき
const onDrop = (event) => {
    const items = [...document.querySelectorAll(".drag-target")];
    if (items.indexOf(event.currentTarget) === 0) {
        // リストの先頭に追加する
        event.currentTarget.before(
            document.getElementById(event.dataTransfer.getData("text"))
        );
    } else {
        // 対象の後ろに追加する
        event.currentTarget.after(
            document.getElementById(event.dataTransfer.getData("text"))
        );
    }

    const category_list = [...document.querySelectorAll(".drag-target")].map(
        (element) => Number(element.id)
    );
    const csrfToken = document.head.querySelector(
        'meta[name="csrf-token"]'
    ).content;

    // ユーザIDを取得
    fetch("api/user", {
        method: "GET",
        credentials: "include",
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": csrfToken,
        },
    })
        .then((response) => response.json())
        .then((data) => data.id)
        // 取得したユーザIDを使って並び順を保存
        .then((userId) => {
            fetch("/api/category-order", {
                method: "PATCH",
                credentials: "include",
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({
                    user_id: userId,
                    category_order: category_list,
                }),
            });
        });
};

// ドロップ対象に入ったとき
const onDragEnter = (event) => {
    // デフォルトで動作するイベントのキャンセル
    event.preventDefault();
};

// ドロップ対象を離れたとき
const onDragOver = (event) => {
    // デフォルトで動作するイベントのキャンセル
    event.preventDefault();
};

// イベントリスナーの追加
document.querySelectorAll(".drag-target").forEach((element) => {
    element.addEventListener("dragstart", onDragStart);
    element.addEventListener("drop", onDrop);
    element.addEventListener("dragenter", onDragEnter);
    element.addEventListener("dragover", onDragOver);
});
