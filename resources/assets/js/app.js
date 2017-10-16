/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Chart from 'chart.js';

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

$(document).ready(function () {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');

    // actualisation des données de la page Storage
    $("#acceptStorageUpgrade").click(function () {
        $.ajax({
            type: "POST",
            url: "/ajax/storage/storageUpgrade",
            data: {
                _token: csrf_token
            },
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

                $("#alert").show().removeClass().addClass("alert alert-" + res['status']).html(res['message']);
            }
        });
    });

    $("#refreshProductsPrice").click(function () {
        $.ajax({
            type: "POST",
            url: "/ajax/products/productsUpdate",
            data: {
                _token: csrf_token
            },
            success: function (res) {
                if (res['status'] == "success") {
                    var product = res['products'];
                    for(let i = 0; i < product.length; i++){
                        var name = product[i]['name'];
                        $('#'+name+"Price").html(product[i]['price']);
                        var demand = product[i]['supply_demand'];
                        if (demand > 0){
                            $('#'+name+"Demand").removeClass().addClass('success').html(product[i]['supply_demand']);
                        } else {
                           $('#'+name+"Demand").removeClass().addClass('danger').html(product[i]['supply_demand']);
                        }
                    }
                    console.log(product);
                    $("#alert").show().removeClass().addClass("alert alert-" + res['status']).html(res['message']);
                }
            }
        });
    });

    // création de la chart de la page Home
    $.ajax({
        type: "POST",
        url: "/ajax/home/chartUpdate",
        data: {
            _token: csrf_token
        },
        success: function (res) {
            if (res['status'] !== "warning") {
                // récupère les produits
                var product = res['products'];
                var ctx = $("#donutChart");

                // labels
                var label = [];
                for (let i =0; i < product.length; i++) {
                    label.push(product['name']);
                }

                // datas
                var datas = [];
                for (let i =0; i < product.length; i++) {
                    datas.push(product['quantity']);
                }

                // background-colors
                var backgroundColors = [];
                for (let i =0; i < product.length; i++) {
                    backgroundColors.push(product['color']);
                }
                var donutChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '# of Votes',
                            data: datas,
                            backgroundColor: backgroundColors
                        }]
                    },
                    options: {}
                });
                console.log(labels);
                $("#alert").show().removeClass().addClass("alert alert-" + res['status']).html(res['message']);
            }
        }
    });

});
