function Get(method, data) {
    let xhr, params;

    xhr = new XMLHttpRequest();
    xhr.open(method, URL);
    xhr.setRequestHeader("Content-type", "application/json");
    params = JSON.stringify({
        get: true,
        arr: data,
    });
    xhr.send(params);

    xhr.onload = function() {
        if (xhr.status !== 200) {
            alert(`Ошибка ${xhr.status}: ${xhr.statusText}`);
        }
    }
}

const URL = 'get.php';
const data = [1, true, 'string'];
Get('POST', URL, data);