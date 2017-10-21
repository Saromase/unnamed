var Storage =  {
    init: function () {
        Storage.csrf_token = $('meta[name="csrf-token"]').attr('content');
        $("#acceptStorageUpgrade").click(function () {
            Storage.upgrade();
        });

    },

    upgrade: function () {
        $.ajax({
            type: "POST",
            url: "/ajax/storage/storageUpgrade",
            data: {
                _token: Storage.csrf_token
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

    },

    refresh: function () {
        $.ajax({
            type: "POST",
            url: "/ajax/products/productsUpdate",
            data: {
                _token: Storage.csrf_token
            },
            success: function (res) {
                if (res['status'] === "success") {
                    $.each(res['products'], function (key, product) {
                        var name = product['name'];
                        $('#'+name+"Price").html(product['price']);
                        var supply_demand = product['supply_demand'];
                        var class_name = supply_demand > 0 ? 'success' : 'danger';
                        $('#'+name+"Demand").removeClass().addClass(class_name).html(product['supply_demand']);

                    });

                    $("#alert").show().removeClass().addClass("alert alert-" + res['status']).html(res['message']);
                }
            }
        });

    }
};


// noinspection JSUnresolvedVariable
module.exports = Storage;