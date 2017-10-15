
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


$(document).ready(function(){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');

    $("#acceptStorageUpgrade").click(function () {
        $.ajax({
            type: "POST",
            url: "/ajax/storage/storageUpgrade",
            data: {_token: csrf_token},
            success: function (res) {
                if (res['status'] !== "warning") {
                    var storage = res['storage'];
                    $("#storageSize").html(storage['length']);
                    $(".storage-name").each(function () {
                        $(this).html(storage['name']);
                    });

                    $("#playerMoney").html(res['playerMoney']);
                    $("#upgradePrice").html(res['upgradePrice']);
                }

                $("#alert").show().removeClass().addClass("alert alert-"+res['status']).html(res['message']);
            }
        });
    });
});
