Vue.prototype.$api = function (method, url, data, success, fail, silent) {
    let vm = this;
    axios[method](url, data).then(function (response) {
        if (!silent) {
            vm.$root.$emit('flash.add', {
                uid: 'api-call',
                message: response.data.message,
                type: 'alert-success'
            });
        }
        if (success) success(response);
    })
        .catch(function (error) {
            if (!silent) {
                vm.$root.$emit('flash.add', {
                    uid: 'api-call',
                    message: error.response.statusText,
                    type: 'alert-error'
                });
            }
            if (fail) fail(error);
        });
};
