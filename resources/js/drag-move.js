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
