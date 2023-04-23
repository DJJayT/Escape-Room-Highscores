class utilities {

    static postAjax(url, data, successCallback, callbackObject, errorCallback = function (response) {
        //TODO: Remove this -> this is only for debugging.
        console.log('error');
        console.log(response.responseText);
    }) {
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                successCallback(response, callbackObject);
            },
            error: function (response) {
                errorCallback(response, callbackObject);
            }
        });
    }

    static getAjax(url, successCallback, callbackObject, errorCallback = function () {
    }) {
        $.ajax({
            type: "GET",
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                successCallback(response, callbackObject);
            },
            error: function (response) {
                errorCallback(response, callbackObject);
            }
        });
    }

    static sleep(milliseconds) {
        return new Promise(resolve => setTimeout(resolve, milliseconds));
    }

}
